<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PendaftarController extends Controller
{
    /**
     * Menampilkan daftar pendaftar vaksinasi.
     */
    public function index()
    {
        $pendaftars = Pendaftar::paginate(10); // Menggunakan pagination dengan 10 data per halaman
        return view('pendaftar.index', compact('pendaftars'));
    }

    /**
     * Menampilkan form untuk membuat pendaftar baru.
     */
    public function create()
    {
        return view('pendaftar.create');
    }

    /**
     * Menyimpan pendaftar baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:pendaftars,nik',
            'tanggal_lahir' => 'required|date|before:today',
            'jenis_vaksin' => 'required|string|max:255',
            'lokasi_vaksin' => 'required|string|max:255',
            'tanggal_vaksin' => 'required|date|after_or_equal:today',
            'status' => ['required', Rule::in(['terdaftar', 'hadir', 'tidak hadir'])],
        ]);

        // Buat pendaftar baru
        Pendaftar::create($validated);

        return redirect()->route('pendaftar.index')
            ->with('success', 'Pendaftar berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail pendaftar tertentu.
     */
    
    /**
     * Menampilkan form untuk mengedit pendaftar.
     */
    public function edit(Pendaftar $pendaftar)
    {
        return view('pendaftar.edit', compact('pendaftar'));
    }

    /**
     * Mengupdate pendaftar di database.
     */
    public function update(Request $request, Pendaftar $pendaftar)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => [
                'required',
                'string',
                'size:16',
                Rule::unique('pendaftars')->ignore($pendaftar->id),
            ],
            'tanggal_lahir' => 'required|date|before:today',
            'jenis_vaksin' => 'required|string|max:255',
            'lokasi_vaksin' => 'required|string|max:255',
            'tanggal_vaksin' => 'required|date',
            'status' => ['required', Rule::in(['terdaftar', 'hadir', 'tidak hadir'])],
        ]);

        // Update pendaftar
        $pendaftar->update($validated);

        return redirect()->route('pendaftar.index')
            ->with('success', 'Data pendaftar berhasil diperbarui!');
    }

    /**
     * Menghapus pendaftar (soft delete).
     */
    public function destroy(Pendaftar $pendaftar)
    {
        $pendaftar->delete();

        return redirect()->route('pendaftar.index')
            ->with('success', 'Pendaftar berhasil dihapus!');
    }

    /**
     * Menampilkan pendaftar yang telah dihapus (soft deleted).
     */
    public function trash()
    {
        $trashedPendaftars = Pendaftar::onlyTrashed()->paginate(10);
        return view('pendaftar.trash', compact('trashedPendaftars'));
    }

    /**
     * Memulihkan pendaftar yang telah dihapus.
     */
    public function restore($id)
    {
        $pendaftar = Pendaftar::onlyTrashed()->findOrFail($id);
        $pendaftar->restore();

        return redirect()->route('pendaftar.trash')
            ->with('success', 'Pendaftar berhasil dipulihkan!');
    }

    /**
     * Menghapus pendaftar secara permanen.
     */
    public function forceDelete($id)
    {
        $pendaftar = Pendaftar::onlyTrashed()->findOrFail($id);
        $pendaftar->forceDelete();

        return redirect()->route('pendaftar.trash')
            ->with('success', 'Pendaftar berhasil dihapus secara permanen!');
    }
}
