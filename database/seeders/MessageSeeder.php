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
                "building_id" => 2,
                "guest_email" => "vivalanutella@gmail.com",
                "name" => "Elena",
                "surname" => "Tulipano",
                "text" => "Hello, I'm interested in details about apartments in Building 2. Can you share information on lease terms, amenities, and any current promotions available?",
            ],
            [
                "building_id" => 1,
                "guest_email" => "elena.tulipano@example.com",
                "name" => "John",
                "surname" => "Smith",
                "text" => "Hello, I'm interested in details about apartments in Building 1. Can you share information on lease terms, amenities, and any current promotions available?"
            ],
            [
                "building_id" => 2,
                "guest_email" => "john.smith@example.com",
                "name" => "Alice",
                "surname" => "Johnson",
                "text" => "Hi there! Exploring options for apartments in Building 2. Could you provide details on floor plans, pricing, and any special features available?"
            ],
            [
                "building_id" => 3,
                "guest_email" => "alice.johnson@example.com",
                "name" => "Bob",
                "surname" => "Williams", "text" => "Hey, I'm looking into Building 3. Can you give me insights on square footage, pet policies, and community facilities?"
            ],
            [
                "building_id" => 4,
                "guest_email" => "bob.williams@example.com",
                "name" => "Emma",
                "surname" => "Davis",
                "text" => "Hello! Interested in apartments in Building 4. What's the neighborhood like, and are there any nearby parks or recreational areas?"
            ],
            [
                "building_id" => 5,
                "guest_email" => "emma.davis@example.com",
                "name" => "Ryan",
                "surname" => "Miller",
                "text" => "Hi, checking out Building 5. Can you provide details on parking options, security features, and any upcoming community events?"
            ],
            [
                "building_id" => 6,
                "guest_email" => "ryan.miller@example.com",
                "name" => "Olivia",
                "surname" => "Anderson",
                "text" => "Hey there! Exploring Building 6. What's the leasing process like, and are there any move-in specials available?"
            ],
            [
                "building_id" => 7,
                "guest_email" => "olivia.anderson@example.com",
                "name" => "Daniel",
                "surname" => "Brown", "text" => "Hi, looking for info on Building 7. How does lease renewal work, and are there any planned renovations in the near future?"
            ],
            [
                "building_id" => 8,
                "guest_email" => "daniel.brown@example.com",
                "name" => "Sophia",
                "surname" => "Johnson", "text" => "Hello! Interested in Building 8. Can you share resident reviews, information on community activities, and what makes living there unique?"
            ],
            [
                "building_id" => 1,
                "guest_email" => "sophia.johnson@example.com",
                "name" => "Matthew",
                "surname" => "Lee",
                "text" => "Hello, I'm interested in details about apartments in Building 1. Can you share information on lease terms, amenities, and any current promotions available?"
            ],
            [
                "building_id" => 2,
                "guest_email" => "matthew.lee@example.com",
                "name" => "Grace",
                "surname" => "Taylor",
                "text" => "Hi there! Exploring options for apartments in Building 2. Could you provide details on floor plans, pricing, and any special features available?"
            ],
            [
                "building_id" => 3,
                "guest_email" => "grace.taylor@example.com",
                "name" => "Ethan",
                "surname" => "Clark",
                "text" => "Hey, I'm looking into Building 3. Can you give me insights on square footage, pet policies, and community facilities?"
            ],
            [
                "building_id" => 4,
                "guest_email" => "ethan.clark@example.com",
                "name" => "Ava",
                "surname" => "Wilson",
                "text" => "Hello! Interested in apartments in Building 4. What's the neighborhood like, and are there any nearby parks or recreational areas?"
            ],
            [
                "building_id" => 5,
                "guest_email" => "ava.wilson@example.com",
                "name" => "Liam",
                "surname" => "Harris",
                "text" => "Hi, checking out Building 5. Can you provide details on parking options, security features, and any upcoming community events?"
            ],
            [
                "building_id" => 6,
                "guest_email" => "liam.harris@example.com",
                "name" => "Isabella",
                "surname" => "King",
                "text" => "Hey there! Exploring Building 6. What's the leasing process like, and are there any move-in specials available?"
            ],
            [
                "building_id" => 7,
                "guest_email" => "isabella.king@example.com",
                "name" => "Mason",
                "surname" => "Martin",
                "text" => "Hi, looking for info on Building 7. How does lease renewal work, and are there any planned renovations in the near future?"
            ],
            [
                "building_id" => 1,
                "guest_email" => "john.doe@example.com",
                "name" => "John",
                "surname" => "Doe",
                "text" => "Hello, I'm exploring options for apartments in Building 1. Can you provide details on lease terms, amenities, and current promotions?"
            ],
            [
                "building_id" => 2,
                "guest_email" => "jane.smith@example.com",
                "name" => "Jane",
                "surname" => "Smith",
                "text" => "Hi there! Interested in Building 2. Could you share information on floor plans, pricing, and any special features available?"
            ],
            [
                "building_id" => 3,
                "guest_email" => "alex.jones@example.com",
                "name" => "Alex",
                "surname" => "Jones",
                "text" => "Hey, I'm considering Building 3. Can you provide insights on square footage, pet policies, and community facilities?"
            ],
            [
                "building_id" => 4,
                "guest_email" => "sara.white@example.com",
                "name" => "Sara",
                "surname" => "White",
                "text" => "Hello! Exploring apartments in Building 4. What's the neighborhood like, and are there nearby parks or recreational areas?"
            ],
            [
                "building_id" => 5,
                "guest_email" => "mark.miller@example.com",
                "name" => "Mark",
                "surname" => "Miller",
                "text" => "Hi, checking out Building 5. Can you provide details on parking options, security features, and upcoming community events?"
            ],
            [
                "building_id" => 6,
                "guest_email" => "olivia.brown@example.com",
                "name" => "Olivia",
                "surname" => "Brown",
                "text" => "Hey there! Exploring Building 6. What's the leasing process like, and are there any move-in specials available?"
            ],
            [
                "building_id" => 7,
                "guest_email" => "william.green@example.com",
                "name" => "William",
                "surname" => "Green",
                "text" => "Hi, looking for info on Building 7. How does lease renewal work, and are there any planned renovations in the near future?"
            ],
            [
                "building_id" => 8,
                "guest_email" => "emily.jones@example.com",
                "name" => "Emily",
                "surname" => "Jones",
                "text" => "Hello! Interested in Building 8. Can you share resident reviews, information on community activities, and what makes living there unique?"
            ],
            [
                "building_id" => 1,
                "guest_email" => "chris.taylor@example.com",
                "name" => "Chris",
                "surname" => "Taylor",
                "text" => "Hello, I'm interested in details about apartments in Building 1. Can you share information on lease terms, amenities, and any current promotions available?"
            ],
            [
                "building_id" => 2,
                "guest_email" => "laura.wilson@example.com",
                "name" => "Laura",
                "surname" => "Wilson",
                "text" => "Hi there! Exploring options for apartments in Building 2. Could you provide details on floor plans, pricing, and any special features available?"
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
