@extends('template')
@section('title', 'Login - Iuran Warga')
@section('content')

<!-- Custom Styling -->
<style>
    body {
        background: linear-gradient(135deg, #4facfe, #00f2fe);
        font-family: 'Poppins', sans-serif;
    }

    .login-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .login-card {
        width: 100%;
        max-width: 380px;
        background: rgba(42, 192, 238, 0.9);
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        animation: fadeIn 0.8s ease-in-out;
    }

    .login-card h4 {
        font-weight: 600;
        color: #333;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 6px;
    }

    .input-group-text {
        background-color: #f1f3f6;
        border-right: 0;
    }

    .form-control {
        border-left: 0;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #4facfe;
        box-shadow: 0 0 5px rgba(79,172,254,0.5);
    }

    .btn-gradient {
        background: linear-gradient(135deg, #00f2fe, #00f2fe);
        border: none;
        border-radius: 8px;
        font-weight: 600;
        color: white;
        transition: transform 0.2s;
    }

    .btn-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="login-wrapper">
    <div class="login-card">
        <h4 class="text-center mb-4">
            <i class="fas fa-user-circle text-primary"></i> Login
        </h4>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email"
                           id="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="Masukkan email"
                           value="{{ old('email') }}"
                           required
                           autofocus>
                </div>
                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password"
                           id="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Masukkan password"
                           required>
                </div>
                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-gradient">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Font & Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

@endsection
