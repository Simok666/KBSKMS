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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('nip');
            $table->unsignedBigInteger('id_satuan_kerja_eselon_3');
            $table->unsignedBigInteger('id_satuan_kerja_eselon_2');
            $table->unsignedBigInteger('id_satuan_kerja_eselon_1');
            $table->string('email')->unique();
            $table->text('nama_jabatan');
            $table->unsignedBigInteger('id_fungsi');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_verified')->default(false);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_satuan_kerja_eselon_1')->references('id')->on('eselon_satus')->onDelete('cascade');
            $table->foreign('id_satuan_kerja_eselon_2')->references('id')->on('eselon_duas')->onDelete('cascade');
            $table->foreign('id_satuan_kerja_eselon_3')->references('id')->on('eselon_tigas')->onDelete('cascade');
            $table->foreign('id_fungsi')->references('id')->on('fungsis')->onDelete('cascade');

        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
