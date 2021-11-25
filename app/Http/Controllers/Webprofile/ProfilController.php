<?php

namespace App\Http\Controllers\Webprofile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Profil perusahaan',
            'page' => 'webadmin.admprofil'
        ];

        return view('drawer', $data);
    }

    public function strorg()
    {
        $data = [
            'withNew' => true,
            'title' => 'Struktur Organisasi',
            'page' => 'webadmin.admstrorg'
        ];

        return view('drawer', $data);
    }

    public function rekanan()
    {
        $data = [
            'withNew' => true,
            'title' => 'Perusahaan rekanan',
            'page' => 'webadmin.admrekanan'
        ];

        return view('drawer', $data);
    }
}
