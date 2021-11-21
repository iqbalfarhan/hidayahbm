<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data transaksi barang',
            'page' => 'gudang.transaksi.index'
        ];

        return view('drawer', $data);
    }
}
