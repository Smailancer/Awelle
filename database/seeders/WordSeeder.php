<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Word;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assuming you have a user with the username 'smaily' as per your DatabaseSeeder
        $user = User::where('username', 'Admin')->first();

        $wordsData = [
            [
                'term' => 'ثِقْشِيشِين',
                'slug' => 'Thiq-sheesh-een',
                'ar_meaning' => 'البنات',
            ],
            [
                'term' => 'أرَّاشْ',
                'slug' => 'Arrāsh',
                'ar_meaning' => 'الذكور',
            ],
            [
                'term' => 'ايـgـُـرْذَانْ',
                'slug' => 'Aigurḍān',
                'ar_meaning' => 'الصغار',
            ],
            [
                'term' => 'ثـَمَطُّوثْ',
                'slug' => 'Thamaṭṭūth',
                'ar_meaning' => 'امرأة',
            ],
            [
                'term' => 'ارgْـَـازْ',
                'slug' => 'Argāz',
                'ar_meaning' => 'رجل',
            ],
            [
                'term' => 'امَدَّاكْلِيوْ',
                'slug' => 'Amaddākliw',
                'ar_meaning' => 'صديقي',
            ],
            [
                'term' => 'ثَمَدَّكُلْتِيوْ',
                'slug' => 'Thamaddākultiw',
                'ar_meaning' => 'صديقتي',
            ],
        ];

        foreach ($wordsData as $wordData) {
            Word::create([
                'user_id' => $user->id,
                'term' => $wordData['term'],
                'slug' => $wordData['slug'],
                'ar_meaning' => $wordData['ar_meaning'],
            ]);
        }

        $this->command->info("All seeds completed successfully!");
    }
}
