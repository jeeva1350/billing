<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PurchaseConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
   

    /**
     * Get the message envelope.
     */
     // Constructor
     public function __construct($purchaseDetails)
     {
         $this->purchaseDetails = $purchaseDetails;
     }
 
     public function build()
     {
         return $this->subject('Purchase Confirmation')
                     ->view('emails.purchase_confirmation')
                     ->with(['purchaseDetails' => $this->purchaseDetails]); // Pass purchaseDetails to the view
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
