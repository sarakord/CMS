<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\frontmodels\Article;
use App\frontmodels\Comment;
use App\Http\Requests\CommentRequest;
use App\Mail\CommentSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class  CommentController extends Controller
{
    public function store(Article $article, CommentRequest $request)
    {

        $article->comments()->create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'body' => $request->body
            ]
        );

        Mail::to($request->email)
            ->send(new CommentSent($request,$article));

        $msg="نظر شما با موفقیت ثبت شد و پس از تائید نمایش داده خواهد شد.";
        return back()->with('success',$msg);
    }
}
