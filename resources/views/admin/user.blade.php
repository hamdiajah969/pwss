@extends('admin.template')

@section('content')
<!-- <div class="container-fluid px-4" style="">
    {{-- Header dan tombol --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Daftar Warga</h4>
        <a href="{{ route('register') }}" class="btn btn-light btn-sm rounded-pill shadow-sm">
            <i class="fas fa-user-plus me-1"></i> Tambah Warga
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-pill" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm rounded-pill" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Card --}}
    <div class="card border-0 shadow-sm">
        {{-- Header pakai gradasi --}}
        <div class="card-header d-flex justify-content-between align-items-center py-3"
             style="background: linear-gradient(to right, #00c6ff, #0072ff); color:#fff; border-radius: 5px 5px 0 0;">
            <h5 class="mb-0">Data Warga</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th width="200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->nohp }}</td>
                            <td>{{ $item->address }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', Crypt::encrypt($item->id)) }}" 
                                   class="btn btn-sm btn-warning rounded-pill shadow-sm me-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.users.destroy', $item->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus data warga {{ $item->name }}?')" 
                                      style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger rounded-pill shadow-sm">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Tidak ada data warga.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->

<div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header text-white d-flex justify-content-between align-items-center" style="background: linear-gradient(135deg, #00f2fe, #4facfe);">
                    <h5 class="mb-0">Daftar Warga</h5>
                     <a href="{{ route('register') }}" class="btn btn-light btn-sm rounded-pill shadow-sm">
            <i class="fas fa-plus me-1"></i> Tambah Warga
        </a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->nohp }}</td>
                    <td>{{ $item->address }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-warning me-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.users.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data warga {{ $item->name }}?')" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Tidak ada data warga.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush
@endsection
