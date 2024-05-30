@extends('layouts.template')

@section('konten')
<div class="container">
    <h1>Tambah Absensi</h1>
    <form action="{{ route('absensi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="karyawan_id">Karyawan:</label>
            <select class="form-control" id="karyawan_id" name="karyawan_id" required>
                
                @foreach($absensis as $karyawan)
                <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="form-group">
            <label for="waktu_masuk">Waktu Masuk:</label>
            <input type="time" class="form-control" id="waktu_masuk" name="waktu_masuk" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
