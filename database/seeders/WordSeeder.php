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


        $csvFile = database_path('seeders/words.csv');
        $wordsData = array_map('str_getcsv', file($csvFile));

        foreach ($wordsData as $row) {
            list($term, $slug, $ar_meaning, $slangName) = $row;

            // Find or create slang
            $slang = Slang::where('name', $slangName)->first();
            if (!$slang) {
                $this->command->error("Slang not found for name: $slangName");
                continue;
            }

            // Create word
            Word::create([
                'user_id' => $user->id,
                'term' => $term,
                'slug' => $slug,
                'ar_meaning' => $ar_meaning,
            ])->slang()->attach($slang->id);

            $this->command->info("Seeding completed for term: $term");

        }
    }

}
