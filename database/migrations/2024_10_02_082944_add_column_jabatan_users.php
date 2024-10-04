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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id_nama_jabatan_struktural')->after('id_fungsi')->nullable();
            $table->text('nama_jabatan_fungsional')->after('id_nama_jabatan_struktural')->nullable();

            $table->foreign('id_nama_jabatan_struktural')->references('id')->on('jabatan_strukturals')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('id_nama_jabatan_struktural');
            $table->dropColumn('nama_jabatan_fungsional');
        });
    }
};
