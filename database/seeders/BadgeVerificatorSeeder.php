<?php

namespace Database\Seeders;

use App\Models\BadgeVerificator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
class BadgeVerificatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('badge_verificators')->insert([
            [
                'badge_name' => 'bronze verificator',
            ],
            [
                'badge_name' => 'silver verificator',
            ],
            [
                'badge_name' => 'gold verificator',
            ],
            [
                'badge_name' => 'genius verificator',
            ],
        ]);
    }
}
