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
        Schema::create('error_application', function (Blueprint $table) {
            $table->id();
            $table->string('controller'); // Jenis exception
            $table->text('message'); // Pesan error
            $table->text(column: 'stack_trace')->nullable(); // Stack trace (opsional)
            $table->string(column: 'url')->nullable(); // URL tempat error terjadi
            $table->string('method')->nullable(); // HTTP method (GET, POST, dll)
            $table->string('ip_address')->nullable(); // Alamat IP user
            $table->timestamps(); // Timestamps (created_at dan updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('error_application');
    }
};
