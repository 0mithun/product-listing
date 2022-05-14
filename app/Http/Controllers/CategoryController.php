<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function categories(Category $category)
    {
        $categories = Category::with(['products'])->where('parent_id', $category->id)->paginate(10);

        return view('category', compact('categories'));
    }


    public function subcategories(Category $category, $slug)
    {
        $subcategory = Category::where('slug', $slug)->firstOrFail();

        $categories = Category::with(['products'])->where('parent_id', $subcategory->id)->paginate(10);

        return view('category', compact('categories'));
    }


    public function product(Category $category, $subcategory, Product $product)
    {
        Category::where('slug', $subcategory)->firstOrFail();

        $category = Category::where('id', $product->category_id)->tree()->first();

        return view('product-details', compact('product', 'category'));
    }



    public function slug($slugName){
        $slugs = explode('/', $slugName);

        if(count($slugs)){
            $slug = array_pop($slugs);

            if($product = Product::whereSlug($slug)->first()){
                $category = Category::where('id', $product->category_id)->tree()->first();

                return view('product-details', compact('product', 'category'))->with('page_name', 'Product Details');
            }else if($category = Category::where('slug', $slug)->tree()->first()){
                $products = $category->products()->paginate(20);

                return view('gallery', compact('products', 'category'))->with('page_name', 'Gallery');
            }
            abort(404);
        }

        abort(404);
    }
}
