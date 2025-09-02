<?php

namespace App\Services;
use App\Http\Requests\ResumeRequest;
use App\Models\Resume;
use Illuminate\Support\Facades\Storage;
use App\Jobs\ResumeEmailJob;
use Illuminate\Http\Request;


class ResumeService
{
    /**
     * Submeter o currículo
     * @param ResumeRequest $request
     * @return Resume
     */
    public function store(ResumeRequest $request)
    {
        $filePath = null;
        $resume = null;

        try{
            $filePath = $this->storeFile($request->file('file'), $request->name);
            
            // Preparando dados para o banco de dados
            $data = $request->only(['name', 'email', 'phone', 'desired_job', 'education', 'observations']);
            $data['file'] = $filePath;
            // Obtendo o IP público do usuário
            $data['ip_address'] = request()->ip();

            $resume = Resume::create($data);
            ResumeEmailJob::dispatch($request->email, $request->name, $request->phone, $request->desired_job, $request->education, $request->observations, $data['ip_address'], $resume->created_at);
        } catch (\Exception $e) {
            // rollback caso ocorra um erro
            if($filePath){
                Storage::delete($filePath);
            }

            if($resume){
                $resume->delete();
            }

            throw new \Exception('Error submitting resume: ' . $e->getMessage());
        }

        return $resume;
    }

    /**
     * Salvar o arquivo do currículo no diretório storage/app/resumes
     * @param $file
     * @param $name
     * @return string
     */
    public function storeFile($file, $name)
    {
        // Criando um nome de arquivo seguro com timestamp
        $timestamp = now()->format('Y-m-d_H-i-s');
        $safeName = preg_replace('/[^a-zA-Z0-9\-_]/', '_', $name);
        $extension = $file->getClientOriginalExtension();
        $fileName = $safeName . '_' . $timestamp . '.' . $extension;
        
        // Salvando no diretório resumes
        $path = $file->storeAs('resumes', $fileName, 'local');
        return $path;
    }

    /**
     * Buscar currículos
     * @param Request $request
     * @return Collection
     */
    public function getResumes(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : 10;
        $page = $request->page ? $request->page : 1;
        $search = $request->search ? $request->search : '';

        $resumes = Resume::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->orWhere('desired_job', 'like', '%' . $search . '%')
            ->orWhere('education', 'like', '%' . $search . '%')
            ->orWhere('observations', 'like', '%' . $search . '%')
            ->orderBy('id', 'desc')
            ->paginate($per_page, ['*'], 'page', $page);
        
        return $resumes;
    }
}
