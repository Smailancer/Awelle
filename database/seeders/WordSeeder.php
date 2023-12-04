<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Word;
use App\Models\Slang;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assuming you have a user with the username 'Admin' as per your DatabaseSeeder
        $user = User::where('username', 'Admin')->first();

        $wordsData = [
            'Kabyle' => [
                [
                    'term' => 'ثقشيشين',
                    'slug' => 'Thiq-sheesh-een',
                    'ar_meaning' => 'البنات',
                ],
                [
                    'term' => 'أراش',
                    'slug' => 'Arrāsh',
                    'ar_meaning' => 'الذكور',
                ],
                [
                    'term' => 'ايغورذان',
                    'slug' => 'Aigurḍān',
                    'ar_meaning' => 'الصغار',
                ],
                [
                    'term' => 'ثمطوث',
                    'slug' => 'Thamaṭṭūth',
                    'ar_meaning' => 'امرأة',
                ],
                [
                    'term' => 'ارغاز',
                    'slug' => 'Argāz',
                    'ar_meaning' => 'رجل',
                ],
                [
                    'term' => 'أمداكليو',
                    'slug' => 'Amaddākliw',
                    'ar_meaning' => 'صديقي',
                ],
                [
                    'term' => 'ثمدكلتيو',
                    'slug' => 'Thamaddākultiw',
                    'ar_meaning' => 'صديقتي',
                ],
            ],
            'Mozabit' => [
                [
                    'term' => 'تيزيوين',
                    'slug' => 'Tiziouine',
                    'ar_meaning' => 'البنات',
                ],
                [
                    'term' => 'إضفلاين',
                    'slug' => 'Ideflaine',
                    'ar_meaning' => 'الذكور',
                ],
                [
                    'term' => 'إبزانن',
                    'slug' => 'Ibezanen',
                    'ar_meaning' => 'الصغار',
                ],
                [
                    'term' => 'تمطوت',
                    'slug' => 'Tamaṭṭūt',
                    'ar_meaning' => 'امرأة',
                ],
                [
                    'term' => 'ارجاز',
                    'slug' => 'Arjāz',
                    'ar_meaning' => 'رجل',
                ],
                [
                    'term' => 'أمدوتشليك',
                    'slug' => 'Amaddotchlik',
                    'ar_meaning' => 'صديقي',
                ],
                [
                    'term' => 'تمدوتشلتيك',
                    'slug' => 'Tamaddotchlik',
                    'ar_meaning' => 'صديقتي',
                ],
            ],
            // Add other slangs as needed
        ];

        foreach ($wordsData as $slangName => $slangWords) {
            $slang = Slang::where('name', $slangName)->first();

            if ($slang) {
                foreach ($slangWords as $wordData) {
                    Word::create([
                        'user_id' => $user->id,
                        'term' => $wordData['term'],
                        'slug' => $wordData['slug'],
                        'ar_meaning' => $wordData['ar_meaning'],
                    ])->slang()->attach($slang->id);


                }
                $this->command->info("Words seeding completed for the: {$slang->name} slang");
            } else {
                $this->command->error("Slang not found for name: $slangName");
            }
        }
    }

}
