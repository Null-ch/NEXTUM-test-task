<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        Card::factory()->count(10)->create([
            'user_id' => rand(1,100),
            'title' => $faker->word,
            'text' => $faker->paragraph,
        ]);
    }

}
