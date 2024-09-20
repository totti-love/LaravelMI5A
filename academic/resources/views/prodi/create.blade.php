@extends('layouts.main')

@section('content')
<h4>Fakultas</h4>
<form action="{{route('prodi.store')}}" method="post">
    @csrf
    Nama
    <input type="text" name="nama" class="form-control mb-2">
    Kaprodi
    <input type="text" name="kaprodi" class="form-control mb-2">
    Singkatan
    <input type="text" name="singkatan" class="form-control mb-2">
    Fakultas
    <select type="text" name="" class="form-control mb-2">
        @foreach ($fakultas as $item)
            <option value="{{$item['id']}}">{{$item['nama']}}</option>
        @endforeach
    </select>
    
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection