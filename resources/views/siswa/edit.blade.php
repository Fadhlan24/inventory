<!DOCTYPE html>
<html>
    <head>
        <title>Siswa 01</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <h1>Ubah siswa</h1>
        <hr/>

@extends('layouts.adm-main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Siswa</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('siswa.update', $siswa->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="text" name="nis" id="nis" class="form-control" value="{{ $siswa->nis }}" required>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $siswa->nama }}" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="M" {{ $siswa->gender === 'M' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="F" {{ $siswa->gender === 'F' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="rombel">Rombel</label>
                            <select name="rombel" id="rombel" class="form-control" required>
                                <option value="A" {{ $siswa->rombel === 'A' ? 'selected' : '' }}>Rombel A</option>
                                <option value="B" {{ $siswa->rombel === 'B' ? 'selected' : '' }}>Rombel B</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select name="kelas" id="kelas" class="form-control" required>
                                <option value="X" {{ $siswa->kelas === 'X' ? 'selected' : '' }}>X</option>
                                <option value="XI" {{ $siswa->kelas === 'XI' ? 'selected' : '' }}>XI</option>
                                <option value="XII" {{ $siswa->kelas === 'XII' ? 'selected' : '' }}>XII</option>
                                <option value="XIII" {{ $siswa->kelas === 'XIII' ? 'selected' : '' }}>XIII</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
