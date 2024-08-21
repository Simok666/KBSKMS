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
        Schema::create('eselons', function (Blueprint $table) {
            $table->id();
            $table->text('nama_eselon');    
            $table->enum('tipe_eselon', ['satuan_kerja_eselon_3', 'satuan_kerja_eselon_2', 'satuan_kerja_eselon_1']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eselons');
    }
};
