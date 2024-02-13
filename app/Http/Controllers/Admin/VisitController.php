<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Http\Requests\StoreVisitRequest;
use App\Http\Requests\UpdateVisitRequest;
use App\Models\Building;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVisitRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($buildingId)
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        $yesterdayDate = Carbon::now()->subDays(1)->format('Y-m-d');
        $GG2Date = Carbon::now()->subDays(2)->format('Y-m-d');

        $building = Building::find($buildingId);

        $visits = Visit::where('building_id', $buildingId)->get();
        // conto di oggi
        $visitsCountToday = Visit::where('building_id', $buildingId)
        // ->whereDate('time',` $currentDate %%:%%:%%`)
        ->where('time', '>=', $currentDate . ' 00:00:00')
        ->where('time', '<=', $currentDate . ' 23:59:59')
        ->get()
        ->groupBy('ip_address');

        // dd($visitsCountToday);
    
        $IPCountToday = count($visitsCountToday);

        //conto di ieri
        $visitsCountYs = Visit::where('building_id', $buildingId)
        ->where('time', '>=', $yesterdayDate . ' 00:00:00')
        ->where('time', '<=', $yesterdayDate . ' 23:59:59')
        ->get()
        ->groupBy('ip_address');
    
        $IPCountYS = count($visitsCountYs);

        //conto di 2gg fa
        $visitsCount2gg = Visit::where('building_id', $buildingId)
        ->where('time', '>=', $GG2Date . ' 00:00:00')
        ->where('time', '<=', $GG2Date . ' 23:59:59')
        ->get()
        ->groupBy('ip_address');
    
        $IPCount2gg = count($visitsCount2gg);

        return view('admin.visits.show', compact('building','visits', 'IPCountToday', 'IPCountYS', 'IPCount2gg',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visit $visit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisitRequest $request, Visit $visit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visit $visit)
    {
        //
    }
}
