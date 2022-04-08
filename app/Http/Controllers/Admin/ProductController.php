<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['category'])->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  Category::tree()->get()->toTree();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $product = Product::create($request->only(['category_id', 'title', 'description', 'dimension', 'origin', 'price', 'metadata']));

        return redirect()->route('products.index')->with('success', 'Product create successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::firstOrFail($slug);

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $product = Product::where(['slug'=> $slug])->firstOrFail();

        $categories =  Category::tree()->get()->toTree();

        return view('admin.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $slug)
    {
        $product = Product::where(['slug'=> $slug])->firstOrFail();

       $product->update($request->only(['category_id', 'title', 'description', 'dimension', 'origin', 'price', 'metadata']) + ['slug'=> Str::slug($request->title)]);

       return redirect()->route('products.index')->with('success', 'Product update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $product = Product::where(['slug'=> $slug])->firstOrFail();

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product delete successfully!');
    }


    /**
     * Get product imaages view
     */

    public function images($slug)
    {
        $product = Product::where(['slug'=> $slug])->firstOrFail();

        return view('admin.products.images', compact('product'));
    }


    /**
     * Add Product Image
     *
     * @param Request $request
     * @return void
     */
    public function imagesAdd(Request $request,  $slug)
    {
       $request->validate([
            'image' =>  ['required','max:2048','mimes:png,jpg,jpeg'],
            'alt'  =>   ['nullable']
       ]);

       $product = Product::where(['slug'=> $slug])->firstOrFail();
        $product
        ->addMedia($request->image)
        ->withCustomProperties(['alt' => $request->alt])
        ->toMediaCollection('gallery')
        ;

        return redirect()->route('product.images', $product->slug)->with('success', 'Product image add successfully!');
    }

    /**
     * Delete Product Image
     *
     * @param Request $request
     * @return void
     */
    public function imagesDelete(Request $request,  $slug, $image)
    {
        $product = Product::where(['slug'=> $slug])->firstOrFail();

        // return $image;
        try {
            $images  = $product->getMedia('gallery');

            // dd($images);
            $images[$image]->delete();

            return redirect()->route('product.images', $product->slug)->with('success', 'Product image delete successfully!');
        } catch (Exception $e) {
            return redirect()->route('product.images', $product->slug)->with('error', 'Product image delete failed!');
        }
    }
}
