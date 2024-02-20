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
        $table->id();
        $table->string('nama_barang');
        $table->string('lokasi');
        $table->date('tanggal_kerusakan');
        $table->string('no_spr');
        $table->string('kode_mesin');
        $table->string('no_aset');
        $table->time('jam_kerusakan');
        $table->string('pic_penerima')->nullable();
        $table->text('deskripsi_kerusakan');
        $table->enum('site', ['INKA MADIUN', 'GA BANYUWANGI', 'GA BANDUNG', 'GA JAKARTA', 'QC BANYUWANGI', 'QC BANDUNG', 'QC JAKARTA', 'LAIN NYA']);
        $table->string('keterangan')->nullable();
        $table->enum('status_kerusakan', ['breakdown', 'tidak_breakdown']);
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
