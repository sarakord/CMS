<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*use Illuminate\Support\Facades\Route;*/

Auth::routes(['verify'=>true]);


Route::get('/','front\HomeController@index')->name('home');

/*Route::get('/', function () {
    return view('front.main');
})->name('home');*/


route::prefix('/admin')->middleware('CheckRole')->group(function (){

    route::get('','back\AdminController@index')->name('admin');
    route::get('/users' , 'back\UserController@index')->name('admin.users');
    route::get('/profile/{user}','back\UserController@edit')->name('admin.profile');
    route::post('/update/{user}','back\UserController@update')->name('admin.profileupdate');
    route::get('/users/delete/{user}','back\UserController@destroy')->name('admin.user.delete');
    route::get('/users/status/{user}','back\UserController@updatestatus')->name('admin.user.status');

});


route::prefix('/admin/categories')->middleware('CheckRole')->group(function (){

    route::get('','back\CategoryController@index')->name('admin.categories');
    route::get('/create' , 'back\CategoryController@create')->name('admin.categories.create');
    route::post('/store','back\CategoryController@store')->name('admin.categories.store');
    route::get('/edit/{category}','back\CategoryController@edit')->name('admin.categoreis.edit');
    route::post('/update/{category}','back\CategoryController@update')->name('admin.categories.update');
    route::get('/destroy/{category}','back\CategoryController@destroy')->name('admin.categories.destroy');

});


route::prefix('/admin/articles')->middleware('CheckRole')->group(function (){

    route::get('','back\ArticleController@index')->name('admin.articles');
    route::get('/create' , 'back\ArticleController@create')->name('admin.articles.create');
    route::post('/store','back\ArticleController@store')->name('admin.articles.store');
    route::get('/edit/{article}','back\ArticleController@edit')->name('admin.articles.edit');
    route::post('/update/{article}','back\ArticleController@update')->name('admin.articles.update');
    route::get('/destroy/{article}','back\ArticleController@destroy')->name('admin.articles.destroy');
    route::get('/article/{article}','back\ArticleController@updatestatus')->name('admin.articles.status');
});


route::prefix('/admin/comments')->middleware('CheckRole')->group(function (){

    route::get('','back\CommentController@index')->name('admin.comments');
    route::get('/edit/{comment}','back\CommentController@edit')->name('admin.Comments.edit');
    route::post('/update/{comment}','back\CommentController@update')->name('admin.Comments.update');
    route::get('/destroy/{comment}','back\CommentController@destroy')->name('admin.Comments.destroy');
    route::get('/article/{comment}','back\CommentController@updatestatus')->name('admin.Comments.status');
});


route::prefix('/admin/portfolio')->middleware('CheckRole')->group(function (){

    route::get('','back\PortfolioController@index')->name('admin.portfolio');
    route::get('/create' , 'back\PortfolioController@create')->name('admin.portfolio.create');
    route::post('/store','back\PortfolioController@store')->name('admin.portfolio.store');
    route::get('/edit/{Portfolio}','back\PortfolioController@edit')->name('admin.portfolio.edit');
    route::put('/update/{Portfolio}','back\PortfolioController@update')->name('admin.portfolio.update');
    route::get('/destroy/{Portfolio}','back\PortfolioController@destroy')->name('admin.portfolio.destroy');
    route::get('/portfolio/{Portfolio}','back\PortfolioController@updatestatus')->name('admin.portfolio.status');
});


route::get('/profile/{user}','UserController@edit')->name('profile')->middleware('auth','verified');
route::post('/update/{user}','UserController@update')->name('profileupdate');
route::get('/articles','front\ArticleController@index')->name('articles');
route::get('/article/{article}','front\ArticleController@show')->name('article');
route::post('/comment/{article}','front\CommentController@store')->name('comment.store');
