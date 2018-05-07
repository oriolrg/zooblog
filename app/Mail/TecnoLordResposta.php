<?php

namespace TecnoLord\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TecnoLordResposta extends Mailable
{
    use Queueable, SerializesModels;
    /**
         * The mail object instance.
         *
         * @var Mail
         */
    public $demo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demo)
    {
        $this->demo = $demo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('vall.tecnolord@gmail.com')
                  ->view('mails.resposta');
                    //->attach(public_path('/images').'/demo.jpg', [
                    //        'as' => 'demo.jpg',
                    //        'mime' => 'image/jpeg',
                    //]);
    }
}