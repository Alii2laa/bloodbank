<?php

namespace Database\Seeders;

use App\Models\Governorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovernoratesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $governorates = [
            'القاهرة',
            'الجيزة',
            'الأسكندرية',
            'الدقهلية',
            'البحر الأحمر',
            'البحيرة',
            'الفيوم',
            'الغربية',
            'الإسماعلية',
            'المنوفية',
            'المنيا',
            'القليوبية',
            'الوادي الجديد',
            'السويس',
            'اسوان',
            'اسيوط',
            'بني سويف',
            'بورسعيد',
            'دمياط',
            'الشرقية',
            'جنوب سيناء',
            'كفر الشيخ',
            'مطروح',
            'الأقصر',
            'قنا',
            'شمال سيناء',
            'سوهاج'
        ];
        foreach ($governorates as $governorate){
            Governorate::create([
                'name' => $governorate
            ]);

        }
    }
}
