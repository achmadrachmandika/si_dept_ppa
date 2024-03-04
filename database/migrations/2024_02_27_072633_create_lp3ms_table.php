<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lp3ms', function (Blueprint $table) {
             $table->unsignedBigInteger('no_spr'); // Menambah kolom no_spr di tabel lp3ms
            $table->foreign('no_spr')->references('no_spr')->on('barangs'); // Menambah foreign key untuk merujuk ke tabel barangs
            $table->string('hasil_pengukuran');
            $table->string('penyebab_kerusakan');
            $table->string('alasan');
            $table->string('nama_personil_1')->nullable();
            $table->string('nama_personil_2')->nullable();
            $table->string('nama_personil_3')->nullable();
            $table->string('nama_personil_4')->nullable();
            $table->string('nama_personil_5')->nullable();
            $table->string('nama_personil_6')->nullable();
            $table->string('nama_personil_7')->nullable();
            $table->string('nama_personil_8')->nullable();
            $table->string('nama_personil_9')->nullable();
            $table->string('nama_personil_10')->nullable();
            $table->string('tanggal');
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->string('penyelesaian');
            $table->string('nama_sparepart_1')->nullable();
            $table->string('kode_sparepart_1')->nullable();
            $table->string('spek_sparepart_1')->nullable();
            $table->string('jumlah_sparepart_1')->nullable();
            $table->string('nama_sparepart_2')->nullable();
            $table->string('kode_sparepart_2')->nullable();
            $table->string('spek_sparepart_2')->nullable();
            $table->string('jumlah_sparepart_2')->nullable();
            $table->string('nama_sparepart_3')->nullable();
            $table->string('kode_sparepart_3')->nullable();
            $table->string('spek_sparepart_3')->nullable();
            $table->string('jumlah_sparepart_3')->nullable();
            $table->string('nama_sparepart_4')->nullable();
            $table->string('kode_sparepart_4')->nullable();
            $table->string('spek_sparepart_4')->nullable();
            $table->string('jumlah_sparepart_4')->nullable();
            $table->string('nama_sparepart_5')->nullable();
            $table->string('kode_sparepart_5')->nullable();
            $table->string('spek_sparepart_5')->nullable();
            $table->string('jumlah_sparepart_5')->nullable();
            $table->string('nama_sparepart_6')->nullable();
            $table->string('kode_sparepart_6')->nullable();
            $table->string('spek_sparepart_6')->nullable();
            $table->string('jumlah_sparepart_6')->nullable();
            $table->string('nama_sparepart_7')->nullable();
            $table->string('kode_sparepart_7')->nullable();
            $table->string('spek_sparepart_7')->nullable();
            $table->string('jumlah_sparepart_7')->nullable();
            $table->string('nama_sparepart_8')->nullable();
            $table->string('kode_sparepart_8')->nullable();
            $table->string('spek_sparepart_8')->nullable();
            $table->string('jumlah_sparepart_8')->nullable();
            $table->string('nama_sparepart_9')->nullable();
            $table->string('kode_sparepart_9')->nullable();
            $table->string('spek_sparepart_9')->nullable();
            $table->string('jumlah_sparepart_9')->nullable();
            $table->string('nama_sparepart_10')->nullable();
            $table->string('kode_sparepart_10')->nullable();
            $table->string('spek_sparepart_10')->nullable();;
            $table->string('jumlah_sparepart_10')->nullable();;
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lp3ms');
    }
};
