<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Seeder;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialties = [
            'Anestesiologia',
            'Oftalmologia',
            'Fisioterapia',
            'Dermatologia',
            'Traumatologia',
            'Neurologia',
            'Oncologia'
        ];
        foreach($specialties as $specialty){
            Specialty::create([
                'name' => $specialty
            ]);
        }
    }
}
