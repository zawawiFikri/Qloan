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
        Schema::create('promo', function (Blueprint $table) {
            $table->id();
            $table->string('nama_promo');
            $table->text('desc_promo');
            $table->integer('diskon');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->enum('status', ['aktif', 'tidak aktif'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('promo');
    }
};
