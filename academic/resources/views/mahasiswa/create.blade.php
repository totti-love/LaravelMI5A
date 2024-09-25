@extends('layouts.main')

@section('content')
<h4>Mahasiswa</h4>
<form action="{{route('mahasiswa.store')}}" method="post">
    @csrf
    NPM
    <input type="text" name="npm" class="form-control mb-2">
    Nama
    <input type="text" name="nama" class="form-control mb-2">
    Tanggal Lahir
    <input type="date" name="tanggal_lahir" class="form-control mb-2">
    Tempat Lahir
    <input type="text" name="tempat_lahir" class="form-control mb-2">
    Email
    <input type="email" name="email" class="form-control mb-2">
    HP
    <input type="text" name="hp" class="form-control mb-2">
    Alamat
    <input type="text-area" name="alamat" class="form-control mb-2">
    <select name="prodi_id" class="form-control">
            @foreach ($prodi as $item)
                <option value="{{ $item['id'] }}"> {{ $item['nama']}}</option>
            @endforeach
        </select>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection