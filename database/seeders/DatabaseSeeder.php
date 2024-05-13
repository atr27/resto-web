<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->fill([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at'=> now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);
        $admin->save();

        $this->call([
            DaftarMakananMinumanSeed::class
        ]);

        $this->call([
            RestoranSeeder::class
        ]);
    }
}
