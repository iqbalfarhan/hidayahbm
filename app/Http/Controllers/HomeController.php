<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'withFilter' => false,
            'title' => 'Dashboard',
        ];

        return view('home', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Edit Profile',
            'page' => 'comp.profile'
        ];

        return view('drawer', $data);
    }
}
