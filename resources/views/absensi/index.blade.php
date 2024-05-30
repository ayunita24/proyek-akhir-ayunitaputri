@extends('layouts.template')

@section('konten')
<div class="container">
    <h1>Daftar Absensi</h1>
    <a href="{{ route('absensi.create') }}" class="btn btn-primary">Tambah Absensi</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Karyawan</th>
                <th>Tanggal</th>
                <th>Waktu Masuk</th>
            
                
            </tr>
        </thead>
        <tbody>
            @foreach($absensis as $absensi)
            <tr>
                <td>{{ $absensi->karyawan->nama }}</td>
                <td>{{ $absensi->tanggal }}</td>
                <td>{{ $absensi->waktu_masuk }}</td>
               
                <td>
                    
                    <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
