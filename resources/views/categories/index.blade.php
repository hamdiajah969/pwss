@extends('admin.template')

@section('content')
<div class="container-fluid px-4" style="">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                {{-- Header dengan gradient biru --}}
                <div class="card-header text-white d-flex justify-content-between align-items-center "style="background: linear-gradient(135deg, #00f2fe, #4facfe);">
        <h5 class="mb-0 fw-bold">
            <i class="fas fa-user-tie me-2"></i> Daftar Kategori
        </h5>
        <a href="{{ route('categories.add') }}" class="btn btn-light btn-sm rounded-pill shadow-sm">
            <i class="fas fa-plus me-1"></i> Tambah Kategori
        </a>
    </div>
                </div>

                <div class="card-body">
                    {{-- Alert --}}
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    {{-- Table --}}
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>Periode</th>
                                    <th>Nominal</th>
                                    <th>Petugas</th>
                                    <th>Status</th>
                                    <th width="200px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $index => $category)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ ucfirst(str_replace('per', '', $category->payment_type)) }}</td>
                                        <td>{{ $category->period }}</td>
                                        <td>Rp {{ number_format($category->nominal, 0, ',', '.') }}</td>
                                        <td>{{ $category->officer->user->name ?? 'Tidak ada petugas' }}</td>
                                        <td>
                                            <span class="badge rounded-pill bg-{{ $category->status === 'active' ? 'success' : 'secondary' }}">
                                                {{ ucfirst($category->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('categories-edit', Crypt::encrypt($category->id)) }}"
                                               class="btn btn-sm btn-warning me-1 text-white">
                                                <i class="fas fa-edit">Edit</i>
                                            </a>
                                            <form action="{{ route('categories.destroy', Crypt::encrypt($category->id)) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                    <i class="fas fa-trash-alt">Hapus</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">Belum ada kategori</td>
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

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
@endsection
