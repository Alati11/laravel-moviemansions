<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Braintree\Gateway;
use Braintree\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Models\Building;
use App\Models\BuildingSponsorship;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PaymentController extends Controller
{
    public function index() {
        return view('admin.payments.index');
    }

    public function token(Request $request)
    {

        

            $gateway = new Gateway([
                'environment' => env("BRAINTREE_ENV"),
                'merchantId' => env("BRAINTREE_MERCHANT_ID"),
                'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
                'privateKey' => env("BRAINTREE_PRIVATE_KEY")
            ]);

        $clientToken = $gateway->clientToken()->generate();
        return view('admin.payments.index', compact('clientToken'));
    }


    public function process(Request $request)
    {
        

         $nonce = $request->input('payment_method_nonce');
         $sponsorshipId = request()->input('sponsorship');
         $buildingId = request()->input('building');
         $sponsorship = Sponsorship::where('id',$sponsorshipId)->first();
        // Simula il pagamento (non utilizzare in produzione)
        $result = Transaction::sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $nonce,
            'options' => ['submitForSettlement' => true],
        ]);

        $currentDate = date("Y-m-d H:i:s");
        $currentDateMin = date("Y-m-d H:i:s", strtotime('+'.$sponsorship->duration.'hours', strtotime($currentDate)));

        if($result){
            $building_sponsorship = new BuildingSponsorship();
            $building_sponsorship->building_id = $buildingId;
            $building_sponsorship->sponsorship_id = $sponsorshipId;
            $building_sponsorship->starting_date = $currentDate;
            $building_sponsorship->ending_date = $currentDateMin;
            $building_sponsorship->save();
        }

        // Puoi gestire la risposta di Braintree qui (ad esempio, aggiornare il tuo sistema interno)

        return response()->json($result);
    }

}
