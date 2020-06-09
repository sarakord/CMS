<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use DemeterChain\A;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ArticleController extends Controller
{

    public function index()
    {
        $article = Article::orderBy('id', 'DESC')->paginate(5);
        return view('back.articles.articles', ['articles' => $article]);
    }


    public function create()
    {
        $categoreis = Category::all()->pluck('name', 'id');

        return view('back.articles.create', compact('categoreis'));
    }


    public function store(Request $request)
    {
        $article = new Article();
        if (empty($request->slug)) {
            $slug = SlugService::createSlug(Article::class, 'slug', $request->name);
        } else {
            $slug = SlugService::createSlug(Article::class, 'slug', $request->slug);
        }
        $request->merge(['slug' => $slug]);

        try {
            $article = $article->create($request->all());
            $article->categories()->attach($request->categories);
        } catch (Exception $exception) {
            switch ($exception->getCode()) {
                case 23000 :
                    $msg = "نام مستعار وراد شده تکراریست";
                    break;
            }
            return redirect(route('admin.articles.create'))->with('warning', $msg);
        }
        $msg = "مطلب جدید با موفقیت ذخیر شد";
        return redirect(route('admin.articles'))->with('success', $msg);
    }


    public function show(Article $article)
    {
        //
    }


    public function updatestatus(Article $article)
    {
        if ($article->status == 0) {
            $article->status = 1;
        } else {
            $article->status = 0;
        }
        $article->save();
        $msg = "وضعیت با موفقیت تغییر کرد";
        return redirect(route('admin.articles'))->with('success', $msg);
    }


    public function edit(Article $article)
    {
        $categoreis = Category::all()->pluck('name', 'id');
        return view('back.articles.edit', ['article' => $article, 'categoreis' => $categoreis]);
    }


    public function update(Request $request, Article $article)
    {
        try {
            $article->update($request->all());
            $article->categories()->sync($request->categories);
        } catch (Exception $exception) {
            switch ($exception->getCode()) {
                case 23000 :
                    $msg = "نام مستعار وراد شده تکراریست";
                    break;
            }
            return redirect(route('admin.articles.create'))->with('warning', $msg);
        }
        $msg = "مطلب با موفقیت ویرایش شد";
        return redirect(route('admin.articles'))->with('success', $msg);
    }


    public function destroy(Article $article)
    {

        try {
            $article->delete();
        } catch (Exception $exception) {
            return redirect(route('admin.categories'))->with('warning', $exception->getCode());
        }
        $msg = "دسته بندی با موفقیت حذف شد";
        return redirect()->back()->with('success', $msg);
    }
}
