<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

Route::middleware(['frontend_setlang'])->group(function () {

    Route::get('/', [FrontendController::class, 'index'])->name('index');
    Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
    Route::get('/about', [FrontendController::class, 'about'])->name('about');
    Route::get('/gallery', [FrontendController::class, 'gallery'])->name('gallery');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
    Route::get('/details/{product:slug}', [FrontendController::class, 'productDetails'])->name('product.details');
    Route::get('/print/{product:slug}', [FrontendController::class, 'productPrint'])->name('product.print');
    Route::get('/collections/{category}', [FrontendController::class, 'getProductByCategory'])->name('category.product');

    // Route::get('/home', function(){
    //     return view('home');
    // })->name('home');

    // Auth::routes();

    // Route::get('/lang/{lang}', function($lang){
    //     session()->put('frontend_lang', $lang);
    //     app()->setLocale($lang);

    //     return back();
    // });

    // Route::get('/category', function(){
    //     $categories =  Category::tree()->get()->toTree();
    //     return view('test', compact('categories'));
    // });

});
