<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('search');
        $lat = $request->input('lat');
        $lon = $request->input('lon');
        $rad = $request->input('rad');
        $rooms = $request->input('rooms');
        $beds = $request->input('beds');
        $bathrooms = $request->input('bathrooms');

        $queryBuilder = Building::query();

        if ($query) {
            $queryBuilder->where('address', 'like', '%' . $query . '%');
        }

        if ($lat && $lon) {
            $queryBuilder->whereRaw("ST_Distance_Sphere(point(longitude, latitude), point(?, ?)) <= ?", [$lon, $lat, $rad]);
        }

        if ($beds) {
            $queryBuilder->where('beds', $beds);
        }

        if ($rooms) {
            $queryBuilder->where('rooms', $rooms);
        }

        if ($bathrooms) {
            $queryBuilder->where('bathrooms', $bathrooms);
        }

        $buildings = $queryBuilder->get();

        return response()->json(['buildings' => $buildings]);
    }
    public function show(Building $building)
    {
        // $post = Post::with('category','tags')->where('slug',$slug)->first();
        $building->load('services', 'images', 'sponsorships');

        return response()->json([
            'building' => $building
        ]);
    }
}
