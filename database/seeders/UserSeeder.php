<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'     => 'Ahmad Fachri',
            'username' => 'ahmdfhri',
            'email'    => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role'     => 'admin',
            'phone'    => '081234567890',
            'address'  => 'Kantor Pusat Bookstore',
            'dob'      => '2000-01-01',
            'gender'   => 'Laki-Laki',
        ]);

        User::create([
            'name'     => 'Budi sanjaya',
            'username' => 'budididi',
            'email'    => 'budi@example.com',
            'password' => Hash::make('customer123'),
            'role'     => 'customer',
            'phone'    => '089876543210',
            'address'  => 'Jl. Merdeka No. 10',
            'dob'      => '1995-05-15',
            'gender'   => 'Laki-Laki',
        ]);
    }
}
