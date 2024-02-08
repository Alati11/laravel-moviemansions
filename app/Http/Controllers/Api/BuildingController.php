<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Service;
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
        // $bedsRange1 = $request->input('beds_range_1');
        // $bedsRange2 = $request->input('beds_range_2');
        // $bedsRange3 = $request->input('beds_range_3');
        $roomsFilter = $request->input('rooms_filter');
        $bedsFilter = $request->input('beds_filter');
        $bathsFilter = $request->input('baths_filter');
        $servicesFilter = $request->input('services_filter');
        $bathrooms = $request->input('bathrooms');

        // $buildings = Building::with('services', 'images', 'sponsorships')->get();

        $queryBuilder = Building::query();

        

        // if (!$query) {
        //     $queryBuilder->all();
        // }

        
            if ($query) {
                $queryBuilder->where('address', 'like', '%' . $query . '%');
            }
    
            if ($lat && $lon) {
                $queryBuilder->whereRaw("ST_Distance_Sphere(point(longitude, latitude), point(?, ?)) <= ?", [$lon, $lat, $rad]);
            }
    
            if ($beds) {
                $queryBuilder->where('beds', $beds);
            }
           
            if ($bedsFilter !== 'all') {
                // Aggiungi condizioni per ciascun range di letti
                if ($bedsFilter === 'range_1') {
                    $queryBuilder->where('beds', '<=', 25);
                } elseif ($bedsFilter === 'range_2') {
                    $queryBuilder->whereBetween('beds', [26, 50]);
                } elseif ($bedsFilter === 'range_3') {
                    $queryBuilder->where('beds', '>', 50);
                }
            }
    
            if ($roomsFilter !== 'all') {
                // Aggiungi condizioni per ciascun range di letti
                if ($roomsFilter === 'range_1') {
                    $queryBuilder->where('rooms', '<=', 25);
                } elseif ($roomsFilter === 'range_2') {
                    $queryBuilder->whereBetween('rooms', [26, 50]);
                } elseif ($roomsFilter === 'range_3') {
                    $queryBuilder->where('rooms', '>', 50);
                }
            }
    
            if ($bathsFilter !== 'all') {
                // Aggiungi condizioni per ciascun range di letti
                if ($bathsFilter === 'range_1') {
                    $queryBuilder->where('bathrooms', '<=', 2);
                } elseif ($bathsFilter === 'range_2') {
                    $queryBuilder->whereBetween('bathrooms', [3, 6]);
                } elseif ($bathsFilter === 'range_3') {
                    $queryBuilder->where('bathrooms', '>', 6);
                }
            }
    
           
    
            if ($bathrooms) {
                $queryBuilder->where('bathrooms', $bathrooms);
            }

            
            $allServices = Service::all();
            // $servicesToFilter = $allServices->pluck('id')->all();


            // $buildings = Building::query()
            
            
            // $filteredBuildings = $queryBuilder->get();

            $buildings = $queryBuilder->with('services', 'images', 'sponsorships')->get();

            // if ($servicesFilter !== 'all') {
            //     // Aggiungi condizioni per ciascun range di letti
            //     foreach ($buildings as $building) {
            //        foreach ($building->services as $service) {
            //         $serviceId = $service->id;
            //        }
            //     }

            //     // $buildings = $queryBuilder->with('services', 'images', 'sponsorships')->get();
            // }

            // $buildings = $queryBuilder->with('services', 'images', 'sponsorships')->get();

if ($servicesFilter !== 'all') {
    // Inizializza un array per memorizzare gli ID dei servizi che corrispondono al filtro
    $filteredServiceIds = [];

    // Trova gli ID dei servizi che corrispondono al filtro
    foreach ($buildings as $building) {
        foreach ($building->services as $service) {
            if ($service->id === $servicesFilter) {
                $filteredServiceIds[] = $service->id;
                // Non è necessario applicare il filtro qui, verrà applicato dopo
            }
        }
    }

    // Applica il filtro ai servizi solo se sono stati trovati ID di servizi corrispondenti
    if (!empty($filteredServiceIds)) {
        $queryBuilder->whereHas('services', function ($query) use ($filteredServiceIds) {
            $query->whereIn('id', $filteredServiceIds);
        });
    }
}
       
            

       

        return response()->json(['buildings' => $buildings, 'allServices' => $allServices]);
    }
    public function show(Building $building)
    {
        // $post = Post::with('category','tags')->where('slug',$slug)->first();
        $building->load('services', 'images', 'sponsorships');

        return response()->json([
            'building' => $building
        ]);
    }

    // public function indexAll(Request $request)
    // {

    //     $results = Building::with('services', 'images', 'sponsorships')->paginate(10);

    //     return response()->json([
    //         'results' => $results,
    //         'success' => true
    //     ]);
    // }
}

