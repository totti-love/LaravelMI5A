@extends('layouts.main')

@section('content')
<h4> Edit Fakultas</h4>
<form action="{{route('fakultas.store')}}" method="post">
    @csrf
    Nama
    <input type="text" name="nama" class="form-control mb-2" value="{{$fakultas['nama']}}">
    Dekan
    <input type="text" name="dekan" class="form-control mb-2" value="{{$fakultas['dekan']}}">
    Singkatan
    <input type="text" name="singkatan" class="form-control mb-2" value="{{$fakultas['singkatan']}}">
    
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection