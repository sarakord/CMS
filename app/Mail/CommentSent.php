<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentSent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $comment;
    public $article;

    public function __construct($comment , $article)
    {
        $this->comment=$comment;
        $this->article=$article;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@gmail.com')
                    ->subject('کامنت شما دریافت شد')
                    ->view('mails.comment')->with([
                        'articleTile'=>$this->article->name,
                        'commentBody'=>$this->comment->body,
                        'userName'=>$this->comment->name
            ]);
    }
}
