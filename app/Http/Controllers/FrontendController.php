<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $products = Product::limit(10)->get();

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
        $category = Category::where('id', 1)->tree()->first();

        return view('gallery', compact('products', 'category'))->with('page_name', 'Gallery');
    }




      /**
     * return frontend product details page
     *
     * @return void
     */
    public function productDetails(Product $product)
    {
        $product_category = Category::where('id', $product->category_id)->tree()->first();

        return view('product-details', compact('product', 'category'))->with('page_name', 'Product Details');
    }



    /**
     * Get products by category
     *
     * @param Category $category
     * @return void
     */
    public function getProductByCategory($category)
    {
        $category = Category::where('slug', $category)->tree()->firstOrFail();
        $products = $category->products()->paginate(20);

        return view('gallery', compact('products', 'category'))->with('page_name', 'Gallery');
    }


    /**
     * Get contact view page
     *
     * @return void
     */
    public function contact()
    {
        return view('contact');
    }

}
