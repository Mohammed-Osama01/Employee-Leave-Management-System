<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function all_admin()
    {
        if (request()->has('search')) {
            $users = User::where('name', 'like', '%' . request()->search . '%')->orderBy('id', 'desc')->paginate(10);
        } else {
            // $posts = Post::orderBy('id', 'desc')->paginate(10);
            $users = User::orderByDesc('id')->paginate(10);
            // $posts = Post::latest('id')->paginate(10);
        }
        return view('admin.all-admin', compact('users'));
    }

    public function view_users()
    {
        // $users =User::all();
        // return view('admin.users' ,compact('users'));

        if (request()->has('search')) {
            $users = User::where('name', 'like', '%' . request()->search . '%')->orderBy('id', 'desc')->paginate(10);
        } else {
            // $posts = Post::orderBy('id', 'desc')->paginate(10);
            $users = User::orderByDesc('id')->paginate(10);
            // $posts = Post::latest('id')->paginate(10);
        }
        return view('admin.users', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.show', compact('user'));
    }
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()->with('msg', 'User deleted successfully');
    }

    public function trash()
    {
        $users = User::onlyTrashed()->orderByDesc('id')->get();
        return view('admin.trash', compact('users'));
    }

    public function restore($id)
    {
        User::onlyTrashed()->find($id)->restore();
        return redirect()->back()->with('msg', 'User Restor successfully');
    }
    public function forcedelete($id)
    {
        User::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('msg', 'User deleted successfully');
    }
    public function restore_all()
    {
        User::onlyTrashed()->restore();
        return redirect()->back()->with('msg', 'All User Restored successfully');
    }
    public function delete_all()
    {
        User::onlyTrashed()->forceDelete();
        return redirect()->back()->with('msg', 'All User deleted successfully');
    }
    public function create()
    {
        $user = new User();
        return view('admin.create', compact('user'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        // Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg',
            'address' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'status' => 'required',
        ]);
        // Uploads Files
        $img = $request->file('image');
        $img_name = time() . rand() . $img->getClientOriginalName();
        $img->move(public_path('uploads/users'), $img_name);
        // Store data to database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $img_name,
            'password' => $request->password,
            'role' => $request->input('role'),
            'status' => $request->input('status'),
        ]);
        // Redirect the user
        return redirect()->route('admin.users')->with('msg', 'User created successfully');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg',
            'address' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'status' => 'required'
        ]);
        $user = User::find($id);
        $img_name = $user->image;
        // Uploads Files
        if ($request->hasFile('image')) {
            File::delete(public_path('uploads/users/' . $img_name));
            $img = $request->file('image');
            $img_name = time() . rand() . $img->getClientOriginalName();
            $img->move(public_path('uploads/users'), $img_name);
        }
        // Store data to database
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $img_name,
            'password' => $request->password,
            'role' => $request->input('role'),
            'status' => $request->input('status'),
        ]);
        // Redirect the user
        return redirect()->route('admin.users')->with('msg', 'Post Updated successfully');
    }
}
