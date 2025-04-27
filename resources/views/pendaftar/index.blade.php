@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-clipboard-list me-2"></i>Daftar Pendaftar Vaksinasi</h5>
        <a href="{{ route('pendaftar.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus me-1"></i> Tambah Pendaftar
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>NIK</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Vaksin</th>
                        <th>Lokasi</th>
                        <th>Tanggal Vaksin</th>
                        <th>Status</th>
                        <th class="actions-column">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pendaftars as $index => $pendaftar)
                    <tr>
                        <td>{{ $pendaftars->firstItem() + $index }}</td>
                        <td>{{ $pendaftar->nama_lengkap }}</td>
                        <td>{{ $pendaftar->nik }}</td>
                        <td>{{ $pendaftar->tanggal_lahir->format('d/m/Y') }}</td>
                        <td>{{ $pendaftar->jenis_vaksin }}</td>
                        <td>{{ $pendaftar->lokasi_vaksin }}</td>
                        <td>{{ $pendaftar->tanggal_vaksin->format('d/m/Y') }}</td>
                        <td>
                            @if($pendaftar->status == 'terdaftar')
                                <span class="badge bg-info">Terdaftar</span>
                            @elseif($pendaftar->status == 'hadir')
                                <span class="badge bg-success">Hadir</span>
                            @else
                                <span class="badge bg-danger">Tidak Hadir</span>
                            @endif
                        </td>
                        <td class="actions-column">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('pendaftar.edit', $pendaftar->id) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $pendaftar->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>

                            <!-- Modal Konfirmasi Hapus -->
                            <div class="modal fade" id="deleteModal{{ $pendaftar->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus data pendaftar <strong>{{ $pendaftar->nama_lengkap }}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('pendaftar.destroy', $pendaftar->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data pendaftar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end">
            {{ $pendaftars->links() }}
        </div>
    </div>
</div>
@endsection
