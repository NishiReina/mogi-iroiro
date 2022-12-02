<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RemaindMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('nishiko@example.com') // 送信元
        ->view('emails.remaind') // どのテンプレートを呼び出すか
        ->subject("ご予約日が近づいております。") // 件名
        ->with(['user' => $this->user]); // withオプションでセットしたデータをテンプレートへ受け渡す
    }
}
