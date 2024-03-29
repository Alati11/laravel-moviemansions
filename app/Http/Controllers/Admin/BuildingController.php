<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;
use App\Models\Building;
use App\Models\Image;
use App\Models\Service;
use App\Models\Sponsorship;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Recupero l'utente loggato
        $user_id = Auth::id();
        //recupero solo i suoi buildings. remember: where considera due parametri da eguagliare.
        $buildings = Building::where('user_id', $user_id)->get();

        return view('admin.buildings.index', compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $images = Image::all();
        $services = Service::all();
        $sponsorships = Sponsorship::all();

        return view('admin.buildings.create', compact('images', 'services', 'sponsorships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $data = $request->all();

        $request->validate(
            [
                "title" => "required|max:255|string",
                "rooms" => "required|numeric|min:1",
                "beds" => "required|numeric|min:1",
                "bathrooms" => "required|numeric|min:1",
                "sqm" => "required|numeric|min:10",
                "description" => "required|string|min:20|max:500",
                "address" => "required|string|min:5|max:255",
                "image" => [
                    "required",
                    "mimes:jpeg,png,jpg,gif,webp",
                    File::image()
                        ->min('1kb')
                        ->max('10mb')
                ],
                "available" => "boolean",
                "services" => "required|exists:services,id",
                "sponsorship_id" => "nullable|exists:sponsorships,id",
                "image_id" => "exists:images,id",
            ]
        );

        // Slug
        $data['slug'] = Str::slug($data['title'], '-');

        $geocodeData = $this->geocodeAddress($data['address']);
        $data['latitude'] = $geocodeData['latitude'];
        $data['longitude'] = $geocodeData['longitude'];


        // User
        $user_id = Auth::id();

        $data['user_id'] = $user_id;


        if ($request->has('available')) {
            $data['available'] = 1;
        } else {
            $data['available'] = 0;
        }

        // Inserisci immagine
        if ($request->hasFile('image')) {

            $file_path = Storage::put('img', $request->image);

            $data['image'] = $file_path;
        }

        $new_building = Building::create($data);

        // Attach services
        if ($request->has('services')) {
            $new_building->services()->attach($data['services']);
        }


        //Attach images
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {
                $imagePath = Storage::put('img/buildings', $image);
                $new_building->images()->create([
                    'building_id' => $new_building->id,
                    'url' => $imagePath,
                ]);
            }
        }

        return redirect()->route('admin.buildings.show', $new_building->id)->with('message_create', "$new_building->title aggiunto correttamente");
    }

    private function geocodeAddress($address)
    {
        $apiKey = "pqHD68XXAijUehCtM4HFFAVamZjQMA1W";

        $url = "https://api.tomtom.com/search/2/search/{$address}.json?key={$apiKey}";

        $response = Http::withOptions(['verify' => false])->get($url);

        // Decodifica la risposta JSON
        $data = $response->json();

        // Verifica se ci sono risultati validi
        if ($data && isset($data['results']) && !empty($data['results'])) {
            // Estrai le coordinate dal primo risultato
            $firstResult = $data['results'][0];
            $position = $firstResult['position'];

            // Restituisci le coordinate come array associativo
            return [
                'latitude' => $position['lat'],
                'longitude' => $position['lon'],
            ];
        }
        return [
            'latitude' => 40.7128,
            'longitude' => -74.0060,
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building)
    {
        $images = Image::all();
        $services = Service::all();
        $sponsorships = Sponsorship::all();

        return view('admin.buildings.show', compact('building', 'images', 'services', 'sponsorships'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building)
    {
        $images = Image::all();
        $services = Service::all();
        $sponsorships = Sponsorship::all();

        return view('admin.buildings.edit', compact('building', 'images', 'services', 'sponsorships'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Building $building)
    {
        $request->validate(
            [
                "title" => "required|max:255|string",
                "rooms" => "required|numeric|min:1",
                "beds" => "required|numeric|min:1",
                "bathrooms" => "required|numeric|min:1",
                "sqm" => "required|numeric|min:10",
                "description" => "required|string|min:20|max:500",
                "address" => "required|string|min:5|max:255",
                "image" => [
                    "required",
                    File::image()
                        ->min('1kb')
                        ->max('10mb')
                ],
                "available" => "boolean",
                "services" => "required|exists:services,id",
                "sponsorship_id" => "nullable|exists:sponsorships,id",
                "image_id" => "exists:images,id",
            ]
        );

        $data = $request->all();

        //riempio slug
        $data['slug'] = Str::slug($data['title'], '-');

        //riempio lat e long
        $geocodeData = $this->geocodeAddress($data['address']);
        $data['latitude'] = $geocodeData['latitude'];
        $data['longitude'] = $geocodeData['longitude'];

        // User
        $user_id = Auth::id();

        $data['user_id'] = $user_id;

        if ($request->hasFile('image')) {

            $file_path = Storage::put('img', $request->image);

            $data['image'] = $file_path;
        }

        // Elimina tutte le immagini con gli ID associati all'edificio
        $building->images()->delete();

        $building->update($data);

        if ($request->has('services')) {
            $building->services()->sync($data['services']);
        } else {
            $building->services()->detach();
        }

        // Controllo per il sync sponsorships
        if ($data['sponsorship_id']) {
            $startingDate = now();

            switch ($data['sponsorship_id']) {
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
        }

        //sync sponsorship
        if ($request->has('sponsorships')) {
            $building->sponsorships()->sync($data['sponsorships']);
        } else {
            $building->sponsorships()->detach();
        }


        //salva le images nuove
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {
                $imagePath = Storage::put('img/buildings', $image);
                $building->images()->create([
                    'building_id' => $building->id,
                    'url' => $imagePath,
                ]);
            }
        }

        return redirect()->route('admin.buildings.show', $building->id)->with('message_edit', "$building->title modificato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        $building->services()->sync([]);
        $building->sponsorships()->sync([]);
        $building->messages()->delete();

        $building->delete();

        return redirect()->route('admin.buildings.index')->with('message_destroy', "$building->title eliminato correttamente");
    }
}
