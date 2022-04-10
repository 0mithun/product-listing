<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\ProductSubmit;
use Exception;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:product.view|product.edit|product.delete'])->only(['index',]);
        $this->middleware(['permission:product.view'])->only(['show',]);
        $this->middleware(['permission:product.create'])->only(['create', 'store']);
        $this->middleware(['permission:product.edit'])->only(['edit', 'update']);
        $this->middleware(['permission:product.delete'])->only(['delete',]);
    }
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

        return redirect()->route('product.images', $product->slug)->with('success', 'Product create successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where(['slug'=> $slug])->firstOrFail();
        $category = Category::where('id', $product->category_id)->tree()->first();

        // return view('admin.products.show', compact('product'));
        return view('product-details', compact('product', 'category'));
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

       return redirect()->route('product.images', $product->slug)->with('success', 'Product update successfully!');
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
        // $product
        // ->addMedia($request->image)
        // ->withCustomProperties(['alt' => $request->alt])
        // ->toMediaCollection('thumb')
        // ;

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
            $gallery  = $product->getMedia('gallery');
            // $thumb  = $product->getMedia('thumb');


            $gallery[$image]->delete();
            // $gallery[$image]->delete();

            return redirect()->route('product.images', $product->slug)->with('success', 'Product image delete successfully!');
        } catch (Exception $e) {
            return redirect()->route('product.images', $product->slug)->with('error', 'Product image delete failed!');
        }
    }


    public function submitedProducts()
    {
        $submits =  ProductSubmit::paginate(10);

        return view('admin.products.submit-products', compact('submits'));
    }
}
