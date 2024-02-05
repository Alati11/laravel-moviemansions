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
                "url" => "img/services/wifi.png"
            ],

            [
                "name" => "Piscina",
                "url" => "img/services/piscina.png"
            ],

            [
                "name" => "Ristorante",
                "url" => "img/services/ristorante.png"
            ],

            [
                "name" => "Palestra",
                "url" => "img/services/palestra.png"
            ],

            [
                "name" => "Servizio in camera",
                "url" => "img/services/camera.png"
            ],

            [
                "name" => "Colazione inclusa",
                "url" => "img/services/colazione.png"
            ],

            [
                "name" => "Parcheggio",
                "url" => "img/services/parcheggio.png"
            ],
            [
                "name" => "Centro benessere",
                "url" => "img/services/spa.png"
            ],

            [
                "name" => "Navetta aeroportuale",
                "url" => "img/services/bus.png"
            ],

            [
                "name" => "Animali ammessi",
                "url" => "img/services/animali.png"
            ],

            [
                "name" => "Reception 24 ore",
                "url" => "img/services/reception.png"
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
