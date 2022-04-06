<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $products = Product::limit(5)->get();

        return view('index', compact('products'))->with('page_name', 'Home');
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
        $products = Product::paginate(20);

        return view('gallery', compact('products'))->with('page_name', 'Gallery');
    }




      /**
     * return frontend product details page
     *
     * @return void
     */
    public function productDetails(Product $product)
    {
        return view('product-details', compact('product'))->with('page_name', 'Product Details');
    }



}
