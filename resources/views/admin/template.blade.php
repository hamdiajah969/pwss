<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
      color: #f1f1f1;
    }

    .main-wrapper {
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background: linear-gradient(180deg, #1e2140, #2c2f4a);
      padding-top: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      border-right: 1px solid rgba(255, 255, 255, 0.1);
      box-shadow: 4px 0 15px rgba(0,0,0,0.3);
    }

    .sidebar .logo {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #00f2fe;
      box-shadow: 0 0 15px rgba(0,242,254,0.6);
    }

    .sidebar .brand-name {
      color: #fff;
      font-weight: 600;
      margin-top: 12px;
      font-size: 1.3rem;
      text-shadow: 0 0 10px rgba(0,242,254,0.6);
    }

    .sidebar .nav-link {
      color: #f1f1f1 !important;
      padding: 12px 20px;
      width: 100%;
      text-align: left;
      border-radius: 8px;
      margin: 4px 0;
      transition: all 0.3s ease;
    }

    .sidebar .nav-link i {
      margin-right: 10px;
    }

    .sidebar .nav-link:hover {
      background: rgba(0,242,254,0.15);
      color: #00f2fe !important;
      transform: translateX(5px);
    }

    /* Content */
    .content-area {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .main-content {
      padding: 30px;
      flex: 1;
    }

    /* Glassmorphism Card */
    .card-glass {
      background: rgba(255,255,255,0.05);
      border-radius: 15px;
      padding: 20px;
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255,255,255,0.1);
      box-shadow: 0 8px 20px rgba(0,0,0,0.3);
      transition: transform 0.2s;
    }

    .card-glass:hover {
      transform: translateY(-5px);
    }

    footer {
      background: rgba(30, 33, 64, 0.95);
      color: #ccc;
      padding: 1rem;
      text-align: center;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    table {
      color: #f1f1f1;
    }

    .table-dark thead {
      background-color: #2a2d48;
    }
  </style>
</head>
<body>
  <div class="main-wrapper">
    @include('admin.navbar-admin') <!-- Sidebar -->

    <div class="content-area">
      <div class="main-content">
        <!-- Contoh Card Glass -->
        <div class="card-glass">
          @yield('content')
        </div>
      </div>
      <!-- <footer>
        <p>&copy; @Fawwaz Hamdi</p>
      </footer> -->
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
