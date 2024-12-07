<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poli;
use App\Models\JadwalPraktik;

class RiwayatController extends Controller
{
    //
    public function index()
    {
        $pasien = auth()->guard('pasien')->user();

        $polis = Poli::all();

        return view('pasien.riwayat.index', compact('pasien', 'polis'));
    }

}