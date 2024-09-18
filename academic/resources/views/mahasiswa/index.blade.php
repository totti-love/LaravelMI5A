@extends('layouts.main')

@section('content')
<h4>Mahasiswa</h4>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Tempat Lahir</th>
            <th>Program Studi</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $mahasiswa as $row )
        <tr>
            <td>{{$row['npm']}}</td>
            <td>{{$row['nama']}}</td>
            <td>{{$row['tanggal_lahir']}}</td>
            <td>{{$row['tempat_lahir']}}</td>
            <td>{{$row['prodi']['nama']}}</td>
            <td><a href="{{route('mahasiswa.show', $row['id'])}}"
             class="btn btn-primary btn-xs">Show</></a></td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection