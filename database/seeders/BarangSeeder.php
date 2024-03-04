<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate 10 records
        for ($i = 1; $i <= 10; $i++) {
            DB::table('barangs')->insert([
                'nama_barang' => 'Nama Barang ' . $i,
                'lokasi' => 'Lokasi ' . $i,
                'tanggal_kerusakan' => now()->subDays(rand(1, 100)),
                'kode_mesin' => 'Kode Mesin ' . $i,
                'no_aset' => 'No Aset ' . $i,
                'jam_kerusakan' => now()->subMinutes(rand(1, 1440))->format('H:i:s'),
                'user_peminta' => 'User Peminta ' . $i,
                'deskripsi_kerusakan' => 'Deskripsi Kerusakan ' . $i,
                'site' => ['INKA MADIUN', 'GA BANYUWANGI', 'GA BANDUNG', 'GA JAKARTA', 'QC BANYUWANGI', 'QC BANDUNG', 'QC JAKARTA', 'LAIN NYA'][rand(0, 7)],
                'status_kerusakan' => ['breakdown', 'tidak_breakdown'][rand(0, 1)],
                'tanggal_sprditerima' => now()->subDays(rand(1, 100)),
                'jam_sprditerima' => now()->subMinutes(rand(1, 1440))->format('H:i:s'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
