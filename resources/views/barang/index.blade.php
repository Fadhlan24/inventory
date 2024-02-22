@extends('layouts.adm-main')

<!-- resources/views/barang/index.blade.php -->

@section('content')
<div class="container">
    <h2>Daftar Barang</h2>
    <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">TAMBAH BARANG</a>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('Gagal'))
    <div class="alert alert-danger">
        {{ session('Gagal') }}
    </div>
    @endif

    <div class="table-reponsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="text-center">
                    <th style="width: 5%">ID</th>
                    <th>Merk</th>
                    <th>Seri</th>
                    <th>Spesifikasi</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th style="width: 12.3%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $barang)
                <tr class="text-center">
                    <td>{{ $barang->id }}</td>
                    <td>{{ $barang->merk }}</td>
                    <td>{{ $barang->seri }}</td>
                    <td>{{ $barang->spesifikasi }}</td>
                    <td>{{ $barang->stok}}</td>
                    <td>{{ $barang->kategori->deskripsi }}</td>
                    <td>
                        <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-sm btn-info"><i
                                class="fa fa-eye"></i></a>
                        <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-sm btn-primary"><i
                                class="fa fa-pencil-alt"></i></a>
                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i
                                    class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection