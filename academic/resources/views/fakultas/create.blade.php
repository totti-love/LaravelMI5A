@extends('layouts.main')

@section('content')
<h4>Fakultas</h4>
<form action="{{route('fakultas.store')}}" method="post">
    @csrf
    Nama
    <input type="text" name="nama" class="form-control mb-2">
    Dekan
    <input type="text" name="dekan" class="form-control mb-2">
    Singkatan
    <input type="text" name="singkatan" class="form-control mb-2">
    
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection