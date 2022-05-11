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
}
