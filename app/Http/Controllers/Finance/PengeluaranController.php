<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'data pengeluaran',
            'page' => 'finance.pengeluaran.index',
        ];
        
        return view('drawer', $data);
    }
}
