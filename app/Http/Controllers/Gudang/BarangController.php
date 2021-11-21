<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data barang',
            'page' => 'barang.index',
        ];
        return view('drawer', $data);
    }

    public function transaksi()
    {
        $data = [
            'title' => 'Transaksi stok barang',
            'page' => 'barang.transaksi',
        ];
        return view('drawer', $data);
    }
}
