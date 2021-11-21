<?php

namespace App\Http\Controllers\Finance;

use App\Pemasukan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index()
    {
        $data = [
            'withFilterTanggal' => true,
            'title' => 'Pemasukan',
            'page' => 'finance.pemasukan.index',
        ];
        
        return view('drawer', $data);
    }

    public function show(Pemasukan $pemasukan)
    {
        $data = [
            'title' => 'Pemasukan',
            'data' => $pemasukan,
            'page' => 'finance.pemasukan.show',
        ];
        
        return view('drawer', $data);
    }
}
