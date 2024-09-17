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
        Schema::table('contributors', function (Blueprint $table) {
            $table->enum('status', ['verifikasi', 'revisi', 'publish'])->after('tipe')->nullable();
            $table->boolean('status_verifikator')->after('status');
            $table->unsignedBigInteger('id_user')->after('status_verifikator')->nullable();
            $table->unsignedBigInteger('id_admin')->after('id_user')->nullable();
            // $table->unsignedBigInteger('id_operator')->after('id_admin')->nullable();
            $table->string('role')->after('id_admin')->nullable();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_admin')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contributors', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('status_verifikator');
            $table->dropColumn('id_user');
            $table->dropColumn('id_admin');
            $table->dropColumn('role');
        });
    }
};
