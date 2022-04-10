<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Modules\Contact\Entities\Contact;
use Modules\Faq\Entities\Faq;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }


    public function dashboard()
    {
        session(['layout_mode' => 'left_nav']);
        // if (is_null($this->user) || !$this->user->can('dashboard.view'))

        $product_count = Product::count();
        $category_count = Category::count();
        $user_count = User::count();
        $role_count = Role::count();
        $contact_count = Contact::count();
        $faq_count = Faq::count();

        return view('admin.index', compact('product_count', 'category_count', 'user_count', 'role_count', 'contact_count', 'faq_count'));
    }
}
