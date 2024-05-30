<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = Absensi::with('karyawan')->get();
        return view('absensi.index')->with([
            'title'=>'Absensi',
            'absensis'=>$absensis
        ]);
    }

    public function create()
    {
        $absensis = Karyawan::with('absensi')->get();
        return view('absensi.create')->with([
            'title'=>'Absensi',
            'absensis'=>$absensis
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required|date_format:H:i',
        ]);

        Absensi::create($request->all());
        return redirect()->route('absensi.index');
    }

    public function show(Absensi $absensi)
    {
        return view('absensi.show', compact('absensi'));
    }

    public function edit(Absensi $absensi)
    {
        $karyawans = Karyawan::all();
        return view('absensi.edit', compact('absensi', 'karyawans'));
    }

    public function update(Request $request, Absensi $absensi)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
        ]);

        $absensi->update($request->all());
        return redirect()->route('absensi.index');
    }

    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect()->route('absensi.index');
    }
}
