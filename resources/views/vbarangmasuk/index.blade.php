@extends('layouts.adm-main')

@section('content')
<div class="container">
    <h2>Daftar Barang Masuk</h2>
    <a href="{{ route('barangmasuk.create') }}" class="btn btn-primary mb-3">TAMBAH BARANG MASUK</a>
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
                    <th style="width: 15%">Tanggal Masuk</th>
                    <th style="width: 16%">Jumlah Masuk</th>
                    <th>Stok</th>
                    <th>Merk</th>
                    <th style="width: 12.3%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangmasuk as $bm)
                <tr class="text-center">
                    <td>{{ $bm->id }}</td>
                    <td>{{ $bm->tgl_masuk }}</td>
                    <td>{{ $bm->qty_masuk }}</td>
                    <td>{{ $bm->barang->stok}}</td>
                    <td>{{ $bm->barang->merk }}</td> <!-- Ubah 'nama' dengan kolom yang tepat -->
                    <td class="text-center">
                        <a href="{{ route('barangmasuk.show', $bm->id) }}" class="btn btn-sm btn-info"><i
                                class="fa fa-eye"></i></a>
                        <a href="{{ route('barangmasuk.edit', $bm->id) }}" class="btn btn-sm btn-primary"><i
                                class="fa fa-pencil-alt"></i></a>

                        <form action="{{ route('barangmasuk.destroy', $bm->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i
                                    class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Data Barang Masuk belum tersedia</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- <div class="pagination">
        {{ $barangmasuk->links() }}
    </div> -->
</div>
@endsection