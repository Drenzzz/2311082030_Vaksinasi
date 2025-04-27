@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Tambah Pendaftar Vaksinasi</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('pendaftar.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                        @error('nama_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK (16 digit) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" maxlength="16" minlength="16" required>
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jenis_vaksin" class="form-label">Jenis Vaksin <span class="text-danger">*</span></label>
                        <select class="form-select @error('jenis_vaksin') is-invalid @enderror" id="jenis_vaksin" name="jenis_vaksin" required>
                            <option value="" selected disabled>-- Pilih Jenis Vaksin --</option>
                            <option value="Sinovac" {{ old('jenis_vaksin') == 'Sinovac' ? 'selected' : '' }}>Sinovac</option>
                            <option value="AstraZeneca" {{ old('jenis_vaksin') == 'AstraZeneca' ? 'selected' : '' }}>AstraZeneca</option>
                            <option value="Pfizer" {{ old('jenis_vaksin') == 'Pfizer' ? 'selected' : '' }}>Pfizer</option>
                            <option value="Moderna" {{ old('jenis_vaksin') == 'Moderna' ? 'selected' : '' }}>Moderna</option>
                            <option value="Sinopharm" {{ old('jenis_vaksin') == 'Sinopharm' ? 'selected' : '' }}>Sinopharm</option>
                            <option value="Novavax" {{ old('jenis_vaksin') == 'Novavax' ? 'selected' : '' }}>Novavax</option>
                        </select>
                        @error('jenis_vaksin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="lokasi_vaksin" class="form-label">Lokasi Vaksin <span class="text-danger">*</span></label>
                        <select class="form-select @error('lokasi_vaksin') is-invalid @enderror" id="lokasi_vaksin" name="lokasi_vaksin" required>
                            <option value="" selected disabled>-- Pilih Lokasi Vaksin --</option>
                            <option value="RS Umum Daerah" {{ old('lokasi_vaksin') == 'RS Umum Daerah' ? 'selected' : '' }}>RS Umum Daerah</option>
                            <option value="Puskesmas Kota" {{ old('lokasi_vaksin') == 'Puskesmas Kota' ? 'selected' : '' }}>Puskesmas Kota</option>
                            <option value="Klinik Sentosa" {{ old('lokasi_vaksin') == 'Klinik Sentosa' ? 'selected' : '' }}>Klinik Sentosa</option>
                            <option value="Rumah Sakit Swasta" {{ old('lokasi_vaksin') == 'Rumah Sakit Swasta' ? 'selected' : '' }}>Rumah Sakit Swasta</option>
                            <option value="Balai Kota" {{ old('lokasi_vaksin') == 'Balai Kota' ? 'selected' : '' }}>Balai Kota</option>
                            <option value="Stadion Utama" {{ old('lokasi_vaksin') == 'Stadion Utama' ? 'selected' : '' }}>Stadion Utama</option>
                        </select>
                        @error('lokasi_vaksin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_vaksin" class="form-label">Tanggal Vaksin <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('tanggal_vaksin') is-invalid @enderror" id="tanggal_vaksin" name="tanggal_vaksin" value="{{ old('tanggal_vaksin') }}" required>
                        @error('tanggal_vaksin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <div class="form-check">
                    <input class="form-check-input @error('status') is-invalid @enderror" type="radio" name="status" id="status_terdaftar" value="terdaftar" {{ old('status', 'terdaftar') == 'terdaftar' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="status_terdaftar">
                        Terdaftar
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input @error('status') is-invalid @enderror" type="radio" name="status" id="status_hadir" value="hadir" {{ old('status') == 'hadir' ? 'checked' : '' }}>
                    <label class="form-check-label" for="status_hadir">
                        Hadir
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input @error('status') is-invalid @enderror" type="radio" name="status" id="status_tidak_hadir" value="tidak hadir" {{ old('status') == 'tidak hadir' ? 'checked' : '' }}>
                    <label class="form-check-label" for="status_tidak_hadir">
                        Tidak Hadir
                    </label>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('pendaftar.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
