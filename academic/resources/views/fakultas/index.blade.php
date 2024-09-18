@extends('layouts.main')

@section('content')
<h4>Fakultas</h4>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Fakultas</th>
            <th>Nama Dekan</th>
            <th>Singkatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $fakultas as $row )
        <tr>
            <td>{{$row['nama']}}</td>
            <td>{{$row['dekan']}}</td>
            <td>{{$row['singkatan']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection