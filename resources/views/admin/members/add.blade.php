@extends('admin.template')

@section('title', 'Tambah Anggota Iuran')

@section('content')
<div class="container-fluid px-4">
    <div class="card border-0 shadow-sm">
        <!-- Header dengan gradient -->
        <div class="card-header text-white d-flex justify-content-between align-items-center"
             style="background: linear-gradient(135deg, #00f2fe, #4facfe);">
            <h5 class="mb-0">Tambah Anggota Iuran Baru</h5>
            <a href="{{ route('admin.members') }}" class="btn btn-light btn-sm rounded-pill shadow-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('admin.members.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="iduser" class="form-label fw-semibold">Nama Warga</label>
                    <select class="form-select @error('iduser') is-invalid @enderror" id="iduser" name="iduser" required>
                        <option value="">Pilih Warga</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('iduser') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} - {{ $user->email }}
                            </option>
                        @endforeach
                    </select>
                    @error('iduser')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="idduescategory" class="form-label fw-semibold">Kategori Iuran</label>
                    <select class="form-select @error('idduescategory') is-invalid @enderror" id="idduescategory" name="idduescategory" required>
                        <option value="">Pilih Kategori Iuran</option>
                        @foreach($duesCategories as $category)
                            <option value="{{ $category->id }}" {{ old('idduescategory') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }} - Rp {{ number_format($category->nominal, 0, ',', '.') }} ({{ $category->payment_type }})
                            </option>
                        @endforeach
                    </select>
                    @error('idduescategory')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                        <div class="d-flex gap-2">
                            <!-- <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Pembayaran
                            </button> -->
                           <button type="submit" 
                             style="background:#00eaff; color:#000; border:none; padding:6px 20px; border-radius:50px;">
                             <i class="fas fa-save"></i> Simpan
                           </button>

                            <a href="{{ route('admin.members') }}" class="btn btn-light btn-sm rounded-pill shadow-sm">
                            <i class="fas fa-plus me-1"></i> Batal
                            </a> 
                        </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#iduser').select2({
            placeholder: "Pilih warga...",
            allowClear: true
        });
        $('#idduescategory').select2({
            placeholder: "Pilih kategori iuran...",
            allowClear: true
        });
    });
</script>
@endsection
