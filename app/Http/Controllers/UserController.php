<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserController extends Controller
{
    use ValidatesRequests;
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('super_admin')->user();
            return $next($request);
        });
    }

    public function dashboard()
    {
        if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view dashboard.');
        }
        return view('backend.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('admin.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view users.');
        }
        $users = SuperAdmin::where('id', '!=', 1)->SimplePaginate(10);
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create users.');
        }
        $roles = Role::all();
        return view('backend.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to store users.');
        }
        $this->validate($request, [
            'name' => "required",
            'email' => "required|unique:super_admins,email",
            'password' => "required|min:8",
            'roles' => "required",
        ]);

        $user = new SuperAdmin();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('image')) {
            $image = $request->image;
            $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            Storage::putFileAs('public/admin', $image, $fileName);
            $db_image = 'storage/admin/' . $fileName;
            $user->image = $db_image;
        }
        $user->password = bcrypt($request->password);
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        session()->flash('success', 'Admin Created Successfully!');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit users.');
        }
        $user = SuperAdmin::findOrFail($id);
        $roles = Role::all();
        return view('backend.users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to update users.');
        }
        $this->validate($request, [
            'name' => "required",
            'email' => "required|unique:super_admins,email,$id",
            'roles' => "required",
        ]);

        $user = SuperAdmin::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('image')) {
            $image = $request->image;
            $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            Storage::putFileAs('public/user', $image, $fileName);
            $db_image = 'storage/user/' . $fileName;
            $user->image = $db_image;
        }
        if ($request->password) {
            $this->validate($request, [
                'password' => "min:8",
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        session()->flash('success', 'User Updated Successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete users.');
        }
        $user = SuperAdmin::find($id);
        if (!is_null($user)) {
            $user->delete();
        }
        session()->flash('success', 'User Deleted Successfully!');
        return back();
    }

    function show()
    {
    }
}
