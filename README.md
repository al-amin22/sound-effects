# Sound Effects Library

Sound Effects Library adalah aplikasi web berbasis Laravel 10 untuk katalog, pencarian, dan pengunduhan sound effect serta sound pack. Proyek ini juga menyediakan manajemen kategori, unggah audio dan gambar, formulir kontak, langganan newsletter, serta fitur SEO dan sitemap.

## Ringkasan

Aplikasi ini dirancang untuk membantu pengguna menemukan dan mengunduh efek suara yang relevan untuk video, game, animasi, dan proyek multimedia lainnya. Di sisi admin, sistem menyediakan pengelolaan data sound effect, sound pack, dan kategori secara terstruktur.

## Fitur Utama

- katalog sound effect publik
- halaman detail sound effect dengan metadata SEO dinamis
- pencarian sound effect dan sound pack
- filter berdasarkan kategori dan negara
- halaman sound pack dengan daftar audio terkait
- unduhan audio per sound effect
- admin dashboard ringkas
- CRUD kategori dan sound effect
- unggah file audio dan gambar
- formulir kontak dan newsletter
- sitemap XML
- halaman kebijakan, lisensi, DMCA, dan terms of use

## Teknologi

- Laravel 10
- PHP 8.1+
- Livewire
- Laravel Sanctum
- Laravel Breeze
- Parsedown
- Mews Purifier
- Spatie Laravel Sitemap

## Modul Utama

- `SoundEffectController`: halaman publik sound effect, detail, pencarian, dan download
- `SoundPackController`: daftar, detail, filter, pencarian, dan API sound pack
- `CategoryController`: tampilan sound berdasarkan kategori
- `Admin\DashboardController`: ringkasan statistik admin
- `Admin\CategoryController`: CRUD kategori
- `Admin\SoundeffectController`: CRUD sound effect dan unggah file audio
- `ContactController`: pengiriman pesan kontak
- `SubscribeController`: langganan newsletter
- `ImageController`: unggah gambar dan audio
- `SitemapController`: pembuatan sitemap XML

## Alur Kerja Singkat

1. Pengunjung membuka beranda dan menelusuri katalog sound effect.
2. Pengguna dapat mencari, memfilter, dan membuka halaman detail audio.
3. File audio dapat diunduh dari halaman detail sound effect.
4. Admin masuk ke dashboard untuk mengelola kategori dan sound effect.
5. Konten SEO, sitemap, kontak, dan newsletter dikelola melalui modul pendukung.

## Rute Penting

- `/`: halaman utama
- `/search`: pencarian sound effect
- `/collection`: koleksi sound effect
- `/sound-packs`: daftar sound pack
- `/sound-packs/{slug}`: detail sound pack
- `/category/{slug}`: halaman kategori
- `/login`: halaman login
- `/admin/dashboard`: dashboard admin
- `/sitemap.xml`: sitemap

## Dokumentasi Tambahan

- [Project Overview](docs/PROJECT_OVERVIEW.md)
- [User Guide](docs/USER_GUIDE.md)

## Instalasi

1. Salin `.env.example` menjadi `.env`.
2. Sesuaikan konfigurasi database dan aplikasi.
3. Jalankan `composer install`.
4. Jalankan `npm install`.
5. Jalankan `php artisan key:generate`.
6. Jalankan migrasi database bila diperlukan.
7. Jalankan `npm run build`.
8. Jalankan `php artisan serve`.

## Catatan Teknis

- File audio disimpan di folder publik agar dapat diunduh langsung.
- Metadata SEO dibentuk secara dinamis dari data sound effect dan sound pack.
- Sitemap dan halaman kebijakan mendukung kebutuhan publikasi situs katalog audio.
