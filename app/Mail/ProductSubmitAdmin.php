<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductSubmitAdmin extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $product;
    public $category;
    public $submitted;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($product, $category, $submitted)
    {
        $this->product = $product;
        $this->category = $category;
        $this->submitted = $submitted;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.product-submit-admin');
    }
}
