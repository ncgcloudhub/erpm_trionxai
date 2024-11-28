<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SaleEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfPath;

    /**
     * Create a new message instance.
     */
    public function __construct($pdfPath)
    {
        Log::info("SaleEmail Contructor with PDF path: " . $pdfPath);
        $this->pdfPath = $pdfPath;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        Log::info("Building email with PDF path: " . $this->pdfPath);
        return $this->subject('Sale PDF')
            ->view('admin.Backend.Sales.sale_email')->attach($this->pdfPath, [
                'mime' => 'application/pdf',
            ]); // Specify the email view
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {

        Log::info("Attaching PDF from path: " . $this->pdfPath);
        return [
            Attachment::fromPath($this->pdfPath)
                ->as('SaleInvoice.pdf')
                ->withMime('application/pdf'),
        ];
    }
}