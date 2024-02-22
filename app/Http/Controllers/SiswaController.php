<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $siswa = Siswa::latest()->paginate(10);        
        return view('siswa.index',compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('siswa.create');
    }

    /**
 * Display the specified resource.
 */
public function show($id)
{
    $siswa = Siswa::find($id);
    if (!$siswa) {
        return redirect()->route('siswa.index')->with('error', 'Data siswa tidak ditemukan');
    }
    return view('siswa.show', compact('siswa'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nis' => 'required|unique:siswa,nis',
            'nama' => 'required',
            'gender' => 'required|in:M,F',
            'rombel' => 'required|in:A,B',
            'kelas' => 'required|in:X,XI,XII,XIII',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        //upload image
        $foto = $request->file('foto');
        $foto->storeAs('public/foto_siswa', $foto->hashName());

        // Simpan data siswa ke database
        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'rombel' => $request->rombel,
            'kelas' => $request->kelas, 
            'foto' => $foto->hashName()
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan');
    }

    // ...

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input dari form
        $request->validate([
            'nis' => 'required|unique:siswa,nis,' . $id,
            'nama' => 'required',
            'gender' => 'required|in:M,F',
            'rombel' => 'required|in:A,B',
            'kelas' => 'required|in:X,XI,XII,XIII',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        // Cari data siswa berdasarkan ID
        $siswa = Siswa::find($id);

        if ($request->hasFile('foto')) {

            //upload new image
            $foto = $request->file('foto');
            $foto->storeAs('public/foto_siswa', $foto->hashName());

            //delete old image
            Storage::delete('public/foto_siswa/'.$siswa->foto);

            //update post with new image
            $siswa->update([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'gender' => $request->gender,
                'rombel' => $request->rombel,
                'kelas' => $request->kelas, 
                'foto' => $foto->hashName()
            ]);

        } else {

            //update post without image
            $siswa->update([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'gender' => $request->gender,
                'rombel' => $request->rombel,
                'kelas' => $request->kelas, 
            ]);
        }


        // // Perbarui data siswa
        // $siswa->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui');
    }

    // ...

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::find($id);
        //delete image
        Storage::delete('public/foto_siswa/'. $siswa->foto);

        //delete post
        $siswa->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus');
    }
}