<?php

namespace App\Http\Controllers\Webprofile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $data = [
            'withNew' => true,
            'title' => 'data Segemen layanan',
            'page' => 'webadmin.admlayanan'
        ];
        return view('drawer', $data);
    }
}
