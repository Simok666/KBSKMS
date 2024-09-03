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
        Schema::create('contributors', function (Blueprint $table) {
            $table->id();
            $table->text('judul');
            $table->text('dekskripsi');
            $table->unsignedBigInteger('id_kategori');
            $table->string('tag');
            $table->unsignedBigInteger('id_user_contributor');
            $table->enum('tipe', ['internal', 'public'])->nullable();
            $table->timestamps();

            $table->foreign('id_user_contributor')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contributors');
    }
};
