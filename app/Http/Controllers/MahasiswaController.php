<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //panggil model fakultas
        $result = Mahasiswa::all();
        //dd($result);

        //kirim data $result ke view fakultas?index.blade.php

        return view('mahasiswa.index')->with('mahasiswa', $result);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.create')->with('prodi', $prodi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            "npm" => "required|unique:mahasiswas",
            "nama" => "required",
            "tanggal_lahir" => "required",
            "tempat_lahir" => "required",
            "email" => "required",
            "hp" => "required",
            "alamat" => "required",
            "prodi_id" => "required"
        ]);

        //simpan
        Mahasiswa::create($input);

        //redirect beserta pesan success
        return redirect()->route('mahasiswa.index')->with(
            'success',
            $request->nama . ' berhasil disimpan'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //dd($mahasiswa);
        return view('mahasiswa.show')->with('mahasiswa', $mahasiswa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $prodi = Prodi::all();
        //dd($fakultas);
        return view('mahasiswa.edit')->with('mahasiswa', $prodi)
            ->with('prodi', $prodi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        //dd($prodi);
        $input = $request->validate([
            "nama" => "required",
            "tanggal_lahir" => "required",
            "tempat_lahir" => "required",
            "email" => "required",
            "hp" => "required",
            "alamat" => "required",
            "prodi_id" => "required"
        ]);
        //update data
        $mahasiswa->update($input);
        //redirect beserta pesan sukses
        return redirect()->route('mahasiswa.index')->with(
            'success',
            $request->nama . ' berhasil diubah'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }

    public function getMahasiswa()
    {
        $response['data'] = Mahasiswa::all();
        $response['message'] = 'List data fakultas';
        $response['success'] = true;

        return response()->json($response, 200);
    }

    public function storeFakultas(Request $request)
    {
        $input = $request->validate([
            "npm" => "required|unique:mahasiswas",
            "nama" => "required",
            "tanggal_lahir" => "required",
            "tempat_lahir" => "required",
            "email" => "required",
            "hp" => "required",
            "alamat" => "required",
            "prodi_id" => "required",
            "foto" => "nullable|image|mimes:jpg,jpeg,png,webp|max:2048"
        ]);
        // Cek apakah ada file foto yang diupload
        if ($request->hasFile('foto')) {
            //upload foto
            $fotopath = $request->file('foto')->store('images', 'public');

            $input['foto'] = $fotopath;
        }

        //simpan
        Mahasiswa::create($input);
        $hasil = Mahasiswa::create($input);
        if ($hasil) { // jika data berhasil disimpan
            $response['success'] = true;
            $response['message'] = $request->nama . " berhasil disimpan";
            return response()->json($response, 201); // 201 Created
        } else {
            $response['success'] = false;
            $response['message'] = $request->nama . " gagal disimpan";
            return response()->json($response, 400); // 400 Bad Request
        }
    }
}