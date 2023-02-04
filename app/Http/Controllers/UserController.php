<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.user.index');
    }

    public function store(StoreUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back();
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password
        ]);

        $user->detachRole($user->role);

        $user->attachRole($request->role);

        // Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function delete(User $user)
    {
        $user->detachRole($user->role);

        $user->delete();
        // Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }
}