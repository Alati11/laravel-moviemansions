<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Braintree\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Models\Building;
use App\Models\BuildingSponsorship;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{

    public function token(Request $request)
    {

        $buildingId = $request->input('building_id');
        $sponsorshipId = $request->input('sponsorship_id');

        // dd('Building ID: ' . $buildingId, 'Sponsorship ID: ' . $sponsorshipId);

        // Verifica la validità degli ID di building e sponsorship
        if (request()->input('building_id') && request()->input('sponsorship_id')) {
            $buildingId = $request->input('building_id');
            $sponsorshipId = $request->input('sponsorship_id');

            $user = Auth::user();
            $building = $user->buildings->where('id', $buildingId);
            if ($building->isEmpty() || ($sponsorshipId > 3 || $sponsorshipId <= 0)) {
                return redirect()->route('admin.sponsorship.index')->with('warning', 'Ci dispiace, la pagina non esiste, riprova di nuovo.');
            }

            $gateway = new \Braintree\Gateway([
                'environment' => env("BRAINTREE_ENV"),
                'merchantId' => env("BRAINTREE_MERCHANT_ID"),
                'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
                'privateKey' => env("BRAINTREE_PRIVATE_KEY")
            ]);


            $token = $gateway->clientToken()->generate();

            // Passa il token e l'id della sponsorship e del building alla vista
            return view('admin.payments.index', compact('token', 'sponsorshipId', 'buildingId'));
        } else {
            return redirect()->route('admin.sponsorships.index')->with('warning', 'Ci dispiace, la pagina non esiste, riprova di nuovo.');
        }
    }


    public function process(Request $request)
    {


        $data = $request->all();

        $gateway = new \Braintree\Gateway([
            'environment' => env("BRAINTREE_ENV"),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        // $sponsorshipId = request()->input('sponsorship_id');
        // $buildingId = request()->input('building_id');

        $nonce = $data['data']['paymentMethodNonce'];
        $sponsorshipId = $data['data']['sponsorship_id'];
        $buildingId = $data['data']['building_id'];
        // dd($nonce, $sponsorshipId, $buildingId);

        $sponsorship = Sponsorship::find($sponsorshipId);
        // dd($sponsorship);

        // Simula il pagamento
        $result = $gateway->transaction()->sale([
            'amount' => $sponsorship->price,
            'paymentMethodNonce' => $nonce,
            'options' => ['submitForSettlement' => true],
        ]);

        if ($result->success) {
            $result->transaction;
        }


        $currentDate = date("Y-m-d H:i:s");
        $currentDateMin = date("Y-m-d H:i:s", strtotime('+' . $sponsorship->duration . 'hours', strtotime($currentDate)));

        if ($result) {
            $building_sponsorship = new BuildingSponsorship();
            $building_sponsorship->building_id = $buildingId;
            $building_sponsorship->sponsorship_id = $sponsorshipId;
            $building_sponsorship->starting_date = $currentDate;
            $building_sponsorship->ending_date = $currentDateMin;
            $building_sponsorship->save();
        }

        return response()->json($result);
    }
}
