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
                'meaning' => 'البنات',
            ],
            [
                'term' => 'أرَّاشْ',
                'slug' => 'Arrāsh',
                'meaning' => 'الذكور',
            ],
            [
                'term' => 'ايـgـُـرْذَانْ',
                'slug' => 'Aigurḍān',
                'meaning' => 'الصغار',
            ],
            [
                'term' => 'ثـَمَطُّوثْ',
                'slug' => 'Thamaṭṭūth',
                'meaning' => 'امرأة',
            ],
            [
                'term' => 'ارgْـَـازْ',
                'slug' => 'Argāz',
                'meaning' => 'رجل',
            ],
            [
                'term' => 'امَدَّاكْلِيوْ',
                'slug' => 'Amaddākliw',
                'meaning' => 'صديقي',
            ],
            [
                'term' => 'ثَمَدَّكُلْتِيوْ',
                'slug' => 'Thamaddākultiw',
                'meaning' => 'صديقتي',
            ],
        ];

        foreach ($wordsData as $wordData) {
            Word::create([
                'user_id' => $user->id,
                'term' => $wordData['term'],
                'slug' => $wordData['slug'],
                'meaning' => $wordData['meaning'],
            ]);
        }

        $this->command->info("All seeds completed successfully!");
    }
}
