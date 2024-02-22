@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Kategori</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('kategori.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi:</label>
                                <input type="text" name="deskripsi" id="deskripsi" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="kategori">Kategori:</label>
                                <select name="kategori" id="kategori" class="form-control" required>
                                    @foreach($aKategori as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection