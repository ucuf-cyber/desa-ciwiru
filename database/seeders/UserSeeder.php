<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Super Admin', 'email' => 'superadmin@desa-ciwiru.id', 'role' => 'super_admin'],
            ['name' => 'Admin Desa Ciwiru', 'email' => 'admin@desa-ciwiru.id', 'role' => 'admin'],
            ['name' => 'Operator Desa', 'email' => 'operator@desa-ciwiru.id', 'role' => 'operator'],
            ['name' => 'Diani Rahman, SE', 'email' => 'kepaladesa@desa-ciwiru.id', 'role' => 'kepala_desa'],
            ['name' => 'Warga Ciwiru', 'email' => 'warga@desa-ciwiru.id', 'role' => 'masyarakat'],
        ];

        foreach ($users as $u) {
            User::updateOrCreate(
                ['email' => $u['email']],
                [
                    'name' => $u['name'],
                    'password' => Hash::make('password'),
                    'role' => $u['role'],
                    'phone' => '0822' . random_int(10000000, 99999999),
                    'is_active' => true,
                    'email_verified_at' => now(),
                ]
            );
        }
    }
}
