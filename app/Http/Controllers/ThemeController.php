<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * mode change
     * @return void
     */
    public function mode_change()
    {
        session(['dark_mode' => request()->mode]);
        return back();
    }
}
