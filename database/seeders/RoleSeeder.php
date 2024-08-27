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
                'nama_role' => 'Knowledge Contributor'
            ],
            [
                'nama_role' => 'Knowledge Verificator'
            ],
            [
                'nama_role' => 'Knowledge Seeker'
            ],
            [
                'nama_role' => 'Pimpinan'
            ],
        ];

        Role::insert($createRoleSeeder);
    }
}
