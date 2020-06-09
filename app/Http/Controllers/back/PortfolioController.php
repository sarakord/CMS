<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{


    public function index()
    {
        $portfolio = Portfolio::orderBy('id', 'DESC')->paginate(5);
        return view('back.Portfolio.portfolio', ['Portfolios' => $portfolio]);
    }


    public function create()
    {
        return view('back.Portfolio.create');
    }


    public function store(Request $request)
    {
        $portfolio = new Portfolio();
        try {
            $portfolio->create($request->all());
        } catch (Exception $exception) {
            return redirect(route('admin.portfolio.create'))->with('warning', $exception->getCode());

        }
        $msg = "آیتم با موفقیت ذخیره شد";
        return redirect(route('admin.portfolio'))->with('success', $msg);
    }


    public function updatestatus($id)
    {
        $portfolio=Portfolio::find($id);
        if ($portfolio->status == 0) {
            $portfolio->status = 1;
        } else {
            $portfolio->status = 0;
        }
        $portfolio->save();
        $msg = "وضعیت با موفقیت تغییر کرد";
        return redirect(route('admin.portfolio'))->with('success', $msg);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $portfolio=Portfolio::find($id);
        return view('back.Portfolio.edit', compact('portfolio'));
    }


    public function update(Request $request,$id)
    {
       $portfolio=Portfolio::find($id);
        try {
            $portfolio->update($request->all());
        }catch (Exception $exception){
            return redirect(route('admin.portfolio.edit'))->with('warning',$exception->getCode());
        }
        $msg="ویرایش نمونه کار با موفقیت انجام شد";
        return redirect(route('admin.portfolio'))->with('success', $msg);
    }


    public function destroy($id)
    {
        $portfolio=Portfolio::find($id);
        try {
            $portfolio->delete();
        } catch (Exception $exception) {
            return redirect(route('admin.portfolio'))->with('warning', $exception->getCode());
        }
        $msg = "دسته بندی با موفقیت حذف شد";
        return redirect()->back()->with('success', $msg);
    }
}
