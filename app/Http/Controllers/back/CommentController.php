<?php

namespace App\Http\Controllers\back;

use App\Comment;
use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('id', 'DESC')->paginate(5);
        return view('back.comments.comments', compact('comments'));
    }

    public function updatestatus(Comment $comment)
    {
        if ($comment->status == 0) {
            $comment->status = 1;
        } else {
            $comment->status = 0;
        }
        $comment->save();
        $msg = "وضعیت با موفقیت تغییر کرد";
        return redirect(route('admin.comments'))->with('success', $msg);
    }


    public function edit(Comment $comment)
    {
        return view('back.comments.edit', ['comment' => $comment]);
    }


    public function update(Request $request , Comment $comment)
    {
        try {
            $comment->update($request->all());
        } catch (Exception $exception) {
            return redirect(route('admin.comments.edit'))->with('warning', $exception->getCode());
        }
        $msg = "ویرایش نظر با موفقیت ویرایش شد";
        return redirect(route('admin.comments'))->with('success', $msg);
    }


    public function destroy(Comment $comment)
    {
        try {
            $comment->delete();
        } catch (Exception $exception) {
            return redirect(route('admin.comments'))->with('warning', $exception->getCode());
        }
        $msg = "نظر با موفقیت حذف شد";
        return redirect()->back()->with('success', $msg);
    }

}
