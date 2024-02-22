@extends('layouts.adm-main')

<!-- resources/views/barang/show.blade.php -->

@section('content')
    <h2>Detail Barang</h2>

    <table class="table mt-3">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $barang->id }}</td>
            </tr>
            <tr>
                <th>Merk</th>
                <td>{{ $barang->merk }}</td>
            </tr>
            <tr>
                <th>Seri</th>
                <td>{{ $barang->seri }}</td>
            </tr>
            <tr>
                <th>Spesifikasi</th>
                <td>{{ $barang->spesifikasi }}</td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>{{ $barang->kategori->deskripsi }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning">Edit</a>

    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
    </form>

    <a href="{{ route('barang.index') }}" class="btn btn-primary">Kembali</a>
@endsection
