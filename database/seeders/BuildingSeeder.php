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
                'title' => 'Oheka Castle -Villa Gatsby',
                'user_id' => 1,
                'rooms' => 157,
                'beds' => 27,
                'description' => "Costruito da un ricco finanziere tedesco di nome Otto Hermann Kahn, il castello con 157 camere è stato realizzato tra il 1914 e il 1919. Si trova ad Hungtinton, sull’isola di Long Island ed è il luogo che ha ispirato il capolavoro di Fitzgerald, il Grande Gatsby.",
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
                'title' => "Marinella - Casa di Montalbano",
                'user_id' => 2,
                'rooms' => 17,
                'beds' => 8,
                'description' => "La casa del Commissario Montalbano a Marinella è in realtà una B&B a Punta Secca, una suggestiva borgata marinara a pochi chilometri da Santa Croce Camerina. Fortunato lui che può godersi ogni giorno quella strepitosa vista dalla sua splendida verandina!",
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
                'title' => 'Casa di Jep Gambardella - La Grande Bellezza',
                'user_id' => 9,
                'rooms' => 17,
                'beds' => 8,
                'description' => "La casa di Jep è un meraviglioso attico in Piazza del Colosseo, Roma, un maestoso palazzo rosso, per l’esattezza al civico 9. Potete godervi l’androne bianco, con colonne imperiali e marmi importanti. Se arrivate dopo mezzogiorno potrete anche incontrare Jep che scende a far colazione.",
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
                'title' => "Hatfield House: il set preferito di Hollywood ",
                'user_id' => 3,
                'rooms' => 223,
                'beds' => 200,
                'description' => "Con le sue 223 stanze Hatfield House ha in passato fatto da sfondo a diverse pellicole e serie tv, oltre settanta in totale, conquistando registi e scenografi. Solo nel 2020 Hatfield House è apparsa in pellicole di grande successo come Enola Holmes con Millie Bobbie Brown e ‘the Crown’, ma negli anni precedenti aveva ospitato anche ‘Lara Croft: Tomb Raider, V per vendetta, più di un Batman e Mortdecai, oltre che in diverse pellicole dirette tra Tim Burton tra cui La Fabbrica di Cioccolato e Il mistero di Sleepy Hollow.",
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
                'title' => "Residence Hoke: la casa dei Cullen",
                'user_id' => 2,
                'rooms' => 45,
                'beds' => 8,
                'description' => "Che tu sia un fan o meno della saga di Twilight, ti sarà capitato di fare qualche apprezzamento sullo straordinario design della casa dei Cullen. Situata nel lussureggiante verde della foresta di Portland nello Stato dell'Oregon, La Residence Hoke è stata progettata nel 2006 dallo studio Skylab Architecture a firma dell'architetto Jeff Kovel nel 2007, coincidendo perfettamente con le riprese del primo capitolo della saga.",
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
                'title' => 'Wollaton Hall: la Batcaverna',
                'user_id' => 1,
                'rooms' => 90,
                'beds' => 60,
                'description' => "Un imponente, labirintico maniero: altro non potrebbe essere che la casa del miliardario Bruce Wayne, aka Batman, ne «Il cavaliere oscuro». La proprietà si chiama Wollaton Hall ed esiste realmente a Nottingham, in Inghilterra. E chissà se nasconde anche la bat caverna...",
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
                'title' => "'Scarface' - la casa",
                'user_id' => 8,
                'rooms' => 50,
                'beds' => 14,
                'description' => "No, la magione di Tony Montana in «Scarface» non è affatto a Miami, in realtà si trova in California. Il proprietario pensava che la casa valesse di più per merito del successo del film, ma in realtà è considerata «famigerata». Il valore si aggira attorno ai 35 milioni di dollari.",
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
                'title' => 'The Wolf Of Wall Street - Casa di Jordan Belfort',
                'user_id' => 2,
                'rooms' => 63,
                'beds' => 5,
                'description' => "La villa, utilizzata come residenza di Jordan Belfort (interpretato da Leonardo DiCaprio), è una lussuosa tenuta con un'imponente facciata e spaziosi terreni. La residenza ritrae l'opulenza e l'eccesso associati allo stile di vita stravagante del protagonista nel film. Dispone di un ingresso maestoso, soffitti alti e dettagli interni di lusso, contribuendo alla rappresentazione complessiva di ricchezza e decadimento nel film.",
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
                'title' => "Villa della Famiglia Corleone ne 'Il Padrino'",
                'user_id' => 1,
                'rooms' => 29,
                'beds' => 5,
                'description' => "È piuttosto conosciuta dagli appassionati del film: nonostante gli interni non siano stati usati per le riprese, la parte esterna della villa è apparsa in diverse scene, tra cui quella molto conosciuta del matrimonio della figlia Connie, interpretata nel film da Talia Shire, e della morte di Don Corleone. E’ stata sottoposta a massicci lavori di ristrutturazione: ora ha cinque camere da letto, sette bagni, una palestra, quattro garage, due uffici e una piscina.",
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
                'title' => 'Ghostbusters - Stazione dei vigili del fuoco',
                'user_id' => 8,
                'rooms' => 40,
                'beds' => 20,
                'description' => "Non è proprio una abitazione, ma una stazione dei vigili del fuoco e si trova a Manhattan. Impossibile non riconoscerla: è il quartier generale degli acchiappafantasmi di «Ghostbuster», nel film del 1984. Pur essendo ancora in funzione, ospita spesso incontri e convention a tema, diventando temporaneamente una residenza per circa 20 persone.",
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
                'title' => 'Ritorno al Futuro - Casa McFly',
                'user_id' => 4,
                'rooms' => 17,
                'beds' => 5,
                'description' => "La casa di Ritorno al Futuro è sempre la stessa nell’intera trilogia: esiste davvero e si trova in una tranquilla via residenziale della periferia di Los Angeles, nel quartiere di Arleta. Dopo 30 e più anni dalle riprese non è cambiato molto nel tranquillo sobborgo di Arleta , neanche il pellegrinaggio dei fans che ogni giorno invadono il vialetto e la privacy della proprietaria, la signora Fentriss: questa in più di un occasione ha affermato che scegliere di prestare la propria casa per il film è stato il più grande sbaglio della sua vita.",
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
                'description' => 'Timberline Lodge è il pauroso Overlook Hotel del film «Shining» di Stanley Kubric. Questo hotel innevato è stato il set di uno dei film di paura più famosi della storia del cinema. Nella finzione di trovava sulle montagne rocciose, in Colorado, mentre in realtà si trova in Oregon.',
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
                'description' => "Villa Balbiano è uno dei principali gioielli architettonici sul Lago di Como, incastonato sulle sue rive in una posizione strategica con una vista mozzafiato sulle montagne e sul paesaggio lacustre. La villa è diventata la dimora ideale per feste, ricevimenti, eventi privati, sessioni fotografiche di moda, matrimoni di personaggi famosi e per le riprese cinematografiche, come nel caso del film House of Gucci.",
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
                'title' => 'La casa di Willy, il principe di Bel-Air',
                'user_id' => 6,
                'rooms' => 27,
                'beds' => 5,
                'description' => "La villa che ha contribuito a lanciare la carriera di Will Smith, nella serie del principe di Bel-Air. La famosa grande casa bianca che appare nella sitcom è stata costruita nel 1937. Sicuramente impresso nella memoria dei fan della serie è l'iconico ingresso bianco della casa con le imponenti colonne e le siepi come ornamenti.",
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
                'title' => "Casa De Vere - Godric's Hollow",
                'user_id' => 4,
                'rooms' => 7,
                'beds' => 2,
                'description' => "E’ la casa di James e Lily Potter a Godric's Hollow, nella quale Harry Potter ha trascorso la sua breve, ma felice infanzia, prima dell’arrivo di Voldemort.
                Situata nella città di Lavenham, nella contea inglese del Suffolk, l’abitazione del giovane Potter nella realtà è chiamata De Vere House.",
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
