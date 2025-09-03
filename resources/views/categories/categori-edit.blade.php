@extends('admin.template')
@section('content')

<div class="container-fluid mt-4">
    <div class="card shadow-sm border-0">
        <!-- Header dengan gradasi -->
        <div class="card-header text-white d-flex justify-content-between align-items-center"
             style="background: linear-gradient(90deg, #00c6ff, #0072ff); border-radius: 8px 8px 0 0;">
            <h5 class="mb-0 fw-bold">Edit Category</h5>
        </div>

        <!-- Body -->
        <div class="card-body bg-light">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('categories-update', Crypt::encrypt($category->id)) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nama Kategori</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
                    <small class="text-muted">Contoh: Kebersihan, keamanan, Posyandu</small>
                </div>

                <div class="mb-3">
                    <label for="period" class="form-label fw-bold">Periode</label>
                    <input type="text" class="form-control" id="period" name="period" value="{{ $category->period }}" required>
                    
                </div>

                <div class="mb-3">
                    <label for="payment_type" class="form-label fw-bold">Jenis Pembayaran</label>
                    <select class="form-select" id="payment_type" name="payment_type" required>
                        <option value="">Pilih Jenis Pembayaran</option>
                        <option value="mingguan" {{ $category->payment_type == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
                        <option value="bulanan" {{ $category->payment_type == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                        <option value="tahunan" {{ $category->payment_type == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nominal" class="form-label fw-bold">Nominal</label>
                    <input type="number" class="form-control" id="nominal" name="nominal" value="{{ $category->nominal }}" required>
                    <small class="text-muted">Masukkan nominal dalam Rupiah</small>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label fw-bold">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="petugas" class="form-label fw-bold">Petugas</label>
                    <select class="form-select" id="petugas" name="petugas" required>
                        <option value="">Pilih Petugas</option>
                        @foreach($officers as $officer)
                            <option value="{{ $officer->id }}" {{ $category->petugas == $officer->id ? 'selected' : '' }}>
                                {{ $officer->user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn text-white px-4"
                            style="background: linear-gradient(90deg, #00c6ff, #0072ff); border: none; border-radius: 20px;">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
