<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function isApplication()
    {
        $applications = Application::where('user_id', auth()->user()->id)->get();
        $length = count($applications);
        if (count($applications) > 0) {
            $length = count($applications);
            return Carbon::parse($applications[$length - 1]->created_at)->addHours(24) < Carbon::now();
        } else {
            return true;
        }

    }
}
