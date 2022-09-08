<?php

namespace Database\Seeders;

use App\Models\BloodType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bloodTypes = [
            'A+',
            'A-',
            'O+',
            'O-',
            'B+',
            'B-',
            'AB+',
            'AB-',

        ];
        foreach ($bloodTypes as $bloodtype){
            BloodType::create([
                'name' => $bloodtype
            ]);

        }
    }
}
