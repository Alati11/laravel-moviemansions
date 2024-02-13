<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsorships = [
            [
                "name" => "Silver",
                "price" => 2.99,
                "duration" => 24,
                "thumb" => "resources/img/icons/silver-sponsor.png"
            ],
            [
                "name" => "Gold",
                "price" => 5.99,
                "duration" => 72,
                "thumb" => "resources/img/icons/Gold-Sponsor.png"
            ],
            [
                "name" => "Platinum",
                "price" => 9.99,
                "duration" => 144,
                "thumb" => "resources/img/icons/platinum-sponsor.png"
            ]
        ];

        foreach ($sponsorships as $sponsorship) {
            $new_sponsorship = new Sponsorship();

            $new_sponsorship->name = $sponsorship['name'];
            $new_sponsorship->price = $sponsorship['price'];
            $new_sponsorship->duration = $sponsorship['duration'];
            $new_sponsorship->thumb = $sponsorship['thumb'];

            $new_sponsorship->save();
        }
    }
}
