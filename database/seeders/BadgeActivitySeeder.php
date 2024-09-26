<?php

namespace Database\Seeders;

use App\Models\BadgeActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
class BadgeActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('badge_activities')->insert([
            [
                'badge_name' => 'Learning Enthusiast',
            ],
            [
                'badge_name' => 'Insight Explorer',
            ],
            [
                'badge_name' => 'Insight Advocate',
            ],
            [
                'badge_name' => 'Conten Curator',
            ],
        ]);
    }
}
