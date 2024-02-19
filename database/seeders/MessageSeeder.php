<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                "building_id" => 5,
                "guest_email" => "meryl@gmail.com",
                "name" => "Meryl",
                "surname" => "Streep",
                "text" => "Salve, sono interessata a conoscere i dettagli sugli appartamenti alla proprietà. Potrebbe condividere informazioni sulle condizioni di locazione, i servizi e le attuali promozioni disponibili?",
            ],
            [
                "building_id" => 14,
                "guest_email" => "brad@gmail.com",
                "name" => "Brad",
                "surname" => "Pitt",
                "text" => "Buongiorno, sono interessato a ricevere informazioni sugli appartamenti in questa proprietà. Potrebbe gentilmente fornire dettagli sulle condizioni di locazione, i servizi e le attuali promozioni?",
            ],
            [
                "building_id" => 8,
                "guest_email" => "julia@gmail.com",
                "name" => "Julia",
                "surname" => "Roberts",
                "text" => "Ciao! Sto esplorando le opzioni per gli appartamenti in questa proprietà. Potrebbe darmi maggiori dettagli sui piani, prezzi e eventuali caratteristiche speciali disponibili?",
            ],
            [
                "building_id" => 8,
                "guest_email" => "leonardo@gmail.com",
                "name" => "Leonardo",
                "surname" => "DiCaprio",
                "text" => "Salve, sto valutando di affittare la proprietà. Potrebbe darmi informazioni sulla metratura, le politiche sugli animali domestici e le strutture della comunità?",
            ],
            [
                "building_id" => 14,
                "guest_email" => "cate@gmail.com",
                "name" => "Cate",
                "surname" => "Blanchett",
                "text" => "Buongiorno! Sono interessata ad affittare la proprietà. Com'è il quartiere e ci sono parchi o aree ricreative nelle vicinanze?",
            ],
            [
                "building_id" => 14,
                "guest_email" => "george@example.com",
                "name" => "George",
                "surname" => "Clooney",
                "text" => "Ciao, sto dando un'occhiata alla proprietà. Potrebbe fornire dettagli sulle opzioni di parcheggio, le caratteristiche di sicurezza e gli eventi comunitari imminenti?",
            ],
            [
                "building_id" => 14,
                "guest_email" => "charlize@gmail.com",
                "name" => "Charlize",
                "surname" => "Theron",
                "text" => "Ehi là! Sto esplorando la proprietà. Com'è il processo di locazione e ci sono offerte speciali per il trasloco?",
            ],
            [
                "building_id" => 7,
                "guest_email" => "tom@gmail.com",
                "name" => "Tom",
                "surname" => "Hanks",
                "text" => "Ciao, sto cercando informazioni sulla proprietà. Come funziona il rinnovo del contratto di locazione e ci sono ristrutturazioni pianificate nel prossimo futuro?",
            ],
            [
                "building_id" => 2,
                "guest_email" => "natalie@gmail.com",
                "name" => "Natalie",
                "surname" => "Portman",
                "text" => "Buongiorno! Sono interessata alla proprietà. Potrebbe condividere recensioni degli inquilini, informazioni sulle attività della comunità e cosa rende unica la vita lì?",
            ],
            [
                "building_id" => 3,
                "guest_email" => "matthew@gmail.com",
                "name" => "Matthew",
                "surname" => "McConaughey",
                "text" => "Salve, sono interessato a conoscere i dettagli sugli appartamenti alla proprietà. Potrebbe condividere informazioni sulle condizioni di locazione, i servizi e le attuali promozioni disponibili?",
            ],
            [
                "building_id" => 2,
                "guest_email" => "emma@gmail.com",
                "name" => "Emma",
                "surname" => "Watson",
                "text" => "Ehilà! Sto esplorando le opzioni per gli appartamenti alla proprietà. Potrebbe fornire dettagli sui piani, prezzi e eventuali caratteristiche speciali disponibili?",
            ],
        ];

        foreach ($messages as $message) {

            $new_message = new Message();

            $new_message->building_id = $message['building_id'];
            $new_message->guest_email = $message['guest_email'];
            $new_message->name = $message['name'];
            $new_message->surname = $message['surname'];
            $new_message->text = $message['text'];

            $new_message->save();
        }
    }
}
