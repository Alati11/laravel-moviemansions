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
                "icon" => "/img/services/wi-fi.png"
            ],

            [
                "name" => "Piscina",
                "icon" => "/img/services/piscina.png"
            ],

            [
                "name" => "Ristorante",
                "icon" => "/img/services/ristorante.png"
            ],

            [
                "name" => "Palestra",
                "icon" => "/img/services/palestra.png"
            ],

            [
                "name" => "Servizio in camera",
                "icon" => "/img/services/servizio.png"
            ],

            [
                "name" => "Colazione inclusa",
                "icon" => "/img/services/colazione.png"
            ],

            [
                "name" => "Parcheggio",
                "icon" => "/img/services/parcheggio.png"
            ],
            [
                "name" => "Centro benessere",
                "icon" => "/img/services/spa.png"
            ],

            [
                "name" => "Navetta aeroportuale",
                "icon" => "/img/services/navetta.png"
            ],

            [
                "name" => "Animali ammessi",
                "icon" => "/img/services/animali.png"
            ],

            [
                "name" => "Reception 24 ore",
                "icon" => "/img/services/reception.png"
            ]
        ];

        foreach ($services as $service) {
            $new_service = new Service();

            $new_service->name = $service['name'];
            $new_service->icon = $service['icon'];
            $new_service->slug = Str::slug($service['name']);

            $new_service->save();
        }
    }
}
