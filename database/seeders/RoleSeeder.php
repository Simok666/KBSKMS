<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createRoleSeeder = [
            [
                'nama_role' => 'knowledge_contributor'
            ],
            [
                'nama_role' => 'knowledge_verificator'
            ],
            [
                'nama_role' => 'pimpinan'
            ],
        ];

        Role::insert($createRoleSeeder);
    }
}
