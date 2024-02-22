@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('kategori.update',$rsetKategori->id) }}" method="POST" enctype="multipart/form-data">                    
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">DESKRIPSI</label>
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi',$rsetKategori->deskripsi) }}" placeholder="Masukkan Deskripsi Kategori">
                            
                                <!-- error message untuk deskripsi -->
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">KATEGORI</label>
                                <select class="form-select @error('kategori') is-invalid @enderror" name="kategori" aria-label="Default select example">
                                    <option value="M" {{ $rsetKategori->kategori == 'M' ? 'selected' : '' }}>Barang Modal</option>
                                    <option value="A" {{ $rsetKategori->kategori == 'A' ? 'selected' : '' }}>Alat</option>
                                    <option value="BHP" {{ $rsetKategori->kategori == 'BHP' ? 'selected' : '' }}>Bahan Habis Pakai</option>
                                    <option value="BTHP" {{ $rsetKategori->kategori == 'BTHP' ? 'selected' : '' }}>Bahan Tidak Habis Pakai</option>
                                </select>

                                <!-- error message untuk kategori -->
                                @error('kategori')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            <a href="{{ route('kategori.index') }}" class="btn btn-md btn-primary">KEMBALI</a>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection