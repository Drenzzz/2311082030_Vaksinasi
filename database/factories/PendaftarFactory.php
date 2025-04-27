<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendaftar>
 */
class PendaftarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jenisVaksin = ['Sinovac', 'AstraZeneca', 'Moderna', 'Pfizer'];
        $lokasiVaksin = ['Rumah Sakit Umum Daerah', 'Rumah Sakit Ibnu Sina', 'Lapangan Kolokala', 'Klinik Doa Ibu', 'Kantor Walikota'];
        $status = ['terdaftar', 'hadir', 'tidak hadir'];

        // Tanggal lahir antara 18-80 tahun
        $tanggalLahir = $this->faker->dateTimeBetween('-80 years', '-18 years')->format('Y-m-d');

        // Tanggal vaksin dari hari ini sampai 3 bulan ke depan
        $tanggalVaksin = $this->faker->dateTimeBetween('now', '+3 months')->format('Y-m-d');

        return [
            'nama_lengkap' => $this->faker->name(),
            'nik' => $this->faker->unique()->numerify('################'), // 16 digit NIK
            'tanggal_lahir' => $tanggalLahir,
            'jenis_vaksin' => $this->faker->randomElement($jenisVaksin),
            'lokasi_vaksin' => $this->faker->randomElement($lokasiVaksin),
            'tanggal_vaksin' => $tanggalVaksin,
            'status' => $this->faker->randomElement($status),
        ];
    }
}
