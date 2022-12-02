<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    public $title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('nishiko@example.com') // 送信元
        ->view('emails.contact') // どのテンプレートを呼び出すか
        ->subject($this->title) // 件名
        ->with(['content' => $this->content]); // withオプションでセットしたデータをテンプレートへ受け渡す
    }
}
