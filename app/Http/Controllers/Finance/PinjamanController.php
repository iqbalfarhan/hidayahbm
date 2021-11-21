<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data pinjaman',
            'page' => 'finance.pinjaman.index',
        ];
        
        return view('drawer', $data);
    }
}
