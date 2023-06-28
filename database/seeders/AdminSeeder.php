<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name'  => 'admin',
                'email' => 'maul@admin.com',
                'role'  => 'admin',
                'email_verified_at' => Carbon::now()->toDateTimeString(),
                'password'   => Hash::make('admin123'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ]);

        User::insert([
            [
                'name'  => 'client',
                'email' => 'maul@client.com',
                'role'  => 'client',
                'email_verified_at' => Carbon::now()->toDateTimeString(),
                'password'   => Hash::make('client123'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ]);
    }
}
