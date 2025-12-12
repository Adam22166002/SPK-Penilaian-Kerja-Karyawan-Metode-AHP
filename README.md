# 🧾 Sistem Pendukung Keputusan Penilaian Kinerja Karyawan  
## Metode **AHP (Analytical Hierarchy Process)** • Laravel

Sistem Pendukung Keputusan (SPK) ini dibangun menggunakan **Laravel** dan menerapkan metode **AHP (Analytical Hierarchy Process)** untuk membantu perusahaan menilai kinerja karyawan secara objektif, terukur, dan konsisten. Dengan metode AHP, sistem menghasilkan bobot kriteria berdasarkan perbandingan berpasangan sehingga menghasilkan keputusan yang lebih akurat.

---

## 📌 Fitur Utama

### **1. Manajemen Karyawan**
- Tambah, edit, dan hapus data karyawan.

### **2. Manajemen Kriteria**
- Menambahkan kriteria penilaian.
- Input perbandingan berpasangan (pairwise comparison).
- Menampilkan bobot kriteria hasil perhitungan AHP.
- Validasi nilai konsistensi (CR).

### **3. Perhitungan AHP Otomatis**
- Membentuk matriks perbandingan.
- Menghitung eigen vector (bobot kriteria).
- Menghitung nilai CI & CR.
- Memberikan peringatan jika CR > 0.1.

### **4. Penilaian Karyawan**
- Admin memasukkan nilai setiap karyawan sesuai bobot kriteria.
- Sistem menghitung nilai akhir berdasarkan bobot AHP.
- Menampilkan ranking karyawan.

### **5. Dashboard**
- Menampilkan ringkasan penilaian.
- Menampilkan grafik perbandingan kinerja.

### **6. Periode Penilaian**
- Mengelola periode aktif.
- Melihat riwayat hasil per periode.

### **7. Laporan**
- Export hasil penilaian ke PDF.

---

## 🧠 Tentang Metode AHP

Metode AHP meliputi langkah-langkah berikut:

1. Menyusun hirarki masalah.
2. Membuat matriks perbandingan berpasangan.
3. Menghitung eigen vector dan bobot kriteria.
4. Menghitung konsistensi melalui:
   - **Consistency Index (CI)**
   - **Consistency Ratio (CR)**
5. CR ≤ 0.1 → keputusan konsisten.

Metode AHP unggul karena:
- Terstruktur (hierarki).
- Menghasilkan bobot objektif.
- Dapat memeriksa konsistensi penilaian.

---

## 🛠️ Teknologi yang Digunakan

- **Laravel** – Framework
- **MySQL** – Database
- **Blade & Bootstrap** – UI
- **Chart.js** – Grafik
- **SweetAlert, Datatables** – UI Interaktif

---

## 📂 Struktur Folder Utama

```plaintext
├── app/
│   ├── Http/Controllers/
│   ├── Models/
│   ├── Services/AhpService.php
│   ├── Services/SAWService.php
├── resources/views/
│   ├── dashboard.blade.php
│   ├── karyawan
│   ├── kriteria
│   ├── ahp/
│   ├── penilaian/
├── database/
│   ├── migrations/
│   ├── seeders/
└── routes/
    └── web.php
