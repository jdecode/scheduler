<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function dashboard(): View
    {
        if (Str::endsWith(url()->previous(), 'login')) {
            request()->session()->flash('status', 'Welcome to dashboard!');
        }
        return view('pages.dashboard');
    }

    public function termsOfService(): View
    {
        return view('pages.terms-of-service');
    }

    public function privacyPolicy(): View
    {
        return view('pages.privacy-policy');
    }
}
