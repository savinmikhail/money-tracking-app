<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


         \App\Models\User::create([
             'name' => 'user',
             'email' => 'user@',
             'password'  => 'user'
         ]);
        \App\Models\User::create([
            'name' => 'qwer',
            'email' => 'qwer@r',
            'password'  => 'qwer'
        ]);
        \App\Models\Banknote::create([
            'serial_number' => '12345',
            'price' => '1000',
        ]);
        \App\Models\Banknote::create([
            'serial_number' => '54321',
            'price' => '2000',
          ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
