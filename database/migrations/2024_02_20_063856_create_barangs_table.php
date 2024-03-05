<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('barangs', function (Blueprint $table) {
        $table->id('nomor_spr')->startingValue(23101); // Mengubah no_spr menjadi primary key
        $table->string('nama_barang');
        $table->string('lokasi');
        $table->date('tanggal_kerusakan');
        $table->string('kode_mesin');
        $table->string('no_aset');
        $table->time('jam_kerusakan');
        $table->string('user_peminta');
        $table->text('deskripsi_kerusakan');
        $table->enum('site', ['INKA MADIUN', 'GA BANYUWANGI', 'GA BANDUNG', 'GA JAKARTA', 'QC BANYUWANGI', 'QC BANDUNG', 'QC JAKARTA', 'LAIN NYA']);
        $table->enum('status_kerusakan', ['breakdown', 'tidak_breakdown']);
        $table->date('tanggal_sprditerima');
        $table->time('jam_sprditerima');
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
