@extends('layouts.adm-main')

@section('content')
<div class="container">
    <h2>Daftar Barang Keluar</h2>
    <a href="{{ route('barangkeluar.create') }}" class="btn btn-primary mb-3">TAMBAH BARANG KELUAR</a>
    @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif

    @if(session('Gagal'))
    <div class="alert alert-danger mt-3">
        {{ session('Gagal') }}
    </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="text-center">
                    <th style="width: 5%">ID</th>
                    <th style="width: 15%">Tanggal Keluar</th>
                    <th style="width: 16%">Jumlah Keluar</th>
                    <th>Merk</th>
                    <th style="width: 12.3%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangkeluar as $bk)
                <tr class="text-center">
                    <td>{{ $bk->id }}</td>
                    <td>{{ $bk->tgl_keluar }}</td>
                    <td>{{ $bk->qty_keluar }}</td>
                    <td>{{ $bk->barang->merk }}</td>
                    <td class="text-center">
                        <a href="{{ route('barangkeluar.show', $bk->id) }}" class="btn btn-sm btn-info"><i
                                class="fa fa-eye"></i></a>
                        <a href="{{ route('barangkeluar.edit', $bk->id) }}" class="btn btn-sm btn-primary"><i
                                class="fa fa-pencil-alt"></i></a>

                        <form action="{{ route('barangkeluar.destroy', $bk->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus?');"><i
                                    class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Data Barang Keluar belum tersedia</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- <div class="pagination">
        {{ $barangkeluar->links() }}
    </div> -->
</div>
@endsection