<?php

namespace Database\Seeders;

use App\Models\Meaning;
use App\Models\Word;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meaning::factory()->count(50)->create();
        Word::factory()->count(182)->create(); //Faker only has 182 unique words :(
    }
}
