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
        Schema::create('pesan', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'pengirim'); // Email pengirim
            $table->text('nama_pesan'); // Isi pesan atau judul pesan
            $table->foreignId(column: 'kategori_pesan_id')->constrained('kategori_pesan')->onDelete('cascade');
            $table->string('file')->nullable(); // File lampiran, jika ada
            $table->string('penerima'); // Email penerima
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesan');
    }
};
