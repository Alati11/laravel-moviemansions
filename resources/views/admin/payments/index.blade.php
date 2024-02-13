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
    var button = document.querySelector('#submit-button');
  
    braintree.dropin.create({
      // Insert your tokenization key here
      authorization: '{{ $token }}',
      container: '#dropin-container'
    }, function (createErr, instance) {
      button.addEventListener('click', function () {
        instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
          // When the user clicks on the 'Submit payment' button this code will send the
          // encrypted payment information in a variable called a payment method nonce
          $.get({
            url: 'admin/sponsorships/payment',
            data: {'paymentMethodNonce': payload.nonce}
          }).done(function(result) {
            // Tear down the Drop-in UI
            instance.teardown(function (teardownErr) {
              if (teardownErr) {
                console.error('Could not tear down Drop-in UI!');
              } else {
                console.info('Drop-in UI has been torn down!');
                // Remove the 'Submit payment' button
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