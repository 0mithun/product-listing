<?php

namespace Modules\Contact\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Contact\Entities\Contact;
use Illuminate\Contracts\Support\Renderable;
use Modules\Contact\Repositories\ContactRepositories;

class ContactController extends Controller
{
    protected $contact;
    public function __construct(ContactRepositories $contact)
    {
        $this->contact = $contact;

        $this->middleware(['permission:contact.view|contact.edit|contact.delete'])->only(['index','show']);
        $this->middleware(['permission:contact.edit'])->only(['edit', 'update']);
        $this->middleware(['permission:contact.delete'])->only(['delete','multipleDestroy']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('contact::index', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|min:3",
            'email' => "required",
            'message' => "required|min:10",
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Contact submit successfully!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $contact = Contact::find($id);

        return [
            'name' => $contact->name,
            'email' => $contact->email,
            'message' => $contact->message,
        ];
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        session()->flash('success', 'Contact Deleted Successfully!');
        return back();
    }

    /**
     * Remove multiple resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function multipleDestroy(Request $request)
    {
        try {
            $this->contact->multipleDestroy($request);

            return responseSuccess('Selected Contact Items Deleted Successfully!');
        } catch (\Throwable $th) {
            return responseError();
        }
    }
}
