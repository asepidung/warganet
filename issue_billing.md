# Modul Billing (Tagihan) - Dokumentasi & Spesifikasi

Modul **Billing** telah direstrukturisasi agar lebih rapi, terpusat, dan minim kesalahan operasional (human error), mengacu pada kebutuhan sistem tagihan Warganet. Berikut adalah panduan detail mengenai logika sistem, batasan, dan UI/UX untuk dipelajari/diteruskan oleh *programmer junior*.

## 1. Logika Sistem (Business Logic)

### A. Konsep Dasar Tagihan (Generate Bills)
- **Generate Manual & Terpusat:** Pembuatan tagihan (`bills`) tidak lagi dilakukan satu-per-satu oleh admin melalui tombol "Create", melainkan dilakukan secara massal melalui satu tombol global **Generate Bills**.
- **Aturan Pembuatan Tagihan:**
  - Hanya pelanggan dengan status **Aktif** (`is_active = true` pada tabel `customers`) yang akan dibuatkan tagihan pada bulan berjalan.
  - Tagihan tidak bisa digenerate dua kali dalam satu bulan yang sama (mencegah *double billing*). Sistem mengecek keberadaan data bulan ini melalui tabel `bills`.
- **Akumulasi Tunggakan:** 
  - Jika pelanggan masih memiliki sisa tagihan dari bulan sebelumnya (status belum lunas), sistem akan **menambahkan otomatis** sisa tagihan tersebut (`lastBill->bill_total`) dengan tagihan bulanan berjalan (`monthly_fee`).

### B. Konsep Pembayaran (Payment)
- **Metode Cicilan (*Partial Payment*):** 
  - Pelanggan diperbolehkan membayar sebagian dari total tagihan. 
  - Ketika pelanggan membayar (`payment`) atau diberikan potongan harga (`discount`), total tagihannya (`bill_total`) akan berkurang sesuai rumus: `bill_total = bill_total - (payment + discount)`.
- **Status Otomatis:**
  - Jika hasil pengurangan `bill_total > 0`, maka status tagihan di tabel `bills` berubah menjadi `partial_payment`.
  - Jika `bill_total == 0`, status berubah menjadi `fully_paid` (lunas).
- **Tabel Payments:** 
  - Seluruh riwayat bayar tersimpan di tabel `payments` dengan status default `waiting`. Konfirmasi pembayaran dilakukan di modul/tahap lain.

---

## 2. Struktur UI / UX

### A. Tabel Daftar Tagihan (BillIndexPage)
- **Fokus pada 1 Baris per Pelanggan:** Tabel telah dimodifikasi secara paksa (melalui *query override*) agar hanya menampilkan histori tagihan **terbaru/terakhir** (`MAX(id)`) milik masing-masing pelanggan. Hal ini dilakukan agar layar admin tidak penuh dengan histori tagihan lama.
- **Kolom yang Disembunyikan:** Kolom **Monthly Fee** tidak dimunculkan di halaman indeks agar admin tidak bingung, admin hanya fokus ke kolom **Bill Total**.
- **Action Buttons Dibatasi:** Tombol *View, Edit, Delete* bawaan sistem dimatikan (`getActiveActions() => []`) agar data yang sensitif ini tidak dapat dimanipulasi secara asal.

### B. Form Pembayaran (Modal PAY)
- **Pop-up Modal:** Admin menekan tombol aksi "PAY" untuk memunculkan modal pembayaran tanpa harus pindah halaman. Tombol PAY hanya muncul di tabel jika sisa tagihan lebih dari 0.
- **Auto-Select Input:** Saat diklik, teks nominal pembayaran akan terblok otomatis sehingga admin dapat langsung mengetik menimpa (*override*) angka yang ada tanpa menghapus satu per satu.
- **Masking Mata Uang:** Kolom `payment` dan `discount` menggunakan format teks yang otomatis berubah menjadi ribuan (misal: `150,000`) saat admin mengetik, agar lebih mudah dibaca (mencegah salah hitung nol).
- **Sanitasi Koma di Backend:** Walaupun admin mengirim input dalam bentuk koma (misal: `15,000`), Controller (`StorePaymentController`) akan otomatis membuang tanda koma sebelum melakukan validasi angka murni ke database.

**Mohon semua perubahan baru terkait modul ini selalu mengacu pada spesifikasi di atas!**
