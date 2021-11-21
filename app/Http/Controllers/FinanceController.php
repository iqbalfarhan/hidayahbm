<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function transaksi()
    {
        $data = [
            'title' => 'Transaksi',
            'page' => 'finance.transaksi'
        ];
        return view('drawer', $data);
    }

    public function pinjaman()
    {
        $data = [
            'title' => 'Pinjaman',
            'page' => 'finance.pinjaman'
        ];
        return view('drawer', $data);
    }
}
