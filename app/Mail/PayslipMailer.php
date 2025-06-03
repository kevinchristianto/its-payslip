<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PayslipMailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public $data, public $dir)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Slip Gaji Periode ' . $this->data['periode'],
            from: new Address('slip@inosantek.com', 'PT Inosantek Total Solusi'),
            replyTo: [
                new Address('ahmadap@inosantek.com', 'Ahmad Aprilian'),
                new Address('hrd@inosantek.com', 'HRD Inosantek')
            ],
            bcc: [
                new Address('bcc_payslip@inosantek.com', 'Payslip')
            ]
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            html: 'mail.payslip'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath(storage_path('app/private/' . $this->dir . '/' . $this->data['nip'] . '.pdf'))
                ->withMime('application/pdf')
        ];
    }
}
