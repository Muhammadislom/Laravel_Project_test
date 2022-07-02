<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function __invoke()
    {
        $applications = Application::where('user_id', auth()->user()->id)->get();
        $isApplication = $this->isApplication();
        return view('welcome', compact('applications','isApplication'));
    }
}
