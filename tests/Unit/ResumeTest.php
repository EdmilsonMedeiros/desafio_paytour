<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Requests\ResumeRequest;
use Illuminate\Http\UploadedFile;
use App\Services\ResumeService;
use App\Models\Resume;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Queue;
use Mockery;

class ResumeTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Configurar storage fake para testes
        Storage::fake('local');
        // Configurar queue fake para não executar jobs durante testes
        Queue::fake();
    }

    /**
     * Teste da função store do ResumeService
     */
    public function test_store_resume(): void
    {
        // Arrange - Preparar dados de teste
        $fakeFile = UploadedFile::fake()->create('resume.pdf', 1000, 'application/pdf');
        
        // Mock do ResumeRequest
        $requestMock = Mockery::mock(ResumeRequest::class);
        
        // Configurar comportamento do mock
        $requestMock->shouldReceive('file')
                   ->with('file')
                   ->andReturn($fakeFile);
                   
        $requestMock->shouldReceive('only')
                   ->with(['name', 'email', 'phone', 'desired_job', 'education', 'observations'])
                   ->andReturn([
                       'name' => 'John Doe',
                       'email' => 'john.doe@example.com',
                       'phone' => '1234567890',
                       'desired_job' => 'Software Engineer',
                       'education' => 'Bachelor of Science in Computer Science',
                       'observations' => 'I am a software engineer with 5 years of experience in the field.'
                   ]);

        // Propriedades necessárias para o ResumeEmailJob
        $requestMock->name = 'John Doe';
        $requestMock->email = 'john.doe@example.com';
        $requestMock->phone = '1234567890';
        $requestMock->desired_job = 'Software Engineer';
        $requestMock->education = 'Bachelor of Science in Computer Science';
        $requestMock->observations = 'I am a software engineer with 5 years of experience in the field.';

        // Act - Executar a função store
        $resumeService = new ResumeService();
        $result = $resumeService->store($requestMock);

        // Assert - Verificar resultados
        
        // 1. Verificar se retornou uma instância do modelo Resume
        $this->assertInstanceOf(Resume::class, $result);
        
        // 2. Verificar se os dados foram salvos corretamente no objeto
        $this->assertEquals('John Doe', $result->name);
        $this->assertEquals('john.doe@example.com', $result->email);
        $this->assertEquals('1234567890', $result->phone);
        $this->assertEquals('Software Engineer', $result->desired_job);
        $this->assertEquals('Bachelor of Science in Computer Science', $result->education);
        $this->assertEquals('I am a software engineer with 5 years of experience in the field.', $result->observations);
        
        // 3. Verificar se o arquivo foi armazenado
        $this->assertNotNull($result->file);
        $this->assertStringStartsWith('resumes/', $result->file);
        
        // 4. Verificar se o IP foi capturado
        $this->assertNotNull($result->ip_address);
        
        // 5. Verificar se o arquivo foi salvo no storage fake
        $this->assertTrue(Storage::disk('local')->exists($result->file));
        
        // 6. Verificar se foi salvo no banco de dados
        $this->assertDatabaseHas('resumes', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '1234567890',
            'desired_job' => 'Software Engineer',
            'education' => 'Bachelor of Science in Computer Science',
        ]);
        
        // 7. Verificar se o job de email foi despachado
        Queue::assertPushed(\App\Jobs\ResumeEmailJob::class, function ($job) {
            return $job->email === 'john.doe@example.com' && 
                   $job->name === 'John Doe';
        });
    }

    /**
     * Teste para verificar tratamento de erro na função store
     */
    public function test_store_resume_handles_exception(): void
    {
        // Arrange - Preparar mock que irá falhar
        $requestMock = Mockery::mock(ResumeRequest::class);
        $requestMock->shouldReceive('file')
                   ->with('file')
                   ->andThrow(new \Exception('Arquivo inválido'));
        
        $requestMock->name = 'John Doe';

        // Act & Assert - Verificar se a exceção é tratada corretamente
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Error submitting resume: Arquivo inválido');
        
        $resumeService = new ResumeService();
        $resumeService->store($requestMock);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
