<?php

namespace Database\Seeders;

use App\Models\BadgeContributor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
class BadgeContributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('badge_contributors')->insert([
            [
                'badge_name' => 'KM Enthusiast',
            ],
            [
                'badge_name' => 'KM Novice',
            ],
            [
                'badge_name' => 'KM Scholar',
            ],
            [
                'badge_name' => 'Master of KM',
            ],
        ]);
    }
}
