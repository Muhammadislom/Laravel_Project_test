<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreRequest;
use App\Models\Application;
use Carbon\Carbon;

class StoreController extends Controller
{


    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['file'] = $request->file('file')->store('uploads', 'public');
        $data['user_id'] = auth()->user()->id;

        if ($this->isApplication()) {
            Application::create($data);
        }
        return redirect()->route('home');
    }
}
