<?php

namespace Database\Seeders;

use App\Models\Slang;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SlangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slangsData = [
            // [
            //     'name' => 'Darja',
            //     'ar_name' => 'الدارجة',
            //     'description' => 'Description for Darja slang.',
            // ],
            [
                'name' => 'Kabyle',
                'ar_name' => 'القبائلية',
                'description' => 'Description for Kabyle slang.',
            ],
            [
                'name' => 'Mozabit',
                'ar_name' => 'المزابية',
                'description' => 'Description for Mozabit slang.',
            ],
            [
                'name' => 'Chaoui',
                'ar_name' => 'الشاوية',
                'description' => 'Description for Chawi slang.',
            ],
            [
                'name' => 'Chenoui',
                'ar_name' => 'الشنوية',
                'description' => 'Description for Chenwi slang.',
            ],
            [
                'name' => 'Chleuh',
                'ar_name' => 'الشلحية',
                'description' => 'Description for Chenwi slang.',
            ],
            [
                'name' => 'Targui',
                'ar_name' => 'الطارقية',
                'description' => 'Description for Targui slang.',
            ],
        ];

        foreach ($slangsData as $slangData) {
            $slang = Slang::create($slangData);
            $this->command->info("Seeding completed for slang: {$slang->name}");

        }

    }
}
