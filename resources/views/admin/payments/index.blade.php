@extends('admin.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <!-- Header dengan gradient -->
                <div class="card-header text-white d-flex justify-content-between    align-items-center "style="background: linear-gradient(135deg, #00f2fe, #4facfe);">
                 <h5 class="mb-0 fw-bold">
                  <i class="fas fa-user-tie me-2"></i> Data Pembayaran
                </h5>
                <a href="{{ route('admin.payments.create') }}" class="btn btn-light btn-sm rounded-pill shadow-sm">
                <i class="fas fa-plus me-1"></i> Tambah Pembayaran
                </a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Warga</th>
                                    <th>Kategori Iuran</th>
                                    <th>Nominal</th>
                                    <th>Metode</th>
                                    <th>Tanggal</th>
                                    <th>Petugas</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($payments as $index => $payment)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $payment->user->name ?? 'N/A' }}</td>
                                    <td>{{ $payment->duesCategory->name ?? 'N/A' }}</td>
                                    <td>Rp {{ number_format($payment->nominal, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="badge rounded-pill
                                            {{ $payment->payment_method == 'cash' ? 'bg-success' :
                                               ($payment->payment_method == 'transfer' ? 'bg-primary' :
                                               ($payment->payment_method == 'qris' ? 'bg-warning text-dark' : 'bg-secondary')) }}">
                                            {{ ucfirst($payment->payment_method ?? 'Cash') }}
                                        </span>
                                    </td>
                                    <td>{{ $payment->payment_date ? \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y') : '-' }}</td>
                                    <td>{{ $payment->officer->user->name ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge rounded-pill {{ $payment->status == 'completed' ? 'bg-success' : 'bg-warning text-dark' }}">
                                            {{ ucfirst($payment->status ?? 'Pending') }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.payments.show', $payment->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye">Lihat</i>
                                        </a>
                                        <a href="{{ route('admin.payments.edit', $payment->id) }}" class="btn btn-warning btn-sm text-white">
                                            <i class="fas fa-edit">Edit</i>
                                        </a>
                                        <form action="{{ route('admin.payments.destroy', $payment->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pembayaran ini?')">
                                                <i class="fas fa-trash">Hapus</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center text-muted">Belum ada pembayaran</td>
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
