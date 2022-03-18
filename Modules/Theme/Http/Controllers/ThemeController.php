<?php

namespace Modules\Theme\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('theme::index');
    }

    /**
     * mode change
     *
     */
    public function mode_change()
    {
        session(['dark_mode' => request()->mode]);
        return back();
    }
}
