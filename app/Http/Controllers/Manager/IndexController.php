<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
//        $applications = Application::all()
        $users = User::where('role', 1)->get();
//        dd($users);
        return view('manager', compact('users'));
    }
}
