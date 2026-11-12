<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Tugas Akhir & Skripsi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f6f9;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .header-bg {
            background-color: #7b1113; /* Merah Marun */
            padding: 30px 0 50px 0;
        }
        .main-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 30px;
            margin-top: -30px;
        }
        footer {
            background-color: #1a1a1a;
            color: #d1d5db;
            text-align: center;
            padding: 20px 0;
            margin-top: auto;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="header-bg text-white text-center">
        <div class="container">
            <div class="bg-white text-dark rounded-4 p-4 shadow-sm mx-auto" style="max-width: 800px;">
                <h2 class="fw-bold mb-1" style="color: #1e293b;">Sistem Tugas Akhir & Skripsi</h2>
                <p class="text-muted mb-3">Management Data Mahasiswa</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="/mahasiswa" class="btn text-white fw-bold px-4 py-2" style="background-color: #4a0e17;">Daftar Mahasiswa</a>
                    <a href="/mahasiswa/create" class="btn text-white fw-bold px-4 py-2" style="background-color: #4a0e17;">Tambah Mahasiswa Baru</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5 flex-grow-1" style="max-width: 850px;">
        <h4 class="fw-bold text-dark mb-4">Formulir Registrasi Mahasiswa TA</h4>
        
        <div class="main-card">
            <form action="/mahasiswa" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nomor Induk Mahasiswa (NIM)</label>
                    <input type="text" name="nim" class="form-control" placeholder="Contoh: 102022500248" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama mahasiswa" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Angkatan</label>
                    <input type="number" name="angkatan" class="form-control" placeholder="Contoh: 2023" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Total SKS Lulus</label>
                    <input type="number" name="sks" class="form-control" placeholder="Contoh: 140" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Status Keaktifan</label>
                    <select name="status" class="form-select" required>
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="Aktif TA">Aktif TA</option>
                        <option value="Cuti">Cuti</option>
                    </select>
                </div>
                
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success px-4">Simpan Data</button>
                    <a href="/mahasiswa" class="btn btn-secondary px-4">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <p class="mb-1"><strong>Profil:</strong></p>
        <p class="mb-0">Nama: [Muhammad Fatih Wicaksono] | NIM: [102022500248] | Kelas: [SI4907] | Kelompok: [11]</p>
        <p class="mb-0">Modul Pilihan: Modul Data Mahasiswa (Individu C)</p>
    </footer>

</body>
</html>