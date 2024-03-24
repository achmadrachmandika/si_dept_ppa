<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\Barang;

class SPRMailer extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $noSprUser;

    /**
     * Create a new message instance.
     *
     * @param  string  $name
     * @param  string  $email
     * @param  array  $noSprUser
     * @return void
     */
    public function __construct($name, $email, $noSprUser)
    {
        $this->name = $name;
        $this->email = $email;
        $this->noSprUser = $noSprUser;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Informasi Nomor SPR',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
{   
    return $this->subject('SPR Notification')
                ->view('email')
                ->with([
                    'name' => $this->name,
                    'email' => $this->email,
                    'noSprUser' => $this->noSprUser,
                ]);
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
