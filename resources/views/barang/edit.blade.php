@extends('layouts.adm-main')

@section('content')
    <h2>Edit Barang</h2>

    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="merk">Merk:</label>
            <input type="text" name="merk" class="form-control" value="{{ $barang->merk }}" required>
        </div>
        <div class="form-group">
            <label for="seri">Seri:</label>
            <input type="text" name="seri" class="form-control" value="{{ $barang->seri }}" required>
        </div>
        <div class="form-group">
            <label for="spesifikasi">Spesifikasi:</label>
            <textarea name="spesifikasi" class="form-control" required>{{ $barang->spesifikasi }}</textarea>
        </div>
        <div class="form-group">
            <label for="kategori_id">Kategori:</label>
            <select name="kategori_id" class="form-control" required>
                @foreach ($kategori as $kategori)
                    <option value="{{ $kategori->id }}" @if ($barang->kategori_id == $kategori->id) selected @endif>{{ $kategori->deskripsi }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Update Barang</button>
    </form>
@endsection
