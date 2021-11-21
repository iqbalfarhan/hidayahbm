<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = [
            'page' => 'finance.transaksi.index'
        ];

        return view('drawer', $data);
    }
}
