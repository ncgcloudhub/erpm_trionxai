<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SaleEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $pdfPath;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdfPath)
    {
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        return $this->subject('Sale PDF') // Set the subject for the email
        ->view('admin.Backend.Sales.sale_email') // Use the view for email content
        ->attach($this->pdfPath, [
            'as' => 'SaleInvoice.pdf', // Name the attachment
            'mime' => 'application/pdf', // MIME type for PDF
        ]);
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
   

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
   

    /**
     * Get the attachments for the message.
     *
     * @return array
     */

}
