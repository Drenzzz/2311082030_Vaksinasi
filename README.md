# Aplikasi Manajemen Pendaftaran Vaksinasi

Aplikasi Manajemen Pendaftaran Vaksinasi adalah aplikasi web berbasis Laravel 12 yang digunakan untuk mencatat dan mengelola data pendaftar vaksinasi pada suatu fasilitas kesehatan.

## Fitur Utama

- **CRUD Pendaftar**: Create, Read, Update, Delete data pendaftar vaksinasi
- **Validasi Data**: Validasi semua input ketika melakukan proses tambah dan edit data
- **Soft Delete**: Memungkinkan admin melihat dan memulihkan data pendaftar yang telah dihapus
- **Pagination**: Tampilan 10 data per halaman
- **Eloquent ORM**: Menggunakan Eloquent ORM untuk interaksi dengan database
- **Factory & Seeder**: Data dummy dengan Faker untuk keperluan pengujian
- **UI User Friendly**: Tampilan antarmuka yang rapi dan mudah digunakan

## Tampilan dan Fungsionalitas

### Halaman Utama / Daftar Pendaftar
- Menampilkan daftar pendaftar vaksinasi dalam bentuk tabel
- Pagination 10 data per halaman
- Tombol aksi untuk edit dan hapus data

### Form Pendaftaran
- Input nama lengkap, NIK, tanggal lahir
- Pilihan jenis vaksin
- Pilihan lokasi vaksin
- Input tanggal vaksin
- Pilihan status (terdaftar, hadir, tidak hadir)

### Halaman Data Dihapus
- Menampilkan data pendaftar yang telah dihapus (soft delete)
- Opsi untuk memulihkan (restore) data
- Opsi untuk menghapus permanen (force delete) data

## Struktur Project yang saya gunakan

```
app/
├── Http/
│   └── Controllers/
│       └── PendaftarController.php
├── Models/
│   └── Pendaftar.php
database/
├── migrations/
│   └── 2023_xx_xx_create_pendaftars_table.php
├── factories/
│   └── PendaftarFactory.php
├── seeders/
│   ├── DatabaseSeeder.php
│   └── PendaftarSeeder.php
resources/
├── views/
│   ├── layouts/
│   │   └── app.blade.php
│   └── pendaftar/
│       ├── index.blade.php
│       ├── create.blade.php
│       ├── edit.blade.php
│       ├── show.blade.php
│       └── trash.blade.php
routes/
└── web.php
```

## Teknologi yang Digunakan

- **Laravel 12**: Framework PHP untuk pengembangan web
- **Bootstrap 5**: Framework CSS untuk tampilan responsif
- **MySQL**: Database relasional

## Cara Instalasi

1. Clone repository ini
```bash
git clone https://github.com/Drenzzz/2311082030_Vaksinasi.git
cd 2311082030_Vaksinasi
```

2. Install dependensi
```bash
composer install
```

3. Salin file .env.example menjadi .env dan konfigurasi database (pastikan rename dulu nama DB_DATABASE nya menjadi apa yang kita mau)
```bash
cp .env.example .env
```

4. Generate application key
```bash
php artisan key:generate
```

5. Jalankan migrasi dan seeder
```bash
php artisan migrate --seed
```

6. Jalankan aplikasi
```bash
php artisan serve
```

7. Akses aplikasi di browser: http://localhost:8000

## Pengembangan

Aplikasi ini dikembangkan sebagai tugas UTS mata kuliah Web Framework - Progam Studi D4 TRPL - Jurusan Teknologi Informasi - Politeknik Negeri Padang.

## Kontributor

- Drenzzz a.k.a Muhammad Naufal Nazya Azzharif
