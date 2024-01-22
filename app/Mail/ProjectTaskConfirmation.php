<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProjectTaskConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $taskDetails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($taskDetails)
    {
        $this->taskDetails = $taskDetails;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Project Task Confirmation',
        );
    }

    public function build()
    {
        return $this->subject('Project Task Assigned')->view('admin.Backend.Project.project_task_mail');
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'admin.Backend.Project.project_task_mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
