@extends('layouts.app')

@section('content')

<section>

    <div id="payment-success" class="d-flex flex-column align-items-center py-5 d-none"> 
        <div class="info">
            <div class="info__icon">
                <i class="fa-solid fa-circle-check text-light fs-5"></i>
            </div>

            <div class="info__title">Pagamento avvenuto con successo</div>
        </div>

        <div class="py-5">
            <p class="text-secondary">
                <small>
                    Grazie per aver scelto di sponsorizzare il tuo Immobile, controlla la sezione visite per capire se ne vale la pena! <br>
                    Nel caso fosse così (e siamo certi che lo sarà), puoi sempre prolungare la sponsorizzazione o rifarne una nuova <i class="fa-solid fa-face-grin-stars color-green"></i>
                </small>
            </p>
        </div>

        <div class="back-sponsor-btn">
            <a href="{{route('admin.buildings.index')}}">
                <button class="btn btn-sm go-back-btn">
                    <span><i class="fa-solid fa-arrow-left-long"></i>
                        <b>Torna ai tuoi Immobili</b> 
                        </span>
                </button>
            </a>
            
        </div>
    </div>

    <div class="d-flex flex-column align-items-center">

      <div id="dropin-container" class="w-50"></div>

      <button id="submit-button" class="payment-btn">
        <span>Conferma pagamento</span>
      </button>        
    </div>
  
</section>
    
@endsection

@section('javascript')

<script>
  const urlParams = new URLSearchParams(window.location.search);
  let sponsorship_id = urlParams.get('sponsorship_id');
  let building_id = urlParams.get('building_id');

  console.log(sponsorship_id, building_id);

  var button = document.querySelector('#submit-button');

  braintree.dropin.create({
    // Insert your tokenization key here
    authorization: '{{ $token }}',
    container: '#dropin-container'
  }, function (createErr, instance) {
    button.addEventListener('click', function () {
      instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
        $.get('{{ route('admin.payments.process') }}',{
          data: {
            'paymentMethodNonce': payload.nonce,
            sponsorship_id: sponsorship_id,
            building_id: building_id
          }
        }).done(function(result) {
          instance.teardown(function (teardownErr) {
            if (teardownErr) {
              console.error('Could not tear down Drop-in UI!');
            } else {
              console.info('Drop-in UI has been torn down!');
              $('#submit-button').remove();
            }
          });

          if (result.success) {
            $('#submit-button').addClass('d-none');
            $('#payment-success').removeClass('d-none');
          } else {
            console.log(result);
            $('#checkout-message').html('<h1>Error</h1><p>Check your console.</p>');
          }
        });
      });
    });
  });
  </script>

@endsection