# jamtangan

FIFA Timepieces - Luxury & Precision Watches E-Commerce Platform built with Laravel, Alpine.js, Tailwind CSS / Custom Styling, Midtrans, and Biteship.

## Fitur Utama
- **Katalog Jam Tangan Lengkap**: Automatic, Chronograph, Classic Dress, Diver 300M, Smartwatch, Petite, Rose Gold, Mesh, dan Straps.
- **Visual & UI Eksklusif**: Visual aset model horologi berkualitas tinggi dengan model yang memegang jam tangan dan aset produk jam tangan transparan berpresisi tinggi.
- **Sistem Checkout & Pembayaran**: Integrasi Midtrans Payment Gateway (QRIS, VA, E-Wallet, CC).
- **Kalkulasi Ongkir Real-time**: Integrasi Biteship API.
- **AI Horology Assistant**: Konsultasi kurasi jam tangan interaktif.
- **Admin Dashboard**: Manajemen produk, pesanan, kategori, dan pengaturan toko.

## Setup & Instalasi

1. **Clone & Install Dependencies**:
   ```bash
   composer install
   npm install && npm run build
   ```

2. **Environment & Database**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Pastikan konfigurasi database di `.env`:
   ```env
   DB_DATABASE=ecommerce_jamtangan
   ```

3. **Migrasi & Seeding**:
   ```bash
   php artisan migrate:fresh --seed
   ```

4. **Jalankan Server**:
   ```bash
   php artisan serve
   ```
