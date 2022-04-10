<?php

namespace Modules\Faq\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Faq\Actions\SortingFaqCategory;
use Illuminate\Contracts\Support\Renderable;
use Modules\Faq\Entities\FaqCategory;

class FaqCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:faq.category.view|faq.category.edit|faq.category.delete'])->only(['index',]);
        $this->middleware(['permission:faq.category.create'])->only(['create', 'store']);
        $this->middleware(['permission:faq.category.edit'])->only(['edit', 'update', 'updateOrder']);
        $this->middleware(['permission:faq.category.delete'])->only(['delete',]);
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['faqCategories'] = FaqCategory::oldest('order')->get();
        return view('faq::faqcategory.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('faq::faqcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:faq_categories,name',
        ]);

        FaqCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        flashSuccess('Faq Category Successfully Created');
        return redirect()->route('module.faq.category.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(FaqCategory $faq_category)
    {
        return view('faq::faqcategory.edit', compact('faq_category'));
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, FaqCategory $faq_category)
    {
        $request->validate([
            'name' => "required|unique:faq_categories,name,{$faq_category->id}"
        ]);

        $faq_category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        flashSuccess('Faq Category Successfully Updated');
        return redirect()->route('module.faq.category.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param FaqCategory $faq_category
     * @return Renderable
     */
    public function destroy(FaqCategory $faq_category)
    {
        $faq_category->delete();

        flashSuccess('Faq Category Successfully Deleted');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param $request
     * @return Response
     */
    public function updateOrder(Request $request)
    {
        try {
            SortingFaqCategory::sort($request);
            return response()->json(['message' => 'Faq Category Sorted Successfully!']);
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }
}
