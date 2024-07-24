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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->require()->unique();
            $table->string('alamat')->require();
            $table->text('deskripsi')->nullable();
            $table->string('pelayanan')->nullable();
            $table->string('telpon')->nullable();
            $table->string('tipe')->nullable();
            $table->string('web')->nullable();
            $table->json('images')->nullable();
            $table->string('lat')->require()->unique()->require();
            $table->string('lng')->require()->unique()->require();
            $table->foreignId('category_id')->onDelete('cascade')->require()->constrained(); // Foreign key to categories
            $table->foreignId('kelurahan_id')->onDelete('cascade')->require()->constrained(); // Foreign key to kelurahan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};
