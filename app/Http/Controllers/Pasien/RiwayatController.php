<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poli;
use App\Models\JadwalPraktik;
use App\Models\DaftarPoli;


class RiwayatController extends Controller
{
    //
    public function index()
    {
        $pasien = auth()->guard('pasien')->user();

        $polis = Poli::all();

        $riwayats = DaftarPoli::where('id_pasien', $pasien->id)->get();

        return view('pasien.riwayat.index', compact('pasien', 'polis', 'riwayats'));
    }

    public function getJadwal($id_poli)
    {
        $jadwals = JadwalPraktik::whereHas('dokter', function ($query) use ($id_poli) {
            $query->where('id_poli', $id_poli);
        })
            ->where('is_active', 1)
            ->with('dokter:id,nama')
            ->get(['id', 'hari', 'jam_mulai', 'jam_selesai', 'id_dokter']);

        return response()->json($jadwals);
    }

    public function daftarPoli(Request $request)
    {
        $request->validate([
            'poli' => 'required|exists:poli,id',
            'tgl_periksa' => 'required|date|after:today|before_or_equal:' . now()->addDays(30)->toDateString(),
            'jadwal' => 'required|exists:jadwal_praktik,id',
            'keluhan' => 'required|string|max:255',
        ]);

        $pasien = auth()->guard('pasien')->user();

        $noAntrian = DaftarPoli::where('id_jadwal', $request->jadwal)
            ->where('tgl_periksa', $request->tgl_periksa)
            ->max('no_antrian') + 1;

        DaftarPoli::create([
            'id_pasien' => $pasien->id,
            'id_jadwal' => $request->jadwal,
            'tgl_periksa' => $request->tgl_periksa,
            'keluhan' => $request->keluhan,
            'no_antrian' => $noAntrian,
        ]);

        return redirect()->route('pasien.riwayat.index')->with([
            'message' => 'Pendaftaran berhasil!',
            'alert-type' => 'success'
        ]);
        
    }
}
