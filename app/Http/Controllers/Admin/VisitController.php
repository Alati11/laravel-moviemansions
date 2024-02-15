<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Http\Requests\StoreVisitRequest;
use App\Http\Requests\UpdateVisitRequest;
use App\Models\Building;
use App\Models\Message;
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

        ////////VISITE///////

        $monthlyCountsNum = [];

        $currentYear = Carbon::now()->year;

        for ($i = 1; $i <= 12; $i++) {
            // Calcola la data di inizio e fine del mese corrente
            $startOfMonth = Carbon::createFromDate($currentYear, $i, 1)->format('Y-m-d');
            $endOfMonth = Carbon::createFromDate($currentYear, $i, 1)->endOfMonth()->format('Y-m-d');

            // Esegui la query per il conteggio delle visite nel mese corrente
            $visitsCount = Visit::where('building_id', $buildingId)
                ->where('time', '>=', $startOfMonth . ' 00:00:00')
                ->where('time', '<=', $endOfMonth . ' 23:59:59')
                ->get()
                ->groupBy('ip_address')
                ->count();

            // Aggiungi il conteggio mensile all'array
            $monthlyCountsNum[] = $visitsCount;
        }
        

        //////MESSAGGI////////
        $monthlyMsgNum = [];

        for ($i = 1; $i <= 12; $i++) {
            // Calcola la data di inizio e fine del mese corrente
            $startOfMonth = Carbon::createFromDate($currentYear, $i, 1)->format('Y-m-d');
            $endOfMonth = Carbon::createFromDate($currentYear, $i, 1)->endOfMonth()->format('Y-m-d');

            // Esegui la query per il conteggio delle visite nel mese corrente
            $msgCount = Message::where('building_id', $buildingId)
                ->where('created_at', '>=', $startOfMonth . ' 00:00:00')
                ->where('created_at', '<=', $endOfMonth . ' 23:59:59')
                ->count();
            // Aggiungi il conteggio mensile all'array
            $monthlyMsgNum[] = $msgCount;
        }

        
        return view('admin.visits.show', compact('building','visits', 'monthlyCountsNum', 'monthlyMsgNum' ));
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
