<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Course;

class MailForUsers extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;
    public $course;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($lead, $course)
    {
        $this->lead = $lead;
        $this->course = $course;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            replyTo: $this->lead->email,
            subject: 'Mail inviata con successo',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function build()
    {
        return $this->view('mails.mail_for_users')->with(['course' => $this->course, 'customers' => $this->course->customers, 'lead' => $this->lead]); 
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