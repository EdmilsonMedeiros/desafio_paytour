<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResumeEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
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
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Candidatura Recebida',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.resume',
            with: [
                'email' => $this->email,
                'name' => $this->name,
                'phone' => $this->phone,
                'desired_job' => $this->desired_job,
                'education' => $this->education,
                'observations' => $this->observations,
                'ip_address' => $this->ip_address,
                'created_at' => $this->created_at,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
