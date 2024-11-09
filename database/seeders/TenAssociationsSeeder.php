<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenAssociationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $charities = [
            [
                'name' => 'جمعية العون',
                'description' => 'جمعية العون تقدم الدعم الإنساني والمساعدات الطبية للمحتاجين في مختلف المناطق.',
                'image' => 'association4.jpg',
                'type' => 'مساعدات إنسانية، دعم طبي',
                'location' => 'سوريا، حلب'
            ],
            [
                'name' => 'جمعية العطاء',
                'description' => 'جمعية العطاء تهتم بتقديم الدعم التعليمي والمساعدات العاجلة للأسر المتضررة.',
                'image' => 'association5.jpg',
                'type' => 'تعليم، مساعدات عاجلة',
                'location' => 'سوريا، حمص'
            ],
            [
                'name' => 'جمعية الأمل',
                'description' => 'جمعية الأمل تسعى لرفع مستوى المعيشة من خلال برامجها المتكاملة في العمل الإنساني.',
                'image' => 'association6.jpg',
                'type' => 'تحسين المعيشة، برامج إنسانية',
                'location' => 'سوريا، دمشق'
            ],
            [
                'name' => 'جمعية السلام',
                'description' => 'جمعية السلام تعمل على تعزيز السلام والتعايش الاجتماعي في المجتمعات المتضررة.',
                'image' => 'association7.jpg',
                'type' => 'سلام، تعايش اجتماعي',
                'location' => 'سوريا، حلب'
            ],
            [
                'name' => 'جمعية القادة',
                'description' => 'جمعية القادة تدعم الشباب وتوفر لهم الفرص للتعليم والتنمية الشخصية.',
                'image' => 'association8.jpg',
                'type' => 'تطوير الشباب، تعليم',
                'location' => 'سوريا، حماة'
            ],
            [
                'name' => 'جمعية الحياة',
                'description' => 'جمعية الحياة تقدم الدعم النفسي والاجتماعي للأفراد المتضررين من الأزمات.',
                'image' => 'association9.jpg',
                'type' => 'دعم نفسي، دعم اجتماعي',
                'location' => 'سوريا، دمشق'
            ],
            [
                'name' => 'جمعية الأمان',
                'description' => 'جمعية الأمان تسعى لتأمين الحماية والأمان للأطفال والأسر النازحة.',
                'image' => 'association10.jpg',
                'type' => 'حماية الأطفال، دعم النازحين',
                'location' => 'سوريا، حمص'
            ],
            [
                'name' => 'جمعية العمل',
                'description' => 'جمعية العمل تعمل على تقديم فرص العمل والتنمية الاقتصادية في المجتمعات المحرومة.',
                'image' => 'association11.jpg',
                'type' => 'تنمية اقتصادية، فرص عمل',
                'location' => 'سوريا، حلب'
            ],
            [
                'name' => 'جمعية الأرض',
                'description' => 'جمعية الأرض تهتم بالمحافظة على البيئة وتنمية الموارد الطبيعية في المناطق المتضررة.',
                'image' => 'association12.jpg',
                'type' => 'حفظ البيئة، تنمية موارد طبيعية',
                'location' => 'سوريا، حمص'
            ],
            [
                'name' => 'جمعية النهضة',
                'description' => 'جمعية النهضة تعمل على إعادة الإعمار والتنمية الاقتصادية في المناطق الحربية.',
                'image' => 'association13.jpg',
                'type' => 'إعادة الإعمار، تنمية اقتصادية',
                'location' => 'سوريا، حماة'
            ],
        ];

        DB::table('charities')->insert($charities);
    }
}

