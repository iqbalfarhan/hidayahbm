<?php

namespace App\Http\Controllers\Webprofile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Gallery Photo dan kegiatan',
            'page' => 'webadmin.admgaleri'
        ];
        return view('drawer', $data);
    }
}
