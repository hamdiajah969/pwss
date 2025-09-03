@extends('admin.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center" style="background:#00f2fe; color:#fff;">
                    <h5 class="mb-0">Tambah Pembayaran Baru</h5>
                    <a href="{{ route('admin.payments.index') }}" class="btn btn-light btn-sm rounded-pill shadow-sm">
                    <i class="fas fa-plus me-1"></i> Kembali
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.payments.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Nama Warga --}}
                        <div class="mb-3">
                            <label for="iduser" class="form-label">Nama Warga</label>
                            <select class="form-control @error('iduser') is-invalid @enderror" id="iduser" name="iduser" required>
                                <option value="">Pilih Warga</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('iduser') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} - {{ $user->email }}
                                    </option>
                                @endforeach
                            </select>
                            @error('iduser') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Anggota Iuran --}}
                        <div class="mb-3">
                            <label for="idmember" class="form-label">Anggota Iuran</label>
                            <select class="form-control @error('idmember') is-invalid @enderror" id="idmember" name="idmember" required>
                                <option value="">Pilih Anggota</option>
                                @foreach($members as $member)
                                    <option value="{{ $member->id }}" {{ old('idmember') == $member->id ? 'selected' : '' }}>
                                        {{ $member->user->name }} - {{ $member->duesCategory->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idmember') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Kategori Iuran --}}
                        <div class="mb-3">
                            <label for="idduescategory" class="form-label">Kategori Iuran</label>
                            <select class="form-control @error('idduescategory') is-invalid @enderror" id="idduescategory" name="idduescategory" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('idduescategory') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }} - Rp {{ number_format($category->nominal, 0, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idduescategory') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Nominal --}}
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="number" class="form-control @error('nominal') is-invalid @enderror" id="nominal" name="nominal" value="{{ old('nominal') }}" required min="0">
                            @error('nominal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Metode Pembayaran --}}
                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Metode Pembayaran</label>
                            <select class="form-control @error('payment_method') is-invalid @enderror" id="payment_method" name="payment_method" required>
                                <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>Cash</option>
                                <option value="transfer" {{ old('payment_method') == 'transfer' ? 'selected' : '' }}>Transfer Bank</option>
                                <option value="qris" {{ old('payment_method') == 'qris' ? 'selected' : '' }}>QRIS</option>
                            </select>
                            @error('payment_method') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Tanggal Pembayaran --}}
                        <div class="mb-3">
                            <label for="payment_date" class="form-label">Tanggal Pembayaran</label>
                            <input type="date" class="form-control @error('payment_date') is-invalid @enderror" id="payment_date" name="payment_date" value="{{ old('payment_date', date('Y-m-d')) }}" required>
                            @error('payment_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Catatan --}}
                        <!-- <div class="mb-3">
                            <label for="notes" class="form-label">Catatan (Opsional)</label>
                            <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
                            @error('notes') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div> -->

                        {{-- Bukti Pembayaran --}}
                        <!-- <div class="mb-3">
                            <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran (Opsional)</label>
                            <input type="file" class="form-control @error('bukti_pembayaran') is-invalid @enderror" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*">
                            <small class="form-text text-muted">Format: JPG, PNG, JPEG. Maksimal 2MB</small>
                            @error('bukti_pembayaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div> -->

                        {{-- Tombol Aksi --}}
                        <div class="d-flex gap-2">
                            <!-- <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Pembayaran
                            </button> -->
                           <button type="submit" 
                             style="background:#00eaff; color:#000; border:none; padding:6px 20px; border-radius:50px;">
                             <i class="fas fa-save"></i> Simpan
                           </button>

                            <a href="{{ route('admin.payments.index') }}" class="btn btn-light btn-sm rounded-pill shadow-sm">
                            <i class="fas fa-plus me-1"></i> Batal
                            </a> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
