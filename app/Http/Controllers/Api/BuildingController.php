<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index(Request $request)
    {

        $results = Building::with('services', 'images', 'sponsorships')->paginate(10);

        return response()->json([
            'results' => $results,
            'success' => true
        ]);
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
