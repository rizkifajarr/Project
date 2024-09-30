<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function indexByRole(string $role, string $view)
    {
        $users = User::with('reservations')
            ->where('role', $role)
            ->paginate(10);

        return view($view, compact('users'));
    }
    public function owner_index()
    {
        return $this->indexByRole('Owner', 'admin.accounts.owner');
    }
    public function admin_index()
    {
        return $this->indexByRole('Admin', 'admin.accounts.admin');
    }
    public function customers_index()
    {
        return $this->indexByRole('Customer', 'admin.accounts.customers');
    }
    public function create()
    {
        if (Auth::user()->role !== 'Owner') {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.accounts.create.index');
    }
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'Owner') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|string|unique:users,phone',
                'password' => 'required|string|min:8',
                'role' => 'required|in:Admin,Owner',
            ],
            [
                'email.unique' => 'Email sudah terdaftar.',
                'phone.unique' => 'Nomor HP sudah terdaftar.',
            ]
        );

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->role = $request->input('role');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('admin.accounts.' . strtolower($user->role))
            ->with('success', ucfirst($user->role) . ' created successfully');
    }
    //Edit
    public function owner_edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('admin.accounts.edit.owner', compact('users'));
    }
    public function owner_update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'role' => 'required',
        ]);

        $users = User::findOrFail($id);

        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->phone = $request->input('phone');
        $users->save();
        return redirect()->route('admin.accounts.owner');
    }
    public function admin_edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('admin.accounts.edit.admin', compact('users'));
    }
    public function admin_update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'role' => 'required',
        ]);

        $users = User::findOrFail($id);

        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->phone = $request->input('phone');
        $users->save();
        return redirect()->route('admin.accounts.admin');
    }
    public function customer_edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('admin.accounts.edit.customers', compact('users'));
    }
    public function customer_update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'role' => 'required',
        ]);

        $users = User::findOrFail($id);

        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->phone = $request->input('phone');
        $users->save();
        return redirect()->route('admin.accounts.customers');
    }
    //Delete
    public function owner_delete(User $users)
    {
        $users->delete();
        return redirect()->route('admin.accounts.owner');
    }
    public function admin_delete(User $users)
    {
        $users->delete();
        return redirect()->route('admin.accounts.admin');
    }
    public function customer_delete(User $users)
    {
        $users->delete();
        return redirect()->route('admin.accounts.customers');
    }
}
