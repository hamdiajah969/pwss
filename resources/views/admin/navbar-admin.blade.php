<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    /* Sidebar Styling */
    .sidebar {
        width: 250px;
        min-height: 100vh;
        background: linear-gradient(180deg, #4facfe, #00f2fe);
        color: #fff;
        padding: 20px 15px;
        display: flex;
        flex-direction: column;
    }

    .sidebar .logo {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        margin: 0 auto 10px;
        border: 3px solid #fff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .sidebar .brand-name {
        font-weight: 600;
        text-align: center;
        font-size: 18px;
        margin-bottom: 20px;
    }

    .nav-link {
        display: flex;
        align-items: center;
        font-size: 15px;
        color: #fff;
        padding: 10px 12px;
        border-radius: 8px;
        transition: all 0.3s;
    }

    .nav-link i {
        font-size: 18px;
    }

    .nav-link:hover {
        background: rgba(255,255,255,0.2);
        transform: translateX(5px);
    }

    .nav-item.mt-auto .nav-link {
        color: #ffdddd;
        font-weight: 600;
    }

    /* Modal Styling */
    .modal-content {
        border-radius: 15px;
        background: linear-gradient(135deg, #ffffff, #f8f9fa);
        animation: slideDown 0.4s ease;
    }

    .modal-body i {
        font-size: 3rem;
        background: linear-gradient(135deg, #ff416c, #ff4b2b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .btn-cancel {
        background: #6c757d;
        color: #fff;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s;
    }

    .btn-cancel:hover {
        background: #5a6268;
    }

    .btn-logout {
        background: linear-gradient(135deg, #ff416c, #ff4b2b);
        border: none;
        border-radius: 8px;
        font-weight: 600;
        color: #fff;
        transition: transform 0.2s;
    }

    .btn-logout:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(255,65,108,0.4);
    }

    @keyframes slideDown {
        from { transform: translateY(-30px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="sidebar">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzzJiBbyXi5ptZDkrQ5Z0NzJXEQUBry_pxIA&s" class="logo" alt="Logo" />
    <div class="brand-name">Iuran Warga</div>

    <ul class="nav flex-column mt-4 w-100">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="me-1"></i> Dashboaard
            </a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.user') }}">
                <i class="me-1"></i> Warga
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.officers') }}">
                <i class="me-1"></i> Officer
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.members') }}">
                <i class="me-1"></i> Data Anggota Iuran
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.payments.index') }}">
                <i class="me-1"></i> Data Pembayaran
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.payments.create') }}">
                <i class="me-1"></i> Tambah Pembayaran
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">
                <i class="me-1"></i> Daftar Kategori
            </a>
        </li>

        <!-- Logout -->
        <li class="nav-item mt-auto">
            <button type="button"
                    class="nav-link border-0 bg-transparent w-100 text-start fw-semibold d-flex align-items-center"
                    data-bs-toggle="modal"
                    data-bs-target="#logoutModal">
                <i class="me-1 fs-5"></i> Logout
            </button>
        </li>
    </ul>
</div>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4 overflow-hidden">

            <!-- Modal Header with Gradient -->
            <div class="text-white px-4 py-3"
                 style="background: linear-gradient(90deg, #00c6ff 0%, #0072ff 100%);">
                <h5 class="mb-0">Konfirmasi Logout</h5>
            </div>

            <!-- Modal Body -->
            <div class="modal-body text-center p-4">
                <div class="mb-3">
                    <i class="bi bi-box-arrow-right" style="font-size: 3rem; color: #0072ff;"></i>
                </div>
                <h5 class="fw-bold mb-2" style="color: #00c6ff">Keluar dari Aplikasi?</h5>
                <p class="text-muted mb-4">Anda yakin ingin keluar? Pastikan semua data sudah tersimpan.</p>

                <div class="d-flex justify-content-center gap-3">
                    <!-- Batal Button -->
                    <button type="button"
                            class="btn px-4 py-2 text-white"
                            style="background: #6c757d; border-radius: 20px;"
                            data-bs-dismiss="modal">
                        Batal
                    </button>

                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="btn px-4 py-2"
                                style="background: #00c6ff; color: white; border-radius: 20px;">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
