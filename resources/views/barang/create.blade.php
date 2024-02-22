@extends('layouts.adm-main')

@section('content')
    <h2>Tambah Barang</h2>

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="merk">Merk:</label>
            <input type="text" name="merk" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="seri">Seri:</label>
            <input type="text" name="seri" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="spesifikasi">Spesifikasi:</label>
            <textarea name="spesifikasi" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="kategori_id">Kategori:</label>
            <select name="kategori_id" class="form-control" required>
                @foreach ($kategori as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->deskripsi }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Tambah Barang</button>
    </form>
@endsection
