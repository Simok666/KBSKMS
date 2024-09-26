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
            $table->unsignedBigInteger('badge_contributor_id')->after('is_verified')->nullable();
            $table->unsignedBigInteger('badge_verificator_id')->after('badge_contributor_id')->nullable();
            $table->unsignedBigInteger('badge_activity_id')->after('badge_verificator_id')->nullable();
            

            $table->foreign('badge_contributor_id')->references('id')->on('badge_contributors')->onDelete('cascade');
            $table->foreign('badge_verificator_id')->references('id')->on('badge_verificators')->onDelete('cascade');
            $table->foreign('badge_activity_id')->references('id')->on('badge_activities')->onDelete('cascade');
            
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contributors', function (Blueprint $table) {
            $table->dropColumn('badge_contributor_id');
        });
    }
};
