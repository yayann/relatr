<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use App\Models\Provider;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Relations', [
            'allProviders' => Provider::all(),
            'allConsumers' => Consumer::all(),

            'providers' => Provider::with([
                'consumers', 'toProviders', 'fromProviders',
            ])->get(),
        ]);
    }
}
