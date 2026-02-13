<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nama_website; ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><?php echo $nama_website; ?></a>
        </div>
    </nav>

    <header class="hero-section">
        <div class="container">
            <h1 class="display-4 fw-bold"><?php echo $salam; ?>!</h1>
            <p class="lead">Selamat datang di website PHP sederhana saya.</p>
        </div>
    </header>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <h3 class="mb-4">Informasi Sistem</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Waktu Server
                            <span class="badge bg-primary rounded-pill"><?php echo $time; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Tanggal
                            <span class="badge bg-success rounded-pill"><?php echo $date; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Versi PHP
                            <span class="badge bg-info text-dark rounded-pill"><?php echo $php_version; ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-center py-4 text-muted">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> <?php echo $nama_website; ?>. Dibuat dengan PHP Native.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
