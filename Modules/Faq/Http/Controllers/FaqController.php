<?php

namespace Modules\Faq\Http\Controllers;


use Modules\Faq\Entities\Faq;
use Illuminate\Routing\Controller;
use Modules\Faq\Actions\DeleteFaq;
use Modules\Faq\Actions\UpdateFaq;
use Illuminate\Contracts\Support\Renderable;
use Modules\Faq\Http\Requests\FaqFormRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Faq\Actions\CreateFaq;
use Modules\Faq\Entities\FaqCategory;

class FaqController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware(['permission:product.view|product.edit|product.delete'])->only(['index',]);

        $this->middleware(['permission:product.create'])->only(['create', 'store']);
        $this->middleware(['permission:product.edit'])->only(['edit', 'update']);
        $this->middleware(['permission:product.delete'])->only(['delete',]);
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $faq_category = FaqCategory::select('id', 'name', 'slug')->get();

        if (request('category') && !is_null(request('category'))) {
             $faqs = Faq::whereHas('faq_category', function ($q){
                $q->where('slug', request('category'));
            })
            ->paginate(10)->withQueryString();
        } else {
            $faqs = Faq::where('faq_category_id', $faq_category->first()->id)->paginate(10)->withQueryString();
        }

        return view('faq::index', compact('faq_category', 'faqs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $faq_categories = FaqCategory::oldest('order')->get();
        return view('faq::create', compact('faq_categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param FaqFormRequest $request
     * @return Renderable
     */
    public function store(FaqFormRequest $request)
    {
        $request->validate([
            'faq_category_id' => "required",
            'question' => "required",
            'answer' => "required"
        ]);

        $faq = CreateFaq::create($request);

        if ($faq) {
            flashSuccess('Faq Created Successfully');
            return redirect(route('module.faq.index'));
        } else {
            flashError();
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Faq $faq)
    {
        $faq_categories = FaqCategory::oldest('order')->get();
        return view('faq::edit', compact('faq', 'faq_categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param FaqFormRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(FaqFormRequest $request, Faq $faq)
    {
        $faq = UpdateFaq::update($request, $faq);

        if ($faq) {
            flashSuccess('Faq Updated Successfully');
            return redirect(route('module.faq.index'));
        } else {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Faq $faq)
    {
        $faq = DeleteFaq::delete($faq);

        if ($faq) {
            flashSuccess('Faq Deleted Successfully');
            return redirect(route('module.faq.index'));
        } else {
            flashError();
            return back();
        }
    }
}
