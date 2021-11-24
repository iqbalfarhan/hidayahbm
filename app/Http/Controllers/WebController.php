<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use App\Profil;
use App\Paket;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('layouts.landing');
    }

    public function menu(Request $request)
    {
        if ($request->paket) {
            $datas = Paket::find($request->paket);
        }
        else{
            $datas = Paket::all();
        }

        $data = [
            'title' => 'Daftar Menu',
            'datas' => $datas,
            'view' => $request->paket ? "single" : "all"
        ];
        return view('webdetail.paket', $data);
    }

    public function profil($slug = null)
    {
        if ($slug) {
            $datas = Profil::where('slug', $slug)->first();
        }
        else{
            $datas = Profil::all();
        }

        $data = [
            'bread' => ['profil', $slug],
            'title' => $datas->judul,
            'datas' => $datas,
            'view' => $slug ? $slug : "all"
        ];
        return view('webdetail.profil', $data);
    }

    public function legalitas()
    {
        $data = [
            'bread' => ['profil', 'legalitas'],
            'title' => 'Legalistas dan lisensi',
            'datas' => Legalitas::all(),
        ];
        return view('webdetail.legalitas', $data);
    }

    public function kegiatan($slug = null)
    {
        if ($slug) {
            $datas = Kegiatan::where('slug', $slug)->first();
        }
        else{
            $datas = Kegiatan::all();
        }

        $data = [
            'bread' => ['kegiatan', $slug ?? "Semua kegiatan"],
            'title' => $slug ? $datas->judul : "Semua kegiatan",
            'datas' => $datas,
            'view' => $slug ? $slug : "all"
        ];
        return view('webdetail.kegiatan', $data);
    }
}
