@extends('layouts.adm-main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Siswa</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('siswa.create') }}" class="btn btn-success mb-2">Tambah Siswa</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Gender</th>
                                <th>Rombel</th>
                                <th>Kelas</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->nis }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->rombel }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td class="text-center">
                                         <img src="{{ asset('storage/foto_siswa/'.$item->foto) }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>
                                        <a href="{{ route('siswa.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                        <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{ $siswa->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


