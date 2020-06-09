<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Validation\Validator;



class CategoryController extends Controller
{

    public function index()
    {
        return view('back.categories.categories', ['categories' => Category::orderBy('id', 'DESC')->paginate(5)]);
    }


    public function create()
    {
        return view('back.categories.create');
    }


    public function store(CategoryRequest $request)
    {
        $category = new Category();
        try {
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->save();
        } catch (Exception $exception) {
            switch ($exception->getCode()) {
                case 23000:
                    $msg = "نام مستعار وارد شده تکراری است";
                    break;
            }
            return redirect(route('admin.categories.create'))->with('warning', $msg);
        }
        $msg = "دسته بندی با موفقیت ذخیر شد";
        return redirect(route('admin.categories'))->with('success', $msg);
    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('back.categories.edit', ['category' => $category]);
    }


    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->all());
        } catch (Exception $exception) {
            switch ($exception->getCode()) {
                case 23000:
                    $msg = "نام مستعار وارد شده تکراری است";
                    break;
            }
            return redirect(route('admin.categoreis.edit'))->with('warning', $msg);
        }
        $msg = "دسته بندی ب موفقیت ویرایش شد";
        return redirect(route('admin.categories'))->with('success', $msg);
    }


    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (Exception $exception) {
            return redirect(route('admin.categories'))->with('warning', $exception->getCode());
        }
        $msg = "دسته بندی با موفقیت حذف شد";
        return redirect()->back()->with('success', $msg);
    }
}
