<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function dashboard(): View
    {
        request()->session()->flash('status', 'THIS IS SPAARTA!!');
        return view('pages.dashboard');
    }
}
