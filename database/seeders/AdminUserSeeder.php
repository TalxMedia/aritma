<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // 1) “admin” rolünü sorgula
        $roleEntry = DB::table('roles')->where('name', 'admin')->first();

        // 2) Yoksa oluştur, varsa mevcut ID’yi al
        if ($roleEntry) {
            $adminRoleId = $roleEntry->id;
        } else {
            $adminRoleId = DB::table('roles')->insertGetId([
                'name'          => 'admin',
                'display_name'  => 'Administrator',  // display_name eklendi
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }

        // 3) Admin kullanıcısını ekle veya güncelle
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@admin.com'],
            [
                'name'              => 'Admin',
                'password'          => Hash::make('admin123'),
                'role_id'           => $adminRoleId,
                'email_verified_at' => now(),
                'created_at'        => now(),
                'updated_at'        => now(),
            ]
        );
    }
}
