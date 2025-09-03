@extends('admin.template')

@section('content')
<div class="container-fluid px-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card border-0 shadow-sm">
                <!-- HEADER -->
                <div class="card-header text-white d-flex justify-content-between align-items-center" 
                     style="background: linear-gradient(to right, #00c6ff, #0072ff); border-radius: 8px 8px 0 0;">
                    <h5 class="mb-0 fw-bold">Edit Pembayaran</h5>
                    <a href="{{ route('admin.payments.index') }}" class="btn btn-light btn-sm rounded-pill">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <!-- BODY -->
                <div class="card-body">
                    <form action="{{ route('admin.payments.update', $payment->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="user_id" class="form-label">Nama Warga</label>
                            <select name="user_id" id="user_id" class="form-select" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $payment->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="dues_category_id" class="form-label">Kategori Iuran</label>
                            <select name="dues_category_id" id="dues_category_id" class="form-select" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $payment->dues_category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="number" name="nominal" id="nominal" class="form-control"
                                   value="{{ old('nominal', $payment->nominal) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Metode Pembayaran</label>
                            <select name="payment_method" id="payment_method" class="form-select">
                                <option value="cash" {{ $payment->payment_method == 'cash' ? 'selected' : '' }}>Cash</option>
                                <option value="transfer" {{ $payment->payment_method == 'transfer' ? 'selected' : '' }}>Transfer</option>
                                <option value="ewallet" {{ $payment->payment_method == 'ewallet' ? 'selected' : '' }}>E-Wallet</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="payment_date" class="form-label">Tanggal Bayar</label>
                            <input type="date" name="payment_date" id="payment_date" class="form-control"
                                   value="{{ $payment->payment_date ? \Carbon\Carbon::parse($payment->payment_date)->format('Y-m-d') : '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="completed" {{ $payment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn text-white rounded-pill px-4" 
                                    style="background: linear-gradient(to right, #00c6ff, #0072ff);">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary rounded-pill px-4">
                                <i class="fas fa-times"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
