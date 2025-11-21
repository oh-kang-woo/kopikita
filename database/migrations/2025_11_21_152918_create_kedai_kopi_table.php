<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kedai_kopi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('lokasi');
            $table->decimal('rating', 3, 1)->default(0);
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable(); // nama file gambar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kedai_kopi');
    }
};
