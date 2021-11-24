<?php

namespace App\Http\Controllers\Webprofile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LegalitasController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Legalitas dan lisensi',
            'page' => 'webadmin.admlegalitas'
        ];

        return view('drawer', $data);
    }
}
