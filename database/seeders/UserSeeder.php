<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
      public function run(): void
    {
        // Membuat admin jika belum ada
        if (!User::where('email', 'admin@role.test')->exists()) {
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@role.test',
                'password' => bcrypt('12345')
            ]);
            $admin->assignRole('admin');
        }

        // Membuat monitoring jika belum ada
        if (!User::where('email', 'monitor@role.test')->exists()) {
            $monitoring = User::create([
                'name' => 'Monitoring',
                'email' => 'monitor@role.test',
                'password' => bcrypt('12345')
            ]);
            $monitoring->assignRole('monitoring');
        }
    }
}
