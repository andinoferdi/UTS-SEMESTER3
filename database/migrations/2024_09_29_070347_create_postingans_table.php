<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration

{
    public function up()
    {
        Schema::create('postingans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users
            $table->string('nama_postingan');
            $table->string('gambar')->nullable(); // Optional image column
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('postingans');
    }
};
