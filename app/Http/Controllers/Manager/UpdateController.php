<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Application;

class UpdateController extends Controller
{


    public function __invoke(Application $application)
    {
        $application->update(['status' => true]);
        return redirect()->back();
    }
}
