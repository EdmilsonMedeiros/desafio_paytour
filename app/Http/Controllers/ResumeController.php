<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResumeRequest;
use App\Services\ResumeService;
use App\Models\Resume;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{

    protected $resumeService;

    public function __construct(ResumeService $resumeService)
    {
        $this->resumeService = $resumeService;
    }

    public function store(ResumeRequest $request)
    {
        try{
            $this->resumeService->store($request);

            return redirect()->back()->with('success', 'Currículo enviado com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function getResumes(Request $request)
    {
        try{
            $resumes = $this->resumeService->getResumes($request);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json($resumes);
    }

    public function downloadResume($id)
    {
        try{
            return Storage::download(Resume::find($id)->file);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
