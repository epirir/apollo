<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::firstOrCreate(
            ['name' => 'Admin', ],
            [
                'email' => 'admin@apolo.com',
                'password' => \Illuminate\Support\Facades\Hash::make('secret'),
                'remember_token' => \Illuminate\Support\Str::random(100)
            ]
        );
    }
}
