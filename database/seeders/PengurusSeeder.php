<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PengurusSeeder extends Seeder
{
    public function run(): void
    {
        $pengurus = [
            [
                'name'     => 'Ketua RT',
                'email'    => 'ketua@baleendah.com',
                'password' => Hash::make('password123'),
                'role'     => 'ketua',
            ],
            [
                'name'     => 'Wakil RT',
                'email'    => 'wakil@baleendah.com',
                'password' => Hash::make('password123'),
                'role'     => 'wakil',
            ],
            [
                'name'     => 'Bendahara RT',
                'email'    => 'bendahara@baleendah.com',
                'password' => Hash::make('password123'),
                'role'     => 'bendahara',
            ],
            [
                'name'     => 'Sekretaris RT',
                'email'    => 'sekretaris@baleendah.com',
                'password' => Hash::make('password123'),
                'role'     => 'sekretaris',
            ],
        ];

        foreach ($pengurus as $data) {
            User::create($data);
        }
    }
}