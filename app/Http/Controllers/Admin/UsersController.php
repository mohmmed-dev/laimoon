<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function users(Request $request)
    {
        return view('admin.users.index');
    }

    public function subscribers(Request $request)
    {
        return view('admin.users.subscribers');
    }

    public function buyers(Request $request)
    {
        return view('admin.users.buyers');
    }
}
