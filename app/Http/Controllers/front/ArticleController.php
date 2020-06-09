<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\frontmodels\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->where('status', 1)->paginate(10);
        return view('front.articles', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        $article->increment('hit');
        $comments = $article->comments()->where('status' , 1)->get();
        return view('front.article', ['article' => $article ,'comments'=>$comments]);
    }
}
