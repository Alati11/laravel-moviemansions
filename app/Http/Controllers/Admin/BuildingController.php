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
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buildings = Building::all();

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
                "title" => "required|max:255|string|",
                "rooms" => "required|numeric|min:1",
                "beds" => "required|numeric|min:1",
                "bathrooms" => "required|numeric|min:1",
                "sqm" => "required|numeric|min:1",
                "description" => "required|string|min:20|max:500",
                "address" => "required|string|min:5|max:255",
                "latitude" => "required|numeric",
                "longitude" => "required|numeric",
                "image" => [
                    "required",
                    File::image()
                        ->min('1kb')
                        ->max('4mb')
                ],
                "available" => "boolean",
                "service_id" => "exists:services,id",
                "sponsorship_id" => "nullable|exists:sponsorships,id",
                "image_id" => "exists:images,id",
            ]
        );

        // Slug
        $data['slug'] = Str::slug($data['title'], '-');

        // $latitude = $data['latitude'];
        // $longitude = $data['longitude'];

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

            // dd($request);
        }

        $new_building = Building::create($data);

        // Attach services
        if ($request->has('services')) {
            $new_building->services()->attach($data['services']);
        }

        // Controllo per l'attach sponsorships
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

        // Attach Sponsors
        if ($request->has('sponsorship_id') & $data['sponsorship_id'] !== null) {
            $new_building->sponsorships()->attach($data['sponsorship_id'], ['starting_date' => $startingDate, 'ending_date' => $endingDate]);
        }

        return redirect()->route('admin.buildings.show', $new_building->id)->with('message_create', "$new_building->title aggiunto correttamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building)
    {
        return view('admin.buildings.show', compact('building'));
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
                "title" => "required|max:255|string|",
                "rooms" => "required|numeric|min:1",
                "beds" => "required|numeric|min:1",
                "bathrooms" => "required|numeric|min:1",
                "sqm" => "required|numeric|min:1",
                "description" => "required|string|min:20|max:500",
                "address" => "required|string|min:5|max:255",
                "image" => "required|string|url",
                "available" => "boolean",
                "service_id" => "exists:services,id",
                "sponsorship_id" => "nullable|exists:sponsorships,id",
                "image_id" => "exists:images,id",
            ]
        );

        $data = $request->all();

        $data['slug'] = Str::slug($data['title'], '-');

        $building->update($data);

        if ($request->has('services')) {
            $building->services()->sync($data['services']);
        } else {
            $building->services()->detach();
        }

        if ($request->has('sponsorships')) {
            $building->sponsorships()->attach($data['sponsorships']);
        } else {
            $building->sponsorships()->detach();
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

        $building->delete();

        return redirect()->route('admin.buildings.index')->with('message_destroy', "$building->title eliminato correttamente");
    }
}
