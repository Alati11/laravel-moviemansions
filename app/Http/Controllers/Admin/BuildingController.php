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
        $services= Service::all();
        $sponsorships= Sponsorship::all();

        return view('admin.buildings.create', compact(['images', 'services', 'sponsorships']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBuildingRequest $request)
    {
        $data = $request->all();

        // $request->validate(
        //     [
        //         "title"=> "required"
        //     ]
        // );

        $data['slug'] = Str::slug($data['title'], '-');

        $new_building = Building::create($data);

        if($request->has('services')){
            $new_building->services()->attach($data['services']);
        }

        if($request->has('sponsorships')){
            $new_building->sponsorships()->attach($data['sponsorships']);
        }

        return redirect()->route('admin.buildings.show', $new_building->id);
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
        $services= Service::all();
        $sponsorships= Sponsorship::all();

        return view('admin.buildings.edit', compact('building', 'images', 'services', 'sponsorships'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBuildingRequest $request, Building $building)
    {
        // $request->validate(
        //     [
        //         "title"=> "required"
        //     ]
        // );

        $data = $request->all();

        $data['slug'] = Str::slug($data['title'], '-');

        $building->update($data);

        if($request->has('services')){
            $building->services()->sync($data['services']);
        } else {
            $building->services()->detach();
        }

        if($request->has('sponsorships')){
            $building->sponsorships()->attach($data['sponsorships']);
        }else {
            $building->sponsorships()->detach();
        }

        return redirect()->route('admin.buildings.show', $building->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        $building->services()->sync([]);
        $building->sponsorships()->sync([]);

        $building->delete();

        return redirect()->route('admin.buildings.index');
    }
}
