<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'name' => 'Admin Tisto',
            'email' => 'admin@tisto.loc',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
        ]);

        $user->role()->create([
            'role' => 'admin'
        ]);
    }
}
