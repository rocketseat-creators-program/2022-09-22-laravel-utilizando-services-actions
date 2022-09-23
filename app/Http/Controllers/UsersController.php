<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController
{
    public function index()
    {
        $users = User::paginate(25);

        return view('users.index', compact('users'));
    }

    public function toggleActive($id)
    {
        $user = User::findOrFail($id);
        $user->active = !$user->active;
        $user->save();

        return redirect()->route('users.index');
    }
}
