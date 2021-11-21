<?php

namespace App\Http\Controllers\Webprofile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Paket menu',
            'page' => 'webadmin.admpaket'
        ];
        return view('drawer', $data);
    }
}
