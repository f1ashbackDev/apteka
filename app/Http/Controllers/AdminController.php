<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showUsers()
    {
        return view('new_admin.users', [
            'users' => User::all()
        ]);
    }

    public function showUpdateUser($id)
    {
        $user = User::all()->where('id', '=', $id);
        return view('new_admin.editUsers', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id)->first();
        $user->role = $request->role;
        $user->save();
        return redirect('/admin/users');
    }

    public function deleteUser($id)
    {
        $user = User::where('id', $id);
        $user->delete();
        return redirect('/admin/users');
    }
}
