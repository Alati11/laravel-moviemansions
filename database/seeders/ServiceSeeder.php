<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                "name" => "Wi-Fi",
                "url" => "https://static-00.iconduck.com/assets.00/perspective-dice-six-faces-random-icon-2048x2048-9uct7e7b.png"
            ],

            [
                "name" => "Piscina",
                "url" => "https://static-00.iconduck.com/assets.00/perspective-dice-six-faces-random-icon-2048x2048-9uct7e7b.png"
            ],

            [
                "name" => "Ristorante",
                "url" => "https://static-00.iconduck.com/assets.00/perspective-dice-six-faces-random-icon-2048x2048-9uct7e7b.png"
            ],

            [
                "name" => "Palestra",
                "url" => "https://static-00.iconduck.com/assets.00/perspective-dice-six-faces-random-icon-2048x2048-9uct7e7b.png"
            ],

            [
                "name" => "Servizio in camera",
                "url" => "https://static-00.iconduck.com/assets.00/perspective-dice-six-faces-random-icon-2048x2048-9uct7e7b.png"
            ],

            [
                "name" => "Colazione inclusa",
                "url" => "https://static-00.iconduck.com/assets.00/perspective-dice-six-faces-random-icon-2048x2048-9uct7e7b.png"
            ],

            [
                "name" => "Parcheggio",
                "url" => "https://static-00.iconduck.com/assets.00/perspective-dice-six-faces-random-icon-2048x2048-9uct7e7b.png"
            ],
            [
                "name" => "Centro benessere",
                "url" => "https://static-00.iconduck.com/assets.00/perspective-dice-six-faces-random-icon-2048x2048-9uct7e7b.png"
            ],

            [
                "name" => "Navetta aeroportuale",
                "url" => "https://static-00.iconduck.com/assets.00/perspective-dice-six-faces-random-icon-2048x2048-9uct7e7b.png"
            ],

            [
                "name" => "Animali ammessi",
                "url" => "https://static-00.iconduck.com/assets.00/perspective-dice-six-faces-random-icon-2048x2048-9uct7e7b.png"
            ],

            [
                "name" => "Reception 24 ore",
                "url" => "https://static-00.iconduck.com/assets.00/perspective-dice-six-faces-random-icon-2048x2048-9uct7e7b.png"
            ]
        ];

        foreach ($services as $service) {
            $new_service = new Service();

            $new_service->name = $service['name'];
            $new_service->icon = $service['url'];
            $new_service->slug = Str::slug($service['name']);

            $new_service->save();
        }
    }
}
