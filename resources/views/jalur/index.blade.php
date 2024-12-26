@extends('layouts.admin')
@section('main-content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body style="background: #117958">
    <div class="container-fluid bg-white p-4 rounded">
        <h1 class="text-center my-4" style="font-weight: bold; color: black;">Daftar Jalur</h1>
        <!-- Baris untuk tombol "Tambah Jalur" dan form pencarian -->
        <div class="row mb-3">
            <div class="col-md-6 mb-2">
                <a href="{{ route('jalur.create') }}" class="btn w-100"
                   style="background-color: #117958; color: white; border: none;">Tambah Jalur</a>
            </div>
            <div class="col-md-6">
                <!-- Form Pencarian -->
                <form action="{{ route('jalur.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Cari jalur..."
                           value="{{ request()->get('search') }}">
                    <button type="submit" class="btn" style="background-color: #007bff; color: white;">Cari</button>
                </form>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead style="background-color: #d4edda;">
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">Gunung</th>
                        <th scope="col" class="text-center">Provinsi</th>
                        <th scope="col" class="text-center">Kabupaten</th>
                        <th scope="col" class="text-center">Kecamatan</th>
                        <th scope="col" class="text-center">Desa</th>
                        <th scope="col" class="text-center">Jarak</th>
                        <th scope="col" class="text-center">Deskripsi</th>
                        <th scope="col" class="text-center">Map Basecamp</th>
                        <th scope="col" class="text-center">Gambar</th>
                        <th scope="col" class="text-center">Biaya</th>
                        <th scope="col" class="text-center" style="width: 13%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jalur as $j)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $j->nama }}</td>
                        <td>{{ $j->gunung->nama ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $j->province->name ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $j->regency->name ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $j->district->name ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $j->village->name ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $j->jarak }} km</td>
                        <td>{{ $j->deskripsi }}</td>
                        <td>{{ $j->map_basecamp }}</td>
                        <td class="text-center">
                            @if ($j->gambar_jalur)
                                <img src="{{ asset('/storage/images/' . $j->gambar_jalur) }}" alt="Gambar Jalur" style="width: 100px; height: auto;">
                            @else
                                Tidak Ada Gambar
                            @endif
                        </td>
                        <td>Rp {{ number_format($j->biaya, 0, ',', '.') }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('jalur.edit', $j->id) }}" class="btn btn-sm"
                                   style="background-color: #28a745; color: white; margin-right: 5px;">EDIT</a>
                                <form onsubmit="return confirm('Yakin ingin menghapus jalur ini?');" action="{{ route('jalur.destroy', $j->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" style="margin-left: 5px;">HAPUS</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection
