@extends('admin.template')
@section('title', 'Register - Iuran Warga')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-lg border-0 rounded-4">
            <!-- Header dengan gradient -->
            <div class="card-header text-white text-center rounded-top-4" 
                 style="background: linear-gradient(135deg, #00f2fe, #4facfe);">
                <h4 class="mb-0 fw-bold">
                    <i class="fas fa-user-plus me-2"></i> Registrasi Akun
                </h4>
            </div>

            <div class="card-body p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="text"
                                   class="form-control rounded-end @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{ old('name') }}"
                                   placeholder="Masukkan nama lengkap" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Username -->
                    <div class="mb-3">
                        <label for="username" class="form-label fw-semibold">Username</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-at"></i>
                            </span>
                            <input type="text"
                                   class="form-control rounded-end @error('username') is-invalid @enderror"
                                   id="username" name="username" value="{{ old('username') }}"
                                   placeholder="Masukkan username" required>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email"
                                   class="form-control rounded-end @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}"
                                   placeholder="Masukkan email" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password"
                                   class="form-control rounded-end @error('password') is-invalid @enderror"
                                   id="password" name="password"
                                   placeholder="Masukkan password" required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password"
                                   class="form-control rounded-end"
                                   id="password_confirmation"
                                   name="password_confirmation"
                                   placeholder="Ulangi password" required>
                        </div>
                    </div>

                    <!-- No HP -->
                    <div class="mb-3">
                        <label for="nohp" class="form-label fw-semibold">No HP</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-phone"></i>
                            </span>
                            <input type="text"
                                   class="form-control rounded-end @error('nohp') is-invalid @enderror"
                                   id="nohp" name="nohp" value="{{ old('nohp') }}"
                                   placeholder="Masukkan nomor HP">
                            @error('nohp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="address" class="form-label fw-semibold">Alamat</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <textarea class="form-control rounded-end @error('address') is-invalid @enderror"
                                      id="address" name="address" rows="3"
                                      placeholder="Masukkan alamat lengkap">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Tombol Daftar -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-lg rounded-pill shadow-sm text-white"
                                style="background: linear-gradient(135deg, #00f2fe, #4facfe); border: none;">
                            <i class="fas fa-user-plus me-2"></i> Daftar
                        </button>
                    </div>

                    <!-- Link ke login -->
                    <div class="text-center mt-3">
                        <p class="mb-0">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="fw-bold text-decoration-none" style="color:#00f2fe;">Login disini</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
@endsection
