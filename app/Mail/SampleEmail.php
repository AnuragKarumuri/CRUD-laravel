<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SampleEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $description;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }


    public function build()
    {
        return $this->subject('New Email')
            ->view('emails.your-email')
            ->with([
                'name' => $this->name,
                'description' => $this->description,
            ]);
    }
}
