@extends('admin.template')

@section('content')
<div class="container-fluid px-4">
    <h1 class="h2 mb-4">Dashboard Admin</h1>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card text-white border-0 shadow-lg stat-card" style="background: linear-gradient(135deg,#4e73df,#224abe);">
            <div class="card-body position-relative overflow-hidden">
                <i class="fas fa-users fa-3x position-absolute opacity-25 top-50 end-0 translate-middle-y me-3"></i>
                <p class="mb-1 fw-bold">Total Warga</p>
                <h3 class="mb-0">{{ number_format($totalUsers) }}</h3>
                <small class="text-light">Aktif</small>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card text-white border-0 shadow-lg stat-card" style="background: linear-gradient(135deg,#1cc88a,#0f9d58);">
            <div class="card-body position-relative overflow-hidden">
                <i class="fas fa-dollar-sign fa-3x position-absolute opacity-25 top-50 end-0 translate-middle-y me-3"></i>
                <p class="mb-1 fw-bold">Total Iuran</p>
                <h3 class="mb-0">Rp {{ number_format($totalAmount, 0, ',', '.') }}</h3>
                <small class="text-light">Terbayar</small>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card text-white border-0 shadow-lg stat-card" style="background: linear-gradient(135deg,#f6c23e,#d39e00);">
            <div class="card-body position-relative overflow-hidden">
                <i class="fas fa-clock fa-3x position-absolute opacity-25 top-50 end-0 translate-middle-y me-3"></i>
                <p class="mb-1 fw-bold">Menunggu Konfirmasi</p>
                <h3 class="mb-0">{{ number_format($pendingApprovals) }}</h3>
                <small class="text-light">Pembayaran</small>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card text-white border-0 shadow-lg stat-card" style="background: linear-gradient(135deg,#36b9cc,#117a8b);">
            <div class="card-body position-relative overflow-hidden">
                <i class="fas fa-calendar-check fa-3x position-absolute opacity-25 top-50 end-0 translate-middle-y me-3"></i>
                <p class="mb-1 fw-bold">Total Transaksi</p>
                <h3 class="mb-0">{{ number_format($totalPayments) }}</h3>
                <small class="text-light">Semua waktu</small>
            </div>
        </div>
    </div>
</div>

<style>
.stat-card {
    border-radius: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.stat-card:hover {
    transform: translateY(5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
}
</style>


    <!-- Recent Transactions Table -->
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <!-- Header dengan gradient -->
            <!-- <div class="card-header text-white" style="background: linear-gradient(135deg, #00f2fe, #4facfe);">
                <h5 class="mb-0 fw-bold">
                    <i class="fas fa-receipt me-2"></i> Transaksi Terbaru
                </h5>
            </div> -->

            <!-- <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Warga</th>
                                <th>Jenis Iuran</th>
                                <th class="text-end">Jumlah</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentTransactions as $index => $transaction)
                            <tr class="table-row-hover">
                                <td class="text-center fw-semibold">{{ $index + 1 }}</td>
                                <td>{{ $transaction->user_name }}</td>
                                <td><span class="badge bg-info bg-opacity-75 rounded-pill">{{ $transaction->dues_category }}</span></td>
                                <td class="text-end fw-bold text-success">
                                    Rp {{ number_format($transaction->nominal, 0, ',', '.') }}
                                </td>
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}
                                </td>
                                <td class="text-center">
                                    <span class="badge rounded-pill px-3 py-2
                                        {{ $transaction->status == 'approved' ? 'bg-success' : 
                                           ($transaction->status == 'pending' ? 'bg-warning text-dark' : 'bg-danger') }}">
                                        {{ ucfirst($transaction->status) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3"
                                            onclick="viewDetail({{ $transaction->id }})">
                                        <i class="fas fa-eye me-1"></i> Detail
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    <i class="fas fa-info-circle me-2"></i> Belum ada transaksi
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div> -->
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
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush


@endsection
