<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Word;

class DatabaseSeeder extends Seeder
{
      /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'username' => 'John Doe'
        ]);

        Word::factory(10)->create([
            'user_id' => $user->id
        ]);
    }
}
