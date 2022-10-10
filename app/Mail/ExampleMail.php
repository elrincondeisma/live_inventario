<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Device;

class ExampleMail extends Mailable
{
    use Queueable, SerializesModels;
    public $device;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Device $device)
    {
        $this->device = $device;
    }
    

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.example');
    }
}
