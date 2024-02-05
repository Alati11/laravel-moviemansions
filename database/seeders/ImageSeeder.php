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
        $images = [
            [
                'building_id' => '1',
                'url' => '/img/buildings/privet_drive.jpg'
            ],

            [
                'building_id' => '1',
                'url' => '/img/buildings/privet_drive_1.jpg'
            ],

            [
                'building_id' => '2',
                'url' => '/img/buildings/tony_stark_cottage.jpg'
            ],

            [
                'building_id' => '2',
                'url' => '/img/buildings/tony_stark_cottage_1.png'
            ],

            [
                'building_id' => '3',
                'url' => '/img/buildings/home_alone.jpg'
            ],

            [
                'building_id' => '3',
                'url' => '/img/buildings/home_alone_1.jpg'
            ],

            [
                'building_id' => '4',
                'url' => '/img/buildings/doubtfire_house.png'
            ],

            [
                'building_id' => '4',
                'url' => '/img/buildings/doubtfire_house_1.jpg'
            ],

            [
                'building_id' => '5',
                'url' => '/img/buildings/padme_palace.jpg'
            ],

            [
                'building_id' => '5',
                'url' => '/img/buildings/padme_palace_1.png'
            ],

            [
                'building_id' => '5',
                'url' => '/img/buildings/padme_palace_2.jpg'
            ],

            [
                'building_id' => '6',
                'url' => '/img/buildings/hogwarts.jpg'
            ],

            [
                'building_id' => '6',
                'url' => '/img/buildings/hogwarts_1.jpg'
            ],

            [
                'building_id' => '7',
                'url' => '/img/buildings/breaking_bad.jpg'
            ],

            [
                'building_id' => '7',
                'url' => '/img/buildings/breaking_bad_1.jpg'
            ],

            [
                'building_id' => '8',
                'url' => '/img/buildings/casa-cohen.jpg'
            ],

            [
                'building_id' => '8',
                'url' => '/img/buildings/casa-cohen-2.jpg'
            ],

            [
                'building_id' => '9',
                'url' => '/img/buildings/creel_house.jpg'
            ],

            [
                'building_id' => '9',
                'url' => '/img/buildings/creel_house_1.jpg'
            ],

            [
                'building_id' => '10',
                'url' => '/img/buildings/Jimmies-House-Pulp-Fiction.jpg'
            ],

            [
                'building_id' => '10',
                'url' => '/img/buildings/Jimmies-House-Pulp-Fiction-2.jpg'
            ],

            [
                'building_id' => '11',
                'url' => '/img/buildings/oheka_castle.jpg'
            ],

            [
                'building_id' => '11',
                'url' => '/img/buildings/oheka_castle_1.jpg'
            ],

            [
                'building_id' => '12',
                'url' => '/img/buildings/casa-montalbano.jpg'
            ],

            [
                'building_id' => '12',
                'url' => '/img/buildings/casa-montalbano-2.jpg'
            ],

            [
                'building_id' => '13',
                'url' => '/img/buildings/jack_gambardella.jpg'
            ],

            [
                'building_id' => '13',
                'url' => '/img/buildings/jack_gambardella-1.jpg'
            ],

            [
                'building_id' => '14',
                'url' => '/img/buildings/hatfield_house.gif'
            ],

            [
                'building_id' => '14',
                'url' => '/img/buildings/Hatfield_house_1.jpg'
            ],

            [
                'building_id' => '14',
                'url' => '/img/buildings/hatfield_house_2.jpg'
            ],

            [
                'building_id' => '15',
                'url' => '/img/buildings/Cullen-House.jpg'
            ],

            [
                'building_id' => '15',
                'url' => '/img/buildings/Cullen-House-2.jpg'
            ],

            [
                'building_id' => '16',
                'url' => '/img/buildings/batman.jpg'
            ],

            [
                'building_id' => '16',
                'url' => '/img/buildings/batman_1.jpg'
            ],

            [
                'building_id' => '17',
                'url' => '/img/buildings/scarface.png'
            ],

            [
                'building_id' => '17',
                'url' => '/img/buildings/scarface_2.jpg'
            ],

            [
                'building_id' => '18',
                'url' => '/img/buildings/wolf-wall-street-house.jpg'
            ],

            [
                'building_id' => '18',
                'url' => '/img/buildings/wolf-wall-street-house-2.jpg'
            ],

            [
                'building_id' => '19',
                'url' => '/img/buildings/il-padrino-house.jpg'
            ],

            [
                'building_id' => '19',
                'url' => '/img/buildings/il-padrino-house-2.jpg'
            ],

            [
                'building_id' => '20',
                'url' => '/img/buildings/ghostbusters.jpg'
            ],

            [
                'building_id' => '20',
                'url' => '/img/buildings/ghostbusters_1.jpg'
            ],

            [
                'building_id' => '21',
                'url' => '/img/buildings/mcfly_house.jpg'
            ],

            [
                'building_id' => '21',
                'url' => '/img/buildings/mcfly_house_1.jpg'
            ],

            [
                'building_id' => '22',
                'url' => '/img/buildings/shining.jpg'
            ],

            [
                'building_id' => '22',
                'url' => '/img/buildings/shining_2.jpg'
            ],

            [
                'building_id' => '23',
                'url' => '/img/buildings/house-of-gucci.jpg'
            ],

            [
                'building_id' => '23',
                'url' => '/img/buildings/house-of-gucci-2.jpg'
            ],

            [
                'building_id' => '24',
                'url' => '/img/buildings/willy_belair.jpg'
            ],

            [
                'building_id' => '24',
                'url' => '/img/buildings/willy_belair_1.jpg'
            ],

            [
                'building_id' => '25',
                'url' => '/img/buildings/godrics_hollow.jpg'
            ],

            [
                'building_id' => '25',
                'url' => '/img/buildings/godrics_hollow_1.jpg'
            ],
        ];

        foreach ($images as $image) {

            $new_image = new Image();

            $new_image->building_id = $image['building_id'];
            $new_image->url = $image['url'];

            $new_image->save();
        }
    }
}
