<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisteredUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('registered_users', ['users' => $users]);
    }
}
