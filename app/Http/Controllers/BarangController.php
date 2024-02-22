<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('kategori')->get();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('barang.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required',
            'seri' => 'required',
            'spesifikasi' => 'required',
            // 'stok' => 'required',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit(Barang $barang)
    {
        $kategori = Kategori::all();
        return view('barang.edit', compact('barang', 'kategori'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'merk' => 'required',
            'seri' => 'required',
            'spesifikasi' => 'required',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    public function destroy(string $id)
    { {
            if (DB::table('barangmasuk')->where('barang_id', $id)->exists() OR DB::table('barangkeluar')->where('barang_id', $id)->exists()) {
                return redirect()->route('barang.index')->with(['Gagal' => 'Data Gagal Dihapus!']);
            }

            // if (DB::table('barangkeluar')->where('barang_id', $id)->exists()) {
                // return redirect()->route('barang.index')->with(['Gagal' => 'Data Gagal Dihapus!']);
            // }

            $barang = Barang::find($id);
            $barang->delete();

            return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }

    }
}
