<?php
// DatabaseSeeder.php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Word;
use App\Models\Slang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        parent::call(WilayaSeeder::class);

        $user = User::factory()->create([
            'username' => 'Admin',
            'role' => 'admin',
            'email' => 'smail@admin.com',
            'password' => Hash::make('azerty123'), // Set the password to 'azerty123'
        ]);

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

            if ($slang->name === 'Kabyle') {
                // Use WordSeeder instead of Word factory for Kabyle slang
                $this->call(WordSeeder::class);

                // Get the words created by WordSeeder and attach them to the Kabyle slang
                $words = Word::where('user_id', $user->id)->get();
                $slang->words()->attach($words);
            } else {
                // Attach words to the slang using the attach method
                $words = Word::factory(10)->create([
                    'user_id' => $user->id,
                ]);

                // Assuming the pivot table is named 'slang_word'
                foreach ($words as $word) {
                    $word->slang()->attach($slang);
                }
            }

            $this->command->info("Seeding completed for slang: {$slang->name}");
        }

        $this->command->info("All seeds completed successfully!");
    }
}
