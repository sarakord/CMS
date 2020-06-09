<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\frontmodels\Article;
use App\frontmodels\Comment;
use App\frontmodels\User;
use App\frontmodels\Category;
use App\frontmodels\Portfolio;

class HomeController extends Controller
{
    public function index()
    {
        $portfolio = Portfolio::orderBy('id', 'DESC')->where('status', 1)->get();
        $tag = $portfolio->unique('tag');
        return view('front.main', ['portfolios' => $portfolio, 'tags' => $tag]);
    }
}
