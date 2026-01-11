# 🧬 Sistem Informasi Manajemen Laboratorium Histopatologi (SIM-LH)

Sistem ini digunakan untuk mengelola data pemeriksaan histopatologi pada Laboratorium Patologi Anatomi.  
Data yang dikelola meliputi pasien, dokter, rumah sakit, sampel jaringan, proses makroskopik & mikroskopik, serta hasil diagnosis.

Sistem ini dibangun dengan **pendekatan kriptografi modern** untuk menjaga:
- Kerahasiaan data pasien
- Keamanan akun pengguna
- Integritas hasil pemeriksaan

---
# 🚀 Fitur Utama

### 1. Manajemen Pengguna
- Login & manajemen akun (Admin, Dokter, Petugas)
- Password diamankan dengan **hashing BCrypt**
- Role Based Access Control (RBAC)

### 2. Manajemen Data Pasien (Terenkripsi)
- Input dan pengelolaan data pasien
- Data hanya dapat dibaca setelah proses dekripsi

### 3. Manajemen Dokter dan Rumah Sakit
- Data dokter pengirim sampel
- Relasi dokter dengan rumah sakit
- Riwayat pengiriman sampel

### 4. Manajemen Sampel
- Pencatatan kode sampel
- Relasi sampel dengan pasien dan dokter
- Tanggal penerimaan dan status pemeriksaan

### 5. Pemeriksaan Histopatologi
- Input hasil makroskopik
- Input hasil mikroskopik
- Input diagnosis

---

## 🔐 Prinsip Keamanan & Kriptografi

| Aspek | Metode |
|------|------|
| Password Login | **Hashing BCrypt** |
| Verifikasi password | `password_verify()` |
| Enkripsi data | `openssl_encrypt()` |
| Dekripsi data | `openssl_decrypt()` |

---

## 👥 Role & Hak Akses

| Role | Hak Akses |
|------|---------|
| **Admin** | Semua fitur (kelola user, Dokter, petugas, sampel, Data Laporan) |
| **Petugas** | input data dan update pasien, input data dan update sampel, input dan update pemeriksaan, input data laporan |

---

## 🧪 Teknologi

- PHP 8.7
- MySQL / MariaDB
- MySQLi (Prepared Statement)
- Bootstrap
- MVC (PHP Native) 
- PWA

## Users 
| email | password |
|------|------|
|admin@gmail.com|12345678|


## 📌 Penutup

Sistem ini dirancang untuk membantu Laboratorium Patologi Anatomi dalam mengelola proses pemeriksaan histopatologi secara terstruktur, aman, dan modern, mulai dari pendataan pasien, dokter, dan sampel jaringan hingga pencatatan hasil makroskopik, mikroskopik, dan diagnosis, dengan dukungan teknologi kriptografi modern untuk melindungi data medis yang bersifat sensitif.

---

📌 *Dikembangkan sebagai tugas Mata Kuliah Kriptografi Semester 7. 
dibuat oleh Muhammad Hafiz Ar Rahman*

---
