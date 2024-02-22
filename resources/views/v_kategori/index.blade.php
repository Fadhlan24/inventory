@extends('layouts.adm-main')

@section('content')
<div class="container">
    <h2>Daftar Kategori</h2>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">TAMBAH KATEGORI</a>

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

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="text-center">
                    <th style="width: 5%">ID</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Keterangan Kategori</th>
                    <th style="width: 12.28%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rsetKategori as $kategori)
                <tr class="text-center">
                    <td>{{ $kategori->id }}</td>
                    <td>{{ $kategori->deskripsi }}</td>
                    <td>{{ $kategori->kategori }}</td>
                    <td>{{ $kategori->ketKategori }}</td>
                    <td class="text-center">
                        <a href="{{ route('kategori.show', $kategori->id) }}" class="btn btn-sm btn-info"><i
                                class="fa fa-eye"></i></a>
                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-sm btn-primary"><i
                                class="fa fa-pencil-alt"></i></a>
                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                            style="display: inline;">
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
        {{$rsetKategori->links('pagination::bootstrap-4')}}
    </div>
    @endsection