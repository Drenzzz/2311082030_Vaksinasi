@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-trash me-2"></i>Data Pendaftar Dihapus</h5>
        <a href="{{ route('pendaftar.index') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar
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
                        <th>Dihapus Pada</th>
                        <th class="actions-column">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trashedPendaftars as $index => $pendaftar)
                    <tr>
                        <td>{{ $trashedPendaftars->firstItem() + $index }}</td>
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
                        <td>{{ $pendaftar->deleted_at->format('d/m/Y H:i') }}</td>
                        <td class="actions-column">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#restoreModal{{ $pendaftar->id }}">
                                    <i class="fas fa-redo"></i> Pulihkan
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#forceDeleteModal{{ $pendaftar->id }}">
                                    <i class="fas fa-trash"></i> Hapus Permanen
                                </button>
                            </div>

                            <!-- Modal Konfirmasi Pulihkan -->
                            <div class="modal fade" id="restoreModal{{ $pendaftar->id }}" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="restoreModalLabel">Konfirmasi Pemulihan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin memulihkan data pendaftar <strong>{{ $pendaftar->nama_lengkap }}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('pendaftar.restore', $pendaftar->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-info">Pulihkan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Konfirmasi Hapus Permanen -->
                            <div class="modal fade" id="forceDeleteModal{{ $pendaftar->id }}" tabindex="-1" aria-labelledby="forceDeleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="forceDeleteModalLabel">Konfirmasi Hapus Permanen</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger">
                                                <i class="fas fa-exclamation-triangle"></i> Peringatan: Tindakan ini tidak dapat dibatalkan!
                                            </div>
                                            Apakah Anda yakin ingin menghapus data pendaftar <strong>{{ $pendaftar->nama_lengkap }}</strong> secara permanen?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('pendaftar.force-delete', $pendaftar->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus Permanen</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">Tidak ada data pendaftar yang dihapus.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end">
            {{ $trashedPendaftars->links() }}
        </div>
    </div>
</div>
@endsection
