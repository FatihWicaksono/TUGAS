<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $dataMahasiswa = Mahasiswa::all();

        return view('mahasiswa.index', compact('dataMahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'angkatan' => 'required',
            'sks' => 'required',
            'status' => 'required',
        ]);

        Mahasiswa::create($request->all());

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function show($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();
        
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $nim)
    {
        $request->validate([
            'nama' => 'required',
            'angkatan' => 'required',
            'sks' => 'required',
            'status' => 'required',
        ]);

        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();
        $mahasiswa->update($request->all());

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil diubah!');
    }

    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();
        $mahasiswa->delete();

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}