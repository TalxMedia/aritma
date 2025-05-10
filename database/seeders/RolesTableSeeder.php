<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Yönetici',
                'description' => 'Sistem yöneticisi, tüm yetkilere sahiptir',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'call_center',
                'display_name' => 'Çağrı Merkezi',
                'description' => 'Çağrı merkezi personeli',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'filter_team',
                'display_name' => 'Filtre Ekibi',
                'description' => 'Filtre satış ekibi',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'device_team',
                'display_name' => 'Cihaz Ekibi',
                'description' => 'Cihaz satış ekibi',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'technical_service',
                'display_name' => 'Teknik Servis',
                'description' => 'Teknik servis personeli',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'warehouse',
                'display_name' => 'Depo Ekibi',
                'description' => 'Depo personeli',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'manager',
                'display_name' => 'Yönetim',
                'description' => 'Yönetim ekibi',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}