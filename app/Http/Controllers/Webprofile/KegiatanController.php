<?php

namespace App\Http\Controllers\Webprofile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $data = [
            'withNew' => true,
            'title' => 'Kegiatan',
            'page' => 'webadmin.admkegiatan'
        ];
        return view('drawer', $data);
    }
}
