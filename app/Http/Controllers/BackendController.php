<?php

namespace App\Http\Controllers;

use App\Models\User;

class BackendController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'users' => User::paginate(10)
        ]);
    }
}
