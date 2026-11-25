<?php

namespace App\Mail;

use App\Models\Tsa4Task;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Tsa4TaskCompleted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Tsa4Task $task) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Task completed: '.$this->task->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'tsa4.emails.task-completed',
        );
    }
}
