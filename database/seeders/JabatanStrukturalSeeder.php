<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class JabatanStrukturalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jabatan_strukturals')->insert([
            [
                'jenis_jabatan' => 'Kepala Eselon 1',
                'nama_jabatan' => 'Kepala Badan Kebijakan Transportasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_jabatan' => 'Kepala Eselon 2',
                'nama_jabatan' => 'Sekretaris Badan Kebijakan Transportasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_jabatan' => 'Kepala Eselon 3',
                'nama_jabatan' => 'Kepala Bagian Hukum, Kerjasama, dan Hubungan Masyarakat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_jabatan' => 'Kepala Eselon 3',
                'nama_jabatan' => 'Kepala Bagian Perencanaan, Data dan Informasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_jabatan' => 'Kepala Eselon 3',
                'nama_jabatan' => 'Kepala Bagian Sumber Daya Manusia dan Tata Usaha',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_jabatan' => 'Kepala Eselon 3',
                'nama_jabatan' => 'Bagian Keuangan dan Barang Milik Negara',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_jabatan' => 'Kepala Eselon 2',
                'nama_jabatan' => 'Kepala Pusat Kebijakan Keselamatan dan Keamanan Transportasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_jabatan' => 'Kepala Eselon 3',
                'nama_jabatan' => 'Bidang Kebijakan Keselamatan Transportasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_jabatan' => 'Kepala Eselon 3',
                'nama_jabatan' => 'Bidang Kebijakan Keamanan Transportasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_jabatan' => 'Kepala Eselon 2',
                'nama_jabatan' => 'Kepala Pusat Kebijakan Lalu Lintas, Angkutan dan Transportasi Perkotaan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_jabatan' => 'Kepala Eselon 3',
                'nama_jabatan' => 'Kepala Bidang Kebijakan Lalu Lintas dan Angkutan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_jabatan' => 'Kepala Eselon 3',
                'nama_jabatan' => 'Kepala Bidang Kebijakan Transportasi Perkotaan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_jabatan' => 'Kepala Eselon 2',
                'nama_jabatan' => 'Kepala Pusat Kebijakan Sarana Transportasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_jabatan' => 'Kepala Eselon 3',
                'nama_jabatan' => 'Kepala Bidang Kebijakan Sarana Transportasi Jalan dan Perkeretaapian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_jabatan' => 'Kepala Eselon 3',
                'nama_jabatan' => 'Kepala Bidang Kebijakan Sarana Transportasi Pelayaran dan Penerbangan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_jabatan' => 'Kepala Eselon 2',
                'nama_jabatan' => 'Kepala Pusat Kebijakan Prasarana Transportasi dan Integrasi Moda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_jabatan' => 'Kepala Eselon 3',
                'nama_jabatan' => 'Kepala Bidang Kebijakan Prasarana Transportasi Jalan, Perkeretaapian dan Integrasi Moda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_jabatan' => 'Kepala Eselon 3',
                'nama_jabatan' => 'Bidang Kebijakan Prasarana Transportasi Pelayaran dan Penerbangan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_jabatan' => 'Kepala Eselon 1',
                'nama_jabatan' => 'Sekretaris Jenderal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
