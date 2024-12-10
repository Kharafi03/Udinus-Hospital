<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Poli;
use App\Models\Obat;

class DashboardController extends Controller
{
    //
    public function index(){
        $jumlah_dokter = Dokter::all()->count();
        $jumlah_pasien = Pasien::all()->count();
        $jumlah_poli = Poli::all()->count();
        $jumlah_obat = Obat::all()->count();

        return view('admin.dashboard.index', compact(
            'jumlah_dokter',
            'jumlah_pasien',
            'jumlah_poli',
            'jumlah_obat'
        ));
    }
}
