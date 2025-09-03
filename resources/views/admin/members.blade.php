@extends('admin.template')

@section('title', 'Data Anggota Iuran')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card shadow rounded-3" style="border-radius: 12px;">
                <div class="card-header text-white d-flex justify-content-between align-items-center "style="background: linear-gradient(135deg, #00f2fe, #4facfe);">
                    <h5 class="mb-0">Data Anggota</h5>
                    <a href="{{ route('admin.members.add') }}" class="btn btn-light btn-sm rounded-pill shadow-sm">
            <i class="fas fa-plus me-1"></i> Tambah Anggota
        </a>
                </div>

                <div class="card-body px-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="text-center" style="background: #f8f9fa;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Kategori</th>
                                    <th>Jenis</th>
                                    <th>Nominal</th>
                                    <th>Petugas</th>
                                    <th>Dibayar</th>
                                    <th>Bergabung</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($members as $index => $member)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $member->member_name }}</td>
                                    <td>{{ $member->member_email }}</td>
                                    <td>{{ $member->duesCategory->name ?? 'N/A' }}</td>
                                    <td>{{ $member->duesCategory->payment_type ?? 'N/A' }}</td>
                                    <td>Rp {{ number_format($member->duesCategory->nominal ?? 0, 0, ',', '.') }}</td>
                                    <td>{{ $member->officer->officer_name ?? '-' }}</td>
                                    <td>Rp {{ number_format($member->total_payments, 0, ',', '.') }}</td>
                                    <td>{{ $member->created_at ? $member->created_at->format('d/m/Y H:i') : '-' }}</td>
                                    <td class="text-center">
                                        <span class="badge px-3 py-2 text-white bg-{{
                                            $member->payment_status == 'Lunas' ? 'success' :
                                            ($member->payment_status == 'Sebagian' ? 'warning' : 'danger') }}">
                                            {{ $member->payment_status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.members.payments', $member->id) }}"
                                           class="btn btn-sm btn-info text-white">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="11" class="text-center">Tidak ada data anggota iuran</td>
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
