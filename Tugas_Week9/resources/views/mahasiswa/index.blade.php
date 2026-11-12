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
            background-color: #7b1113; 
            padding: 20px 0 50px 0;
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

    <div class="header-bg text-white">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4 px-2">
                <span class="fw-semibold">Portal Akademik TA</span>
                @auth
                    <span class="badge bg-light text-dark px-3 py-2 fw-bold shadow-sm">
                        👤 {{ auth()->user()->name }} (Role: {{ auth()->user()->role }})
                    </span>
                @endauth
            </div>

            <div class="bg-white text-dark rounded-4 p-4 shadow-sm mx-auto" style="max-width: 800px;">
                <h2 class="fw-bold mb-1 text-center" style="color: #1e293b;">Sistem Tugas Akhir & Skripsi</h2>
                <p class="text-muted mb-3 text-center">Management Data Mahasiswa</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="/mahasiswa" class="btn text-white fw-bold px-4 py-2" style="background-color: #4a0e17;">Daftar Mahasiswa</a>
                    <a href="/mahasiswa/create" class="btn text-white fw-bold px-4 py-2" style="background-color: #4a0e17;">Tambah Mahasiswa Baru</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5 flex-grow-1">
        <div class="main-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-dark m-0">Daftar Mahasiswa Peserta TA</h3>
                <a href="/mahasiswa/create" class="btn btn-success">+ Tambah Data</a>
            </div>
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead style="background-color: #343a40; color: white;">
                        <tr>
                            <th class="text-center" width="50">No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Angkatan</th>
                            <th>SKS Lulus</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" width="220">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataMahasiswa as $index => $mhs)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $mhs->nim }}</td>
                            <td>{{ $mhs->nama }}</td>
                            <td>{{ $mhs->angkatan }}</td>
                            <td>{{ $mhs->sks }}</td>
                            <td class="text-center">
                                @if($mhs->status == 'Aktif TA')
                                    <span class="badge rounded-pill bg-success px-3 py-2">Aktif TA</span>
                                @else
                                    <span class="badge rounded-pill bg-danger px-3 py-2">Cuti</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="/mahasiswa/{{ $mhs->nim }}" class="btn btn-secondary btn-sm px-2">Detail</a>
                                <a href="/mahasiswa/{{ $mhs->nim }}/edit" class="btn btn-warning btn-sm px-2 text-dark fw-semibold">Edit</a>
                                
                                @if(auth()->check() && auth()->user()->role === 'admin')
                                    <form action="/mahasiswa/{{ $mhs->nim }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm px-2">Hapus</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer>
        <p class="mb-1"><strong>Profil:</strong></p>
        <p class="mb-0">Nama: Muhammad Fatih Wicaksono | NIM: 102022500248 | Kelas: SI-49-07 | Kelompok: 11</p>
        <p class="mb-0">Modul Pilihan: Modul Data Mahasiswa (Individu C)</p>
    </footer>

</body>
</html>