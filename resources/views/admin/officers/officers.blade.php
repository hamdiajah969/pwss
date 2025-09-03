@extends('admin.template')

@section('title', 'Data Officer & Warga')

@section('content')
<div class="container-fluid px-4">
    <!-- Officer Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card border-0 shadow-lg rounded-9 overflow-hidden">
    <!-- Header dengan gradient -->
    <div class="card-header text-white d-flex justify-content-between align-items-center "style="background: linear-gradient(135deg, #00f2fe, #4facfe);">
        <h5 class="mb-0 fw-bold">
            <i class="fas fa-user-tie me-2"></i> Data Officer
        </h5>
        <a href="{{ route('admin.officers.add') }}" class="btn btn-light btn-sm rounded-pill shadow-sm">
            <i class="fas fa-plus me-1"></i> Tambah Officer
        </a>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th class="text-center">Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($officers as $index => $officer)
                    <tr class="table-row-hover">
                        <td class="text-center fw-semibold">{{ $index + 1 }}</td>
                        <td>
                            <i class="fas fa-user-circle text-primary me-2"></i>
                            {{ $officer->user->name ?? '-' }}
                        </td>
                        <td>{{ $officer->user->email ?? '-' }}</td>
                        <td>{{ $officer->user->nohp ?? '-' }}</td>
                        <td class="text-center">
                            <span class="badge bg-info bg-opacity-75 rounded-pill px-3 py-2">
                                {{ $officer->position ?? 'Officer' }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            <i class="fas fa-info-circle me-2"></i> Tidak ada data officer.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .table-row-hover:hover {
        background-color: rgba(0, 242, 254, 0.05);
        transition: background-color 0.3s ease;
    }
</style>

            </div>
        </div>
    </div>

    <!-- Warga Section -->
    <!-- <div class="row">
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
    </div> -->
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush
