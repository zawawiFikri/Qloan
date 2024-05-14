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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customer')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
            $table->foreignId('layanan_id')->constrained('layanan')->onDelete('cascade');
            $table->foreignId('karyawan_id')->nullable()->constrained('karyawan')->onDelete('cascade');
            $table->foreignId('promo_id')->nullable()->constrained('promo')->onDelete('cascade');
            $table->timestamp('tgl_pesanan');
            $table->string('alamat')->nullable();
            $table->text('catatan')->nullable();
            $table->integer('bobot')->nullable();
            $table->decimal('total_pembayaran', 10, 2)->nullable();
            $table->string('jenis_pembayaran')->nullable();
            $table->enum('status_pesanan', ['Menunggu konfirmasi', 'Diterima', 
            'Diproses', 'Pengiriman', 'Selesai'])->default('Menunggu konfirmasi');
            $table->string('nota')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
};
