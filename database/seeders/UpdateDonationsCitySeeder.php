<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UpdateDonationsCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ar_SA'); // استخدام العربية السعودية للحصول على مدن عربية
        $cities = [
            'دمشق', 'حلب', 'حمص', 'حماة', 'اللاذقية', 'طرطوس',
            'إدلب', 'درعا', 'السويداء', 'الحسكة', 'الرقة', 'دير الزور', 'القنيطرة'
        ];
        $donations = DB::table('donations')
        ->whereNull('city')
        ->orWhere('city', '')
        ->get();       
        foreach ($donations as $donation) {
            // اختيار مدينة عشوائية من القائمة
            $randomCity = $cities[array_rand($cities)];
            
            // تحديث السجل
            DB::table('donations')
                ->where('id', $donation->id)
                ->update(['city' => $randomCity]);
        }
        //
    }
}
