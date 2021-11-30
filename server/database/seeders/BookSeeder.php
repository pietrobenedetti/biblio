<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Faker\Provider\Image as Image;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker, Image $image)
    {
        //
        for ($i = 0; $i < 5; $i++) {
            DB::table('books')->insert([
                'title' => $faker -> unique() -> lastName,
                'author' => $faker -> unique() -> name,
                'ISBN' => $faker -> unique() -> isbn13,
                'img' => $image -> unique() -> imageUrl($width = 640, $height = 480, 'book'),
                'genre' => '',
                'stars' => rand(0, 5),
                'created_at' => now(),
            ]);
        }
    }
}
