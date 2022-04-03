<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{


    /**
     * returrn frontend index page
     *
     * @return void
     */
    public function index()
    {
        return view('index')->with('page_name', 'Home');
    }



    /**
     * return frontend about us page
     *
     * @return void
     */
    public function about()
    {
        return view('about')->with('page_name', 'About Us');
    }



    /**
     * return frontend faqs page
     *
     * @return void
     */
    public function faq()
    {
        return view('faq')->with('page_name', 'FAQS');
    }




      /**
     * return frontend gallery page
     *
     * @return void
     */
    public function gallery()
    {
        return view('gallery')->with('page_name', 'Gallery');
    }




      /**
     * return frontend product details page
     *
     * @return void
     */
    public function productDetails()
    {
        return view('product-details')->with('page_name', 'Product Details');
    }



}