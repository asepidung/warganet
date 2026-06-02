# Panduan & Spesifikasi: Modul Customer (User WiFi / PPPoE)

Modul **Customer** (atau User pelanggan internet) saat ini sudah mencapai versi stabil awal. Isu ini dibuat sebagai panduan dokumentasi dan daftar tugas (*task*) lanjutan bagi *programmer junior* yang akan melanjutkan pengembangan modul ini.

## 1. Logika Bisnis & Aturan (*Business Logic*)
- **Penghapusan Data:** Data *Customer* **TIDAK BOLEH** dihapus secara permanen (*hard delete*) untuk menjaga integritas data tagihan (Billing). Oleh karena itu, *action* `delete` di-disable pada `CustomerResource`.
- **Status Aktif:** Sebagai pengganti penghapusan, digunakan kolom `is_active` (tipe boolean). Jika pelanggan berhenti berlangganan atau menunggak, cukup ubah status menjadi tidak aktif (Toggle off).

## 2. Aturan UI / UX (MoonShine v3)
Untuk menjaga agar antarmuka (*interface*) tetap rapi dan *premium*, perhatikan standar UI berikut:
- **Halaman Index (Tabel):**
  - Tampilkan informasi esensial saja agar tidak penuh: *Name*, *IP Router*, *SSID WiFi*, *Password WiFi*, *Monthly Fee*, dan *Status*.
  - Gunakan `Switcher::make('Status', 'is_active')->updateOnPreview()` agar admin bisa menyalakan/mematikan pelanggan langsung dari tabel tanpa harus masuk ke form Edit.
  - Format angka (seperti tagihan bulanan) ke dalam Rupiah (Rp).
- **Halaman Form & Detail:**
  - **Dilarang** menampilkan field secara berderet panjang ke bawah.
  - **WAJIB** menggunakan `\MoonShine\UI\Fields\Fieldset::make('Nama Grup', [ ... fields ... ])` di dalam method `fields()` untuk memecah form ke dalam kotak-kotak (*box*) yang logis.
  - (Catatan Penting MoonShine v3: Jangan menggunakan `Grid` atau `Box` *layout components* secara langsung di dalam method `fields()`, gunakan `Fieldset`).
  - Pembagian *Fieldset* saat ini:
    - **General Information:** ID, Name, Status, Monthly Fee
    - **Router Information:** IP Router, User Router, Pass Router
    - **PPPoE & Remote:** User PPPoE, Pass PPPoE, Remote Address
    - **WiFi Credentials:** SSID WiFi, Pass WiFi

## 3. Task Lanjutan (To-Do List untuk Junior Programmer)
Berikut adalah daftar fitur yang bisa dikembangkan selanjutnya untuk menyempurnakan modul ini:
- [ ] **Validasi Data:** Tambahkan *form validation rules* (misalnya: pastikan format `ip_router` adalah IP Address yang valid, `monthly_fee` wajib angka).
- [ ] **Integrasi Mikrotik (API):** Buat *Observer* atau *Event Listener* saat `is_active` diubah. Jika *false*, kirim perintah via API RouterOS untuk men-disable secret PPPoE/Hotspot pelanggan tersebut di Mikrotik.
- [ ] **Fitur Export & Import:** Tambahkan action untuk *Export* data ke Excel/CSV dan *Import* data pelanggan baru untuk memudahkan migrasi.
- [ ] **Relasi Tagihan (Billing):** Di halaman *Detail* (*CustomerDetailPage*), tambahkan komponen tabel yang menampilkan *history* tagihan (Billing) milik pelanggan tersebut (gunakan `HasMany` relation field di MoonShine).

---
*Issue ini digenerate otomatis sebagai dokumentasi serah terima tugas (handover).*
