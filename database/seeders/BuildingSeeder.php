<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Sponsorship;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $buildings = [

            [
                'title' => 'Harry Potter’s childhood house',
                'user_id' => 3,
                'rooms' => 15,
                'beds' => 4,
                'description' => 'This is the house used to represent the interiors of Privet Drive, Little Whinging, Surrey: that is to say, Harry Potter’s childhood home! For paying guests, there are two rooms with four beds each, a fireplace, and an inner garden, in addition to an English breakfast included with every stay.',
                'bathrooms' => 2,
                'sqm' => 150,
                'address' => '12 Picket Post Close, Martins Heron, Bracknell, Berkshire, RG12 9BX, Regno Unito',
                'latitude' => 111,
                'longitude' => 111,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [

                'title' => 'Tony Stark lakeside cottage',
                'user_id' => 6,
                'rooms' => 9,
                'beds' => 2,
                'description' => "If your dream is to live like an Avenger in  every way, there's a novelty that could make it partly come  true. In fact, for some time now, it has been possible to rent  the bungalow where Tony Stark retired at the beginning of  Avengers: Endgame. It's a lakeside cabin, a wooden construction  resembling a bungalow overlooking a peaceful lake. Located in  the heart of Bouckart Farm, just a 30-minute drive from  Atlanta, the residence offers three bedrooms and three  bathrooms and can accommodate up to six people.",
                'bathrooms' => 2,
                'sqm' => 100,
                'address' => '9445 Browns Lake Rd, Fairburn, GA',
                'latitude' => 200,
                'longitude' => 123,
                'image' => 'https://media.printables.com/media/prints/473105  images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs  cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''

            ],

            [
                'title' => 'Home alone: the home',
                'user_id' => 5,
                'rooms' => 22,
                'beds' => 4,
                'description' => "The building has many spacious rooms, perfect  for Christmas decorations and funny traps. The house is the one  made famous by the movie 'Home Alone' directed by Chris  Columbus. There are four bedrooms, as well as four bathrooms,  making for a total area of 400 square meters.",
                'bathrooms' => 5,
                'sqm' => 400,
                'address' => '671 Lincoln Avenue, Winnetka, IL 60093-2345',
                'latitude' => 345,
                'longitude' => 678,
                'image' => 'https://media.printables.com/media/prints/473105      images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs  cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => "Mrs Doubtfire's perfect house",
                'user_id' => 4,
                'rooms' => 16,
                'beds' => 2,
                'description' => "A splendid Victorian house in San Francisco, California,which still today attracts fans of the late Robin Williams. This is where they filmed 'Mrs. Doubtfire.' The house features 4 bedrooms and 4 bathrooms arranged over 300 square meters.",
                'bathrooms' => 4,
                'sqm' => 300,
                'address' => '2640 Steiner Street, San Francisco, California CA',
                'latitude' => 232,
                'longitude' => 112,
                'image' => 'https://media.printables.com/media/prints/473105/ images/            3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/            welcomehome_homerender.   webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Padme Palace (Casino included)',
                'user_id' => 8,
                'rooms' => 86,
                'beds' => 12,
                'description' => "We're not in Naboo, but on the Como Lake, and this isn't the palace of Queen Padmé Amidala (who marries Anakin Skywalker right here), but Villa del Balbianello in Lenno, now a heritage site of FAI (Italian Environmental Fund). It has also been one of the locations in '007 - Casino Royale.",
                'bathrooms' => 22,
                'sqm' => 1500,
                'address' => '22016 Tremezzina CO',
                'latitude' => 321,
                'longitude' => 333,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Welcome to Hogwarts (archery field added)',
                'user_id' => 7,
                'rooms' => 150,
                'beds' => 110,
                'description' => "Maybe you won't learn to fly on a broom, but Hogwarts Castle does exist. The name of the famous structure is actually Alnwick Castle. Before Harry Potter, the castle had already been selected as a set for other films like Robin Hood: Prince of Thieves. The building boasts around 150 rooms, a multitude of beds, and a corridor truly filled with armors – just beware of the second-floor bathroom, Moaning Myrtle doesn't like visitors.",
                'bathrooms' => 32,
                'sqm' => 217.800,
                'address' => 'Alnwick NE66 1NQ, Regno Unito',
                'latitude' => 943,
                'longitude' => 521,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Home of Walter White – Location Breaking Bad',
                'user_id' => 1,
                'rooms' => 9,
                'beds' => 3,
                'description' => "The house of Walter White is the ideal destination for every Breaking Bad fan. Located in Albuquerque, New Mexico, it is one of the most iconic locations in the series, where some of the key and most intense scenes take place. It is the residence where Walter lives with his wife Skyler, son Walter Junior, and little Holly.",
                'bathrooms' => 2,
                'sqm' => 150,
                'address' => '3828 Piermont Dr NE, Albuquerque, NM 87111',
                'latitude' => 111,
                'longitude' => 222,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Home Cohen - The O.C.',
                'user_id' => 2,
                'rooms' => 16,
                'beds' => 6,
                'description' => "The Cohen house is an elegant two-story building with a Mediterranean architectural style. The house is spacious, featuring open and modern furnishings with carefully crafted architectural details. The living room is welcoming. The backyard is also a focal point, with a pool and a lounge area, reflecting the luxury and comfort of life in Orange County, California. The Cohen house becomes a recognizable element in the series, contributing to the visual character and representation of the world in which the characters live.",
                'bathrooms' => 6,
                'sqm' => 350,
                'address' => '6205 Ocean Breeze Drive, Malibu.',
                'latitude' => 3765,
                'longitude' => 4236,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.web',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Creel House  - Stranger Things',
                'user_id' => 5,
                'rooms' => 24,
                'beds' => 7,
                'description' => "Located in the city of Rome, Georgia, more precisely at 906 East 2nd Avenue, and built in 1882, this is an old Victorian-style residence boasting a surface area of 460 square meters. It features five bedrooms, five bathrooms, eight fireplaces, an attic, and an annex with two bedrooms and a bathroom. Not only that, but it also includes an extensive surrounding land.",
                'bathrooms' => 6,
                'sqm' => 460,
                'address' => '906 East 2nd Avenue, Rome, Giorgia.',
                'latitude' => 12547,
                'longitude' => 14789,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'The House of Jimmy  - Pulp Fiction',
                'user_id' => 8,
                'rooms' => 8,
                'beds' => 3,
                'description' => "The house measures 158 square meters and internally comprises 3 bedrooms and 2 bathrooms. But Pulp Fiction fans will not forget two other spaces used in that sequence. Firstly, the garage, then the garden. In the garage, the car was parked, and the body of the victim was cleaned. In the garden, Vincent and Jules, completely naked, are forced to wash themselves with the cold water hose used for watering the flowers.",
                'bathrooms' => 2,
                'sqm' => 158,
                'address' => '414 Kraft Avenue, Studio City, CA 91604.',
                'latitude' => 4321,
                'longitude' => 144,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'OHEKA CASTLE - Grande Gatsby Mansion',
                'user_id' => 1,
                'rooms' => 157,
                'beds' => 27,
                'description' => "A breathtakingly beautiful historic mansion located on the famed Gold Coast of Long Island between New York City and The Hamptons. At OHEKA CASTLE guests will discover a World of charming luxury and European ambiance.OHEKA is recognized as one of the most prestigious wedding venues in the World, boasts 34 luxurious  guestrooms and suites, and offers Historic Mansion Tours of the estate and gardens.",
                'bathrooms' => 35,
                'sqm' => 10.000,
                'address' => 'Oheka Castle,135 West Gate Drive,Huntington, NY 11743',
                'latitude' => 9432,
                'longitude' => 2765,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => "Montalbano's House in Marinella",
                'user_id' => 2,
                'rooms' => 17,
                'beds' => 8,
                'description' => "The house of Commissioner Montalbano in Marinella is actually a B&B in Punta Secca, a charming fishing village a few kilometers from Santa Croce Camerina. Lucky him who can enjoy that stunning view from his beautiful little terrace every day!",
                'bathrooms' => 6,
                'sqm' => 330,
                'address' => ' Corso Aldo Moro, 44, 97017 Punta Secca RG, Italy',
                'latitude' => 4458,
                'longitude' => 7896,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Jep Ganbardella House',
                'user_id' => 4,
                'rooms' => 17,
                'beds' => 8,
                'description' => "Jep's house is a wonderful attic in Piazza del Colosseo, Rome, a majestic red building, to be precise at number 9. You can enjoy the white entrance hall, with imperial columns and important marbles. Very famous and mentioned in Sorrentino's Oscar-winning film 'The Great Beauty'.",
                'bathrooms' => 3,
                'sqm' => 500,
                'address' => 'Piazza del colosseo 9,00184 Roma, Italia ',
                'latitude' => 3232,
                'longitude' => 1423,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Hatfield House: apparently, Hollywood’s favourite set',
                'user_id' => 8,
                'rooms' => 223,
                'beds' => 200,
                'description' => "With its 223 rooms, as reported by Tatler, Hatfield House has served as a backdrop for various films and TV series, over seventy in total, captivating directors and set designers. Just in 2020, Hatfield House appeared in highly successful films such as 'Enola Holmes' with Millie Bobby Brown, 'Bridgerton' and 'The Crown,' but in previous years, it had also hosted 'Lara Croft: Tomb Raider,' 'V for Vendetta,' multiple Batman films, and 'Mortdecai,' as well as in several films directed by Tim Burton, including 'Charlie and the Chocolate Factory' and 'Sleepy Hollow.",
                'bathrooms' => 73,
                'sqm' => 20.000,
                'address' => 'Great North Rd., Hatfield AL9 5HX, Regno Unito',
                'latitude' => 5476,
                'longitude' => 998,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => "Residence Hoke: Twilight Mansion, The Cullen’s Residence!",
                'user_id' => 2,
                'rooms' => 45,
                'beds' => 8,
                'description' => "Just like the luxury house of Tony Stark in the movie Ironman, many were impressed on the beauty of the house that truly suits to Meyer's description of their luxury modern house located in a secluded area in the woods.It was built in 2006 and was completed in 2007, just in time for the first Twilight movie.",
                'bathrooms' => 5,
                'sqm' => 445,
                'address' => ' 184 6th St, St. Helens, Oregon, USA.',
                'latitude' => 1423,
                'longitude' => 6589,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Wollaton Hall: the Batcave',
                'user_id' => 1,
                'rooms' => 90,
                'beds' => 60,
                'description' => "An imposing, labyrinthine mansion: it could be nothing other than the home of billionaire Bruce Wayne, aka Batman, in 'The Dark Knight.' The property is called Wollaton Hall and actually exists in Nottingham, England. And who knows, it might even hide the Batcave...",
                'bathrooms' => 25,
                'sqm' => 16.000,
                'address' => '2 Wollaton Hall, Nottingham NG8 2AE, Regno Unito',
                'latitude' => 5897,
                'longitude' => 4523,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => "The 'Scarface' mansion",
                'user_id' => 8,
                'rooms' => 50,
                'beds' => 14,
                'description' => "Although according to the setting of the film the house is located in Miami, in reality the villa is located in a luxurious neighborhood of Santa Barbara in California. The property boasts 109 years of existence, a long period during which multiple owners have followed one another and which has enriched the villa with history.
                This little paradise was designed by the well-known North American architect Bertram Goodhue, who wanted to recreate a Mediterranean style on four hectares of land. The villa is surrounded by lush gardens, is embellished with a beautiful swimming pool and offers a spectacular view of the Pacific Ocean.",
                'bathrooms' => 9,
                'sqm' => 911,
                'address' => 'Montecito, CA 93108, Stati Uniti',
                'latitude' => 8596,
                'longitude' => 4156,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'The Wolf Of Wall Street - Jordan Belfort House',
                'user_id' => 2,
                'rooms' => 63,
                'beds' => 5,
                'description' => "The mansion, used as the residence of Jordan Belfort (played by Leonardo DiCaprio), is a luxurious estate with an impressive exterior and spacious grounds. The residence portrays the opulence and excess associated with the main character's extravagant lifestyle in the film. It has a grand entrance, high ceilings, and upscale interior details, contributing to the overall depiction of wealth and decadence in the movie.",
                'bathrooms' => 6,
                'sqm' => 800,
                'address' => '5 Pin Oak Court, Old Brookville, Long Island, New York, USA.',
                'latitude' => 9632,
                'longitude' => 8524,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => "The Godfather Mansion: Villa della Famiglia Corleone ne 'Il Padrino'",
                'user_id' => 1,
                'rooms' => 29,
                'beds' => 5,
                'description' => "It is a grand, traditional-style residence that exudes a sense of timeless elegance. The architecture reflects the opulence associated with the Corleone family, featuring a stately exterior with well-maintained grounds. The house stands as a cinematic symbol of power and authority, befitting the character of Vito Corleone in this classic film.",
                'bathrooms' => 7,
                'sqm' => 210,
                'address' => ' 110 Longfellow Avenue, Staten Island, New York, USA.',
                'latitude' => 4222,
                'longitude' => 674,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Ghostbusters - Fire Station',
                'user_id' => 7,
                'rooms' => 40,
                'beds' => 15,
                'description' => "It's not exactly a residence, but a fire station located in Manhattan. Impossible not to recognize it: it's the headquarters of the Ghostbusters in the 1984 film. It is still in function, but occasionally it hosts conventions, video clips shootings and other events.",
                'bathrooms' => 8,
                'sqm' => 1200,
                'address' => '14 N Moore St TriBeCa, New York City, NY 10013-2413',
                'latitude' => 972,
                'longitude' => 1532,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Back to the Future - McFly House',
                'user_id' => 4,
                'rooms' => 17,
                'beds' => 5,
                'description' => "The house from 'Back to the Future' remains the same throughout the entire trilogy: it actually exists and is located on a quiet residential street in the suburb of Los Angeles, in the neighborhood of Arleta. After 30 years or more since the filming, not much has changed in the quiet suburb of Arleta, including the daily pilgrimage of fans who invade the driveway and the privacy of the owner, Mrs. Fentriss. On more than one occasion, she has stated that choosing to lend her house for the film was the biggest mistake of her life.",
                'bathrooms' => 3,
                'sqm' => 400,
                'address' => '9303 Roslyndale Avenue, Arleta, California',
                'latitude' => 7845,
                'longitude' => 0234,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Overlook Hotel - Shining',
                'user_id' => 5,
                'rooms' => 80,
                'beds' => 77,
                'description' => 'In reality it is called Timberline Lodge. This snow-covered hotel was the set of one of the most famous scary films in cinema history. In fiction he was in the Rocky Mountains, in Colorado, while in reality he was in Oregon.',
                'bathrooms' => 77,
                'sqm' => 400,
                'address' => ' 27500 E Timberline Road, Government Camp, OR 97028, Stati Uniti',
                'latitude' => 2322,
                'longitude' => 876,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Villa Balbiano - House of Gucci',
                'user_id' => 3,
                'rooms' => 113,
                'beds' => 26,
                'description' => "Villa Balbiano is one of the major architectural jewels on Lake Como, nestled on its shores in a strategic position with breathtaking views of the mountains and lake landscape. The villa has become the ideal home for parties, receptions, private events, fashion shootings, weddings of the rich and famous and for film shoots such as the film House of Gucci.",
                'bathrooms' => 21,
                'sqm' => 6460,
                'address' => 'Piazza Cardinal Durini, 22010 Ossuccio CO',
                'latitude' => 423,
                'longitude' => 843,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Willy Mansion, the Fresh Prince of Bel-Air',
                'user_id' => 6,
                'rooms' => 27,
                'beds' => 5,
                'description' => "The mansion that helped launch Will Smith's career, Bel-Air. The famous large white house that appears in the sitcom was built in 1937. Imprinted in the memory of fans of the series is certainly the iconic white entrance of the house with the imposing columns and hedges as ornaments",
                'bathrooms' => 5,
                'sqm' => 500,
                'address' => ' 251, North Bristol Avenue a Brentwood',
                'latitude' => 4233,
                'longitude' => 854,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => "De Vere House - Godric's Hollow",
                'user_id' => 4,
                'rooms' => 7,
                'beds' => 2,
                'description' => "It is the home of James and Lily Potter in Godric's Hollow, where Harry Potter spent his short but happy childhood before Voldemort's arrival.
                Located in the town of Lavenham, in the English county of Suffolk, the young Potter's home in reality is called De Vere House",
                'bathrooms' => 1,
                'sqm' => 80,
                'address' => '72 Water St, Lavenham, Sudbury CO10 9RW, Regno Unito',
                'latitude' => 423,
                'longitude' => 843,
                'image' => 'https://media.printables.com/media/prints/473105/images/3873468_0a11439e-aaf3-4775-9612-becc6f4b6f6d/thumbs/cover/800x800/png/welcomehome_homerender.webp',
                'available' => true,
                'slug' => ''
            ]
        ];

        $sponsorships = Sponsorship::all();
        $sponsorship_ids = $sponsorships->pluck('id');
        // $sponsorship_duration = $sponsorships->pluck('duration');


        foreach ($buildings as $building) {

            $new_building = new Building();

            $new_building->user_id = $building['user_id'];
            $new_building->title = $building['title'];
            $new_building->rooms = $building['rooms'];
            $new_building->beds = $building['beds'];
            $new_building->bathrooms = $building['bathrooms'];
            $new_building->sqm = $building['sqm'];
            $new_building->latitude = $building['latitude'];
            $new_building->longitude = $building['longitude'];
            $new_building->description = $building['description'];
            $new_building->address = $building['address'];
            $new_building->image = $building['image'];
            $new_building->available = $building['available'];
            $new_building->slug = Str::slug($building['title'], '-');

            $new_building->save();

            $new_building->sponsorships()
                ->attach($faker->optional()->randomElement($sponsorship_ids));

            // $sponsorshipId = $faker->optional()->randomElement($sponsorship_ids);

            // $start_date = $faker->dateTimeBetween('-24 hours', 'now');

            // if ($sponsorshipId) {
            //     // Aggiungi l'entry alla tabella ponte con starting_date e ending_date
            //     $new_building->sponsorships()->attach([
            //         'sponsorship_id' => $sponsorshipId,
            //         // 'starting_date' => '2024-01-28 15:30:45',
            //         // 'ending_date' => '2024-02-28 16:30:45',
            //     ]);
            // }
        }
    }
}
