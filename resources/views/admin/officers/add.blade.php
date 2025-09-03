@extends('admin.template')

@section('title', 'Tambah Officer dan Warga')

@section('content')
<style>
    .btn-simpan {
        background-color: #2a2d4f;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .btn-simpan:hover {
        background-color: #0056b3;
        color: #fff;
    }
    .btn-batal {
        background-color: #525252;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }
    .btn-batal:hover {
        background-color: #414141;
        color: #fff;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header" style="background: linear-gradient(135deg, #00f2fe, #4facfe);">
                    <h3 class="card-title">Tambah Officer Baru</h3>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.officers.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Nomor HP</label>
                            <input type="text" name="nohp" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Alamat</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Jabatan</label>
                            <input type="text" name="position" class="form-control" value="Officer" required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <div class="d-flex gap-2">
                            <!-- <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Pembayaran
                            </button> -->
                           <button type="submit" 
                             style="background:#00eaff; color:#000; border:none; padding:6px 20px; border-radius:50px;">
                             <i class="fas fa-save"></i> Simpan
                           </button>

                            <a href="{{ route('admin.officers') }}" class="btn btn-light btn-sm rounded-pill shadow-sm">
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
