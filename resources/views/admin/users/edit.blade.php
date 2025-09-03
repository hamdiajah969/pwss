@extends('admin.template')

@section('content')
<div class="container-fluid d-flex justify-content-center mt-4">
    <div class="card shadow rounded-3" style="width: 100%; max-width: 600px;">
        <div class="card-header text-white d-flex justify-content-between align-items-center "style="background: linear-gradient(135deg, #00f2fe, #4facfe);">
            <h5 class="mb-0">Edit Warga</h5>
        </div>

        <div class="card-body bg-white">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.users.update', Crypt::encrypt($user->id)) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control rounded-pill px-3" id="name" name="name" value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control rounded-pill px-3" id="email" name="email" value="{{ $user->email }}" required>
                </div>

                <div class="mb-3">
                    <label for="nohp" class="form-label">No HP</label>
                    <input type="text" class="form-control rounded-pill px-3" id="nohp" name="nohp" value="{{ $user->nohp }}" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control px-3 py-2" id="address" name="address" rows="3" required>{{ $user->address }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn px-4 py-2"
                        style="background: #00c6ff; color: white; border-radius: 20px;">
                        Simpan
                    </button>
                    <a href="{{ route('admin.user') }}" class="btn btn-light px-4 py-2 rounded-pill shadow-sm">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
