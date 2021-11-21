<?php

namespace App\Http\Controllers\Webprofile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $data = [
            'page' => 'webadmin.admprofil'
        ];

        return view('drawer', $data);
    }

    public function strorg()
    {
        $data = [
            'page' => 'webadmin.admstrorg'
        ];

        return view('drawer', $data);
    }

    public function rekanan()
    {
        $data = [
            'page' => 'webadmin.admrekanan'
        ];

        return view('drawer', $data);
    }
}
