<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::with('absensi')->get();
        return view('karyawan.index')->with([
            'title'=>'Karyawan',
            'karyawan'=>$karyawans
        ]);
    }

    public function create()
    {
        
        $karyawans = Karyawan::all();
        return view('karyawan.create')->with([
            'title'=>'Karyawan',
            'karyawans'=>$karyawans,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:karyawans',
            'jabatan' => 'required',
        ]);

        Karyawan::create($request->all());
        return redirect()->route('karyawan.index');
    }

    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'))->with([
            'title'=>'Karyawan'
        ]);
        
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:karyawans,email,' . $karyawan->id,
            'jabatan' => 'required',
        ]);

        $karyawan->update($request->all());
        return redirect()->route('karyawan.index');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawan.index');
    }
}
