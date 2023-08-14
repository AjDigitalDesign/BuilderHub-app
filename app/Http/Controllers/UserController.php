<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;

class UserController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('admin.Users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view('admin.Users.create', compact(['roles', 'permissions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $user = new  User();

        $request->validate([
            'fname' =>  'required|string|min:3',
            'lname' =>  'required|string|min:3',
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10|nullable',
            'position' => 'string|nullable',
            'role' => 'required',
        ]);

        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'position' => $request->position,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
        ]);

        $user->assignRole($request->role);
        $user->syncPermissions($request->permissions);

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view('admin.Users.edit', compact(['user', 'roles', 'permissions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'fname' =>  'required|string|min:3',
            'lname' =>  'required|string|min:3',
            'email' =>  ['email', Rule::unique('users', 'email')->ignore($user->id)],
            'phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10|nullable',
            'position' => 'string|nullable',
            'role' => 'required',
        ]);


            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->phone = $request->phone;
            $user->position = $request->position;
            $user->address = $request->address;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->zipcode = $request->zipcode;
            $user->save();

        $user->assignRole($request->role);
        $user->syncPermissions($request->permissions);

        $notification = 'User updated successfully!';
        notyf()
            ->dismissible(true)
            ->position('x', 'right')
            ->position('y', 'top')
            ->duration(3000)
            ->ripple(true)
            ->addSuccess($notification);
        return Redirect::route('admin.users.index')->with('status', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        $notification = 'User Account deleted successfully';
        notyf()
            ->dismissible(true)
            ->position('x', 'right')
            ->position('y', 'top')
            ->duration(3000)
            ->ripple(true)
            ->addSuccess($notification);
        return redirect()->back()->with('status', $notification);
    }
}
