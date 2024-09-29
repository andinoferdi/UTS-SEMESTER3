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
        Schema::create('setting_menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_user_id')->constrained('jenis_users')->onDelete('cascade'); // Foreign key ke jenis_users
            $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade'); // Foreign key ke menus
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_menus');
    }
};
