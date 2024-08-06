<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Hajar lamharzi',
                'email' => 'Hajarlamharzi@gmail.com',
                'password' => Hash::make('password'),
                'photo' => 'discord.png',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'name' => 'Chef Chef',
                'email' => 'chedchef@gmail.com',
                'password' => Hash::make('password'),
                'photo' => 'instagram.png',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'name' => 'Mmouid',
                'email' => 'Mmouid@gmail.com',
                'password' => Hash::make('password'),
                'photo' => 'discord.png',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'name' => 'Kat Megumi',
                'email' => 'katoumegumi@gmail.com',
                'password' => Hash::make('password'),
                'photo' => 'github.png',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ]
        ]);
    }
}
