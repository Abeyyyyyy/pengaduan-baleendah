# 🏘️ Sistem Pengaduan Masyarakat — RT Baleendah

Aplikasi web untuk mengelola pengaduan warga, administrasi RT, dan laporan keuangan secara digital dan transparan.

## 🚀 Tech Stack

- **Backend:** Laravel 13 (PHP 8.3)
- **Frontend:** Tailwind CSS v4
- **Database:** MySQL
- **Auth:** Laravel Breeze
- **Email:** Mailtrap (testing)

## 👥 Role Pengguna

| Role | Akses |
|---|---|
| Ketua RT | Dashboard, Data Warga, Pengaduan, Laporan Keuangan |
| Wakil RT | Dashboard, Data Warga, Pengaduan |
| Bendahara | Dashboard, Input & Laporan Keuangan |
| Sekretaris | Dashboard, Kelola Pengaduan |
| Warga | Dashboard, Kirim & Pantau Pengaduan |

## ✨ Fitur Utama

- ✅ Login multi-role dengan proteksi middleware
- ✅ Register khusus warga (role otomatis)
- ✅ Pengaduan warga dengan upload foto
- ✅ Update status pengaduan oleh pengurus
- ✅ Notifikasi email otomatis (Mailtrap)
- ✅ Laporan keuangan RT (pemasukan & pengeluaran)
- ✅ Dashboard per role

## ⚙️ Cara Install
```bash
# Clone repo
git clone https://github.com/Abeyyyyyy/pengaduan-baleendah.git
cd pengaduan-baleendah

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Konfigurasi database di .env
# Lalu jalankan migration & seeder
php artisan migrate
php artisan db:seed

# Storage link
php artisan storage:link

# Build assets
npm run dev

# Jalankan server
php artisan serve
```

## 🔑 Akun Default Pengurus

| Role | Email | Password |
|---|---|---|
| Ketua RT | ketua@baleendah.com | password123 |
| Wakil RT | wakil@baleendah.com | password123 |
| Bendahara | bendahara@baleendah.com | password123 |
| Sekretaris | sekretaris@baleendah.com | password123 |

## 👨‍💻 Developer

Dibuat oleh **Abiyya Hamdan Nurwandha** sebagai project portofolio.