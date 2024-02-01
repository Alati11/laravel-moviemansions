<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for ($i = 0; $i < 50; $i++) {
            $new_image = new Image();

            $new_image->building_id = $faker->numberBetween(1, 25);
            $new_image->url = 'https://picsum.photos/200/300';

            $new_image->save();
        }
    }
}
