<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function landing()
    {
        return view('landing');
    }
}
