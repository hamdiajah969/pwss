@extends('admin.template')

{{-- @section('title', 'Data Anggota Iuran') --}}

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg border-0">
                <!-- Header dengan Gradient -->
                <div class="card-header text-white d-flex justify-content-between align-items-center "style="background: linear-gradient(135deg, #00f2fe, #4facfe);">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-users me-2"></i> Data i Angg Iuran
                    </h3>
                    <a href="{{ route('admin.members.create') }}"
                       class="btn btn-light btn-sm fw-bold"
                       style="border-radius:50px;">
                        <i class="fas fa-plus"></i> Tambah Anggota
                    </a>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="text-white" style="background: linear-gradient(135deg, #00f2fe, #4facfe);">
                                <tr>
                                    <th>No  </th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Kategori Iuran</th>
                                    <th>Nominal</th>
                                    <th>Status</th>
                                    <th>No HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($members as $index => $member)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $member->user->name }}</td>
                                    <td>{{ $member->user->email }}</td>
                                    <td>{{ $member->duesCategory->name ?? 'N/A' }}</td>
                                    <td>Rp {{ number_format($member->duesCategory->nominal ?? 0, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="badge
                                            {{ $member->payment_status == 'Lunas' ? 'bg-success' :
                                               ($member->payment_status == 'Sebagian' ? 'bg-warning' : 'bg-danger') }}">
                                            {{ $member->payment_status }}
                                        </span>
                                    </td>
                                    <td>{{ $member->user->phone ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.members.show', $member->id) }}" class="btn btn-sm btn-info me-1">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.members.edit', $member->id) }}" class="btn btn-sm btn-warning text-white me-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.members.destroy', $member->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus anggota ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Belum ada data anggota</td>
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
@endsection
