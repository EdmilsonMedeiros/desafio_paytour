<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResumeEmail;

class ResumeEmailJob implements ShouldQueue
{
    use Queueable;

    public $email;
    public $name;
    public $phone;
    public $desired_job;
    public $education;
    public $observations;
    public $ip_address;
    public $created_at;

    /**
     * Create a new job instance.
     */
    public function __construct($email, $name, $phone, $desired_job, $education, $observations, $ip_address, $created_at)
    {
        $this->email = $email;
        $this->name = $name;
        $this->phone = $phone;
        $this->desired_job = $desired_job;
        $this->education = $education;
        $this->observations = $observations;
        $this->ip_address = $ip_address;
        $this->created_at = $created_at;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new ResumeEmail($this->email, $this->name, $this->phone, $this->desired_job, $this->education, $this->observations, $this->ip_address, $this->created_at));
    }
}
