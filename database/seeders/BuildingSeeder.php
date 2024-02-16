<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Service;
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
                'title' => 'Harry Potter: Privet Drive',
                'user_id' => 9,
                'rooms' => 15,
                'beds' => 4,
                'description' => "Ecco la casa utilizzata per rappresentare gli interni di Privet Drive, Little Whinging, Surrey: ovvero, la casa d'infanzia di Harry Potter! Per gli ospiti paganti, ci sono due camere con quattro letti ciascuna, un camino e un giardino interno, oltre a una colazione inglese inclusa in ogni soggiorno.",
                'bathrooms' => 2,
                'sqm' => 150,
                'address' => '12 Picket Post Close, Martins Heron, Bracknell, Berkshire, RG12 9BX, Regno Unito',
                'latitude' => 51.4087298552668,
                'longitude' => -0.7214620313143193,
                'image' => '/img/privet_drive_thumb.jpg',
                'available' => true,
                'slug' => ''
            ],

            [

                'title' => 'Tony Stark cottage sul lago',
                'user_id' => 6,
                'rooms' => 9,
                'beds' => 2,
                'description' => "Se il tuo sogno è vivere come un Avenger in ogni modo, c'è una novità che potrebbe renderlo in parte realtà. Infatti, da qualche tempo è possibile affittare il bungalow dove Tony Stark si ritirò all'inizio di Avengers: Endgame. Si tratta di una cabina sul lago, una costruzione in legno simile a un bungalow con vista su un lago tranquillo. Situata nel cuore di Bouckart Farm, a soli 30 minuti di auto da Atlanta, la residenza offre tre camere da letto e tre bagni e può ospitare fino a sei persone.",
                'bathrooms' => 2,
                'sqm' => 100,
                'address' => '9445 Browns Lake Rd, Fairburn, GA',
                'latitude' => 33.640507783645155,
                'longitude' => -84.70076992691166,
                'image' => '/img/tony_stark_thumb.jpg',
                'available' => true,
                'slug' => ''

            ],

            [
                'title' => "Mamma ho perso l'aereo: la casa",
                'user_id' => 5,
                'rooms' => 22,
                'beds' => 4,
                'description' => "La villa ha molte camere spaziose, perfette per decorazioni natalizie e buffe trappole. La casa in questione è quella resa famosa dal film «Mamma, ho perso l’aereo» di Chris Columbus. Le stanze da letto sono quattro, come quattro sono i bagni, per una superficie totale di 400 metri quadrati.",
                'bathrooms' => 5,
                'sqm' => 400,
                'address' => '671 Lincoln Avenue, Winnetka, IL 60093-2345',
                'latitude' => 42.10991775725786,
                'longitude' => -87.73352637405897,
                'image' => '/img/home_alone_thumb.jpg',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => "La perfetta casa di Mrs Doubtfire",
                'user_id' => 4,
                'rooms' => 16,
                'beds' => 2,
                'description' => "Una splendida casa vittoriana a San Francisco, California che, ancora oggi, è meta dei fan del compianto Robin Williams. Qui hanno girato «Mrs. Doubtfire – Mammo per sempre». La casa offre 4 camere da letto e 4 bagni disposti su 300 metri quadrati.",
                'bathrooms' => 4,
                'sqm' => 300,
                'address' => '2640 Steiner Street, San Francisco, California CA',
                'latitude' => 37.79408367834632,
                'longitude' => -122.43639351840825,
                'image' => '/img/doubtfire_thumb.jpg',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Palazzo Padmè (Casinò incuso)',
                'user_id' => 9,
                'rooms' => 86,
                'beds' => 12,
                'description' => "Non siamo a Naboo, ma sul lago di Como, e questo non è il palazzo della regina Padmé Amidala (che proprio qui sposa ad Anakin Skywalker) ma Villa del Balbianello a Lenno, oggi patrimonio del Fai. È stata una delle location anche di «007-Casino Royale».",
                'bathrooms' => 22,
                'sqm' => 1500,
                'address' => '22016 Tremezzina CO',
                'latitude' => 45.96523765467416,
                'longitude' => 9.202484137209296,
                'image' => '/img/padme_thumb.jpg',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Hogwarts (e foresta di Sherwood)',
                'user_id' => 7,
                'rooms' => 150,
                'beds' => 110,
                'description' => "Magari non imparerai a volare su una scopa, ma il Castello di Hogwarts esiste davvero. il nome del celeberrimo castello di Hogwarts in realtà è Alnwick Castle. Prima di Harry Potter, il castello era già stato selezionato come set in altri film come Robin Hood - Principe dei ladri. La struttura conta circa 150 stanze, una moltitudine di letti e un corridoio realmente pieno di armature – attenti solo al bagno del secondo piano, Mirtilla malcontenta non ama i visitatori.",
                'bathrooms' => 32,
                'sqm' => 217.800,
                'address' => 'Alnwick NE66 1NQ, Regno Unito',
                'latitude' => 55.415091582676716,
                'longitude' => -1.704180222357112,
                'image' => '/img/hogwarts_thumb.jpg',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Casa di Walter White: Breaking Bad',
                'user_id' => 1,
                'rooms' => 9,
                'beds' => 3,
                'description' => "La casa di Walter White è la meta ideale per ogni fan di Breaking Bad. Situata ad Albuquerque, nel New Mexico, è uno dei luoghi più iconici della serie, in cui si svolgono alcune delle scene chiave e più intense. È la dimora dove Walter vive con la moglie Skyler, il figlio Walter Junior e la piccola Holly.",
                'bathrooms' => 2,
                'sqm' => 150,
                'address' => '3828 Piermont Dr NE, Albuquerque, NM 87111',
                'latitude' => 35.126345897023725,
                'longitude' => -106.53652394548556,
                'image' => '/img/breaking_bad_thumb.jpg',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Casa Cohen - The O.C.',
                'user_id' => 9,
                'rooms' => 16,
                'beds' => 6,
                'description' => "La casa dei Cohen è un elegante edificio di due piani con uno stile architettonico mediterraneo.
                L’abitazione è piuttosto grande e vanta 6,376 metri quadrati, 6 camere da letto e 6 bagni.
                Gli interni presentano tonalità tenui e neutre, con complementi d’arredo decisamente moderni.
                Il cortile posteriore è un punto focale, con una piscina e una zona lounge, riflettendo il lusso e il comfort della vita nella contea di Orange, California.",
                'bathrooms' => 6,
                'sqm' => 350,
                'address' => '6205 Ocean Breeze Drive, Malibu.',
                'latitude' => 34.035598863626134,
                'longitude' => -118.83366844552246,
                'image' => '/img/Cohen-House-from-TV-show-The-O.C_thumb.jpg',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Casa Creel - Stranger Things',
                'user_id' => 9,
                'rooms' => 24,
                'beds' => 7,
                'description' => "Situata nella città di Rome, in Georgia, più precisamente nella 906 East 2nd Avenue e costruita nel 1882, si tratta di una vecchia dimora in stile vittoriano che può vantare una superficie di 460 metri quadrati e conta cinque stanze da letto, cinque bagni, otto camini, un attico e una dependance con due camere da letto e un bagno. Non solo, conta anche un vasto terreno circostante.",
                'bathrooms' => 6,
                'sqm' => 460,
                'address' => '906 East 2nd Avenue, Rome, Giorgia.',
                'latitude' => 34.2403590217535,
                'longitude' => -85.16280084551562,
                'image' => '/img/Creel-House_thumb.webp',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Casa di Jimmy  - Pulp Fiction',
                'user_id' => 8,
                'rooms' => 8,
                'beds' => 3,
                'description' => "La casa misura 158 metri quadrati e comprende internamente 3 camere da letto e 2 bagni. Ma i fan di Pulp Fiction non potranno scordare altri due ambienti, utilizzati in quella sequenza. Innanzitutto il garage, poi il giardino. Nel primo l'auto fu parcheggiata l’auto e ripulita con il corpo della vittima. Nel secondo Vicent e Jules, completamente nudi, sono obbligati a lavarsi con il tubo di acqua fredda usato per innaffiare i fiori.",
                'bathrooms' => 2,
                'sqm' => 158,
                'address' => '414 Kraft Avenue, Studio City, CA 91604.',
                'latitude' => 34.15000576139492,
                'longitude' => -118.38010996086368,
                'image' => '/img/pulp_fiction_thumb.jpg',
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
                'latitude' => 40.82877832552873,
                'longitude' => -73.44819177411053,
                'image' => '/img/garden-lakeview-of-oheka_thumb.jpg',
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
                'latitude' => 36.78846437778701,
                'longitude' => 14.493021010391375,
                'image' => '/img/montalbano_thumb.jpg',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Jep Gambardella House',
                'user_id' => 9,
                'rooms' => 17,
                'beds' => 8,
                'description' => "Jep's house is a wonderful attic in Piazza del Colosseo, Rome, a majestic red building, to be precise at number 9. You can enjoy the white entrance hall, with imperial columns and important marbles. Very famous and mentioned in Sorrentino's Oscar-winning film 'The Great Beauty'.",
                'bathrooms' => 3,
                'sqm' => 500,
                'address' => 'Piazza del colosseo 9,00184 Roma, Italia ',
                'latitude' => 41.889324644838446,
                'longitude' => 12.493944025931965,
                'image' => '/img/gambardella_thumb.jpg',
                'available' => true,
                'slug' => ''
            ],

            [
                'title' => 'Hatfield House: apparently, Hollywood’s favourite set',
                'user_id' => 9,
                'rooms' => 223,
                'beds' => 200,
                'description' => "With its 223 rooms, as reported by Tatler, Hatfield House has served as a backdrop for various films and TV series, over seventy in total, captivating directors and set designers. Just in 2020, Hatfield House appeared in highly successful films such as 'Enola Holmes' with Millie Bobby Brown, 'Bridgerton' and 'The Crown,' but in previous years, it had also hosted 'Lara Croft: Tomb Raider,' 'V for Vendetta,' multiple Batman films, and 'Mortdecai,' as well as in several films directed by Tim Burton, including 'Charlie and the Chocolate Factory' and 'Sleepy Hollow.",
                'bathrooms' => 73,
                'sqm' => 20.000,
                'address' => 'Great North Rd., Hatfield AL9 5HX, Regno Unito',
                'latitude' => 51.73644784340726,
                'longitude' => -0.19792133129832126,
                'image' => '/img/hatfield_thumb.jpg',
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
                'latitude' => 45.86356148095886,
                'longitude' => -122.80363407389937,
                'image' => '/img/residence_hook_thumb.jpg',
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
                'latitude' => 52.947921792734974,
                'longitude' =>  -1.2109594024022496,
                'image' => '/img/wollaton_thumb.jpg',
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
                'latitude' => 34.44038573087103,
                'longitude' => -119.64672420318146,
                'image' => '/img/Scarface_thumb.jpg',
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
                'latitude' => 40.842729584018116,
                'longitude' => -73.58667384527376,
                'image' => '/img/Jordan-Belfort_thumb.jpg',
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
                'latitude' => 40.60676231295868,
                'longitude' => -74.09792118946451,
                'image' => '/img/padrino_thumb.jpg',
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
                'latitude' => 40.71971193840305,
                'longitude' => -74.00665531829631,
                'image' => '/img/ghostbusters_thumb.jpg',
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
                'latitude' => 34.239206871449746,
                'longitude' => -118.43352778969711,
                'image' => '/img/casa-ritorno-al-futuro.jpg',
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
                'latitude' => 45.331286462557784,
                'longitude' => -121.71100640275898,
                'image' => '/img/Overlook-Hotel-Shining.webp',
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
                'latitude' => 45.96726041813535,
                'longitude' => 9.186367654941552,
                'image' => '/img/house_of_gucci_thumb.jpg',
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
                'latitude' => 34.06018793936209,
                'longitude' => -118.48947553203062,
                'image' => '/img/willy-mansion_thumb.jpg',
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
                'latitude' => 52.107633103078236,
                'longitude' => 0.7957763822110583,
                'image' => '/img/de_vere_house_thumb.jpg',
                'available' => true,
                'slug' => ''
            ]
        ];

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

            // Sponsor

            $sponsorships = Sponsorship::all();
            $sponsorship_ids = $sponsorships->pluck('id');


            $sponsorshipId = $faker->optional()->randomElement($sponsorship_ids);

            if ($sponsorshipId) {
                $startingDate = now();

                switch ($sponsorshipId) {
                    case 1:
                        $endingDate = $startingDate->copy()->addHours(24);
                        break;
                    case 2:
                        $endingDate = $startingDate->copy()->addHours(72);
                        break;
                    case 3:
                        $endingDate = $startingDate->copy()->addHours(144);
                        break;
                    default:
                        $endingDate = $startingDate->copy()->addHours(24);
                        break;
                }

                $new_building->sponsorships()
                    ->attach(
                        $sponsorshipId,
                        [
                            'starting_date' => $startingDate,
                            'ending_date' => $endingDate,
                        ]
                    );
            }

            // Services

            $services = Service::all();
            // pluck id recupera una collection, ma a noi serve un array
            $service_ids = $services->pluck('id');

            $numOfServices = count($services);

            $new_building->services()->attach(
                $service_ids->random(rand(1, $numOfServices))->all()
            );
        }
    }
}
