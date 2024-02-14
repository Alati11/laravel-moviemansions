@extends('layouts.app')

@section('content')
<div id="dropin-wrapper">
    <div id="checkout-message"></div>
    <div id="dropin-container"></div>
    <button id="submit-button" class="btn btn-primary">Procedi al pagamento</button>            
</div>
    
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
            $('#checkout-message').html('<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>');
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