<?php
// DatabaseSeeder.php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Word;
use App\Models\Slang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

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
            'password' => Hash::make('azerty123'),
        ]);


        $this->call(SlangSeeder::class);
        $this->call(WordSeeder::class);


        $this->command->info("All seeds completed successfully!");
    }
}
