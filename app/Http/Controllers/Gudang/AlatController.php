<?php

namespace App\Http\Controllers\Gudang;

use App\Alat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Database Alat',
            'page' => 'gudang.alat.index',
        ];
        
        return view('drawer', $data);
    }
}
