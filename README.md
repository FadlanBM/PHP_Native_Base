# My Simple PHP Native Framework

Framework PHP Native minimalis dengan struktur modern (MVC-ish) yang dioptimalkan untuk berjalan di **Devilbox** tanpa ribet.

## 🚀 Fitur Utama

- **Zero Dependency**: Tidak butuh Composer atau library eksternal. Semua *core* ditulis *native*.
- **Modern Structure**: Menggunakan konsep *Separation of Concerns* (Controller, View, Config terpisah).
- **Environment Variables**: Dukungan file `.env` untuk konfigurasi sensitif (Database, App Mode).
- **Secure**: Folder logika aplikasi (`app/`) dilindungi dari akses publik langsung via `.htaccess`.
- **Database Wrapper**: Wrapper PDO sederhana (Singleton Pattern) untuk koneksi database yang aman.
- **Autoloader**: PSR-4 style autoloading tanpa Composer.

## 📂 Struktur Folder

```
htdocs/                  # Root Web Server (Document Root)
├── .env                 # Konfigurasi Environment (Database, dll)
├── .env.example         # Template konfigurasi environment
├── .htaccess            # Aturan keamanan (melindungi folder app & .env)
├── index.php            # Entry Point Aplikasi
├── assets/              # File Statis (CSS, JS, Gambar)
└── app/                 # Inti Aplikasi (LOGIC)
    ├── config/          # Konfigurasi PHP (config.php)
    ├── logs/            # Log error aplikasi
    ├── src/             # Source Code PHP (Namespace: App\)
    │   ├── Controllers/ # Logika Bisnis & Request Handler
    │   ├── Core/        # Core Framework (Database, Env, Router)
    │   └── Models/      # Interaksi Database (Optional)
    └── templates/       # File Tampilan / View (HTML/PHP)
```

## 🛠️ Cara Penggunaan

### 1. Konfigurasi Awal
Salin file `.env.example` menjadi `.env` dan sesuaikan dengan database Anda.

```bash
cp .env.example .env
```

Edit file `.env`:
```ini
DB_HOST=127.0.0.1
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=
```

### 2. Membuat Controller Baru
Buat file baru di `app/src/Controllers/`, misalnya `ProductController.php`.
Pastikan namespace sesuai dengan struktur folder (`App\Controllers`).

```php
<?php

namespace App\Controllers;

use App\Core\Controller;

class ProductController extends Controller
{
    public function index()
    {
        // Logika di sini
        $data = ['products' => ['Laptop', 'Mouse']];
        
        // Memanggil View 'product-list.php' di folder templates
        return $this->view('product-list', $data);
    }
}
```

### 3. Membuat View
Buat file baru di `app/templates/`, misalnya `product-list.php`.
Variabel `$data` dari controller akan diekstrak menjadi variabel biasa.

```php
<h1>Daftar Produk</h1>
<ul>
    <?php foreach ($products as $product): ?>
        <li><?= $product ?></li>
    <?php endforeach; ?>
</ul>
```

### 4. Menggunakan Database
Gunakan class `App\Core\Database` untuk koneksi PDO.

```php
use App\Core\Database;

class UserController
{
    public function getUsers()
    {
        // Dapatkan instance koneksi PDO
        $db = Database::getInstance()->getConnection();
        
        // Query Standard PDO
        $stmt = $db->query("SELECT * FROM users");
        return $stmt->fetchAll();
    }
}
```

## 🔒 Keamanan

Folder `app/` dilindungi oleh `.htaccess` sehingga tidak bisa diakses langsung dari browser (e.g. `http://localhost/app/config/config.php` akan Forbidden).
Akses hanya diperbolehkan melalui `index.php` di root.

## 📝 Catatan Penting

- **Namespace**: Selalu gunakan namespace `App\` untuk file di dalam folder `src`.
  - `src/Controllers` -> `App\Controllers`
  - `src/Models` -> `App\Models`
  - `src/Core` -> `App\Core`
- **Autoloader**: Jika Anda menambahkan folder baru di dalam `src`, autoloader akan otomatis mendeteksi class tersebut selama namespace-nya sesuai.

---
Dibuat dengan ❤️ menggunakan PHP Native.
