<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.users.index');  
    }

    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select('id', 'name', 'gender', 'address', 'phone', 'email', 'role', 'created_at', 'updated_at', 'picture')
                ->get();

            return DataTables::of($users)
                ->addColumn('action', function($row) {
                    return '<a href="' . route('users.edit', $row->id) . '" class="btn btn-warning btn-sm m-1">Edit</a>
                            <a href="javascript:void(0)" onclick="deleteUser(' . $row->id . ')" class="btn btn-danger btn-sm m-1">Delete</a>';
                })
                ->editColumn('picture', function ($user) {
                    return $user->picture ? '<img src="data:image/jpeg;base64,' . $user->picture . '" style="width: 50px; height: 50px; object-fit: cover;" />' : 'No Image';
                })
                ->make(true);
        }
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'role' => 'nullable|in:user,admin',
        ]);

        $data = [
            'name' => $request->name,
            'gender' => $request->gender,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?: 'user',
        ];

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $imageData = file_get_contents($image->getRealPath());
            $data['picture'] = $imageData; 
        }

        $user = User::create($data);

        return redirect()->route('users.index')->with('status', 'User created successfully!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'nullable|in:user,admin',
        ]);

        $user = User::findOrFail($id);
        $data = [
            'name' => $request->name,
            'gender' => $request->gender,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => $request->role ?: 'user',
        ];

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $imageData = file_get_contents($image->getRealPath());
            $data['picture'] = $imageData; 
        }

        $user->update($data);

        return redirect()->route('users.index')->with('status', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->picture) {
            $user->picture = null;
        }

        $user->delete();

        return response()->json(['success' => 'User deleted successfully']);
    }
}

