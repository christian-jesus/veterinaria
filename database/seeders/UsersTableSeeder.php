<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'christian jesus',
            'email' => 'cuarite@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            
            'cedula' => '0300054243',
            'address' => 'Av. Lima 775-673',
            'phone' => '654432769',
            'role' => 'admin',
        ]);

        
        User::create([
            'name' => 'daniel',
            'email' => 'daniel@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('tecsup2023'), // password
            'role' => 'paciente',
        ]);  
        

        
        User::create([
            'name' => 'victor raul',
            'email' => 'raul@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'role' => 'doctor',
        ]);

        User::factory()
            ->count(50)

            ->create();
    }
}
