@extends('layouts.app')

@section('content')
    <h2 class="chart-title">Le statistiche di {{$building->title}}</h2>
    {{-- <p>{{$monthlyCountsNum}}</p> --}}
    <div class="chart-container mb-5">
        <canvas class=" chart" id="visitsChart"></canvas>
        <div class="chart-des">
            <span>Vuoi ricevere più visite? </span>
            <img src="{{Vite::asset('resources/img/icons/chart-up.png')}}" alt="">
        </div>
    </div>

    <div class="chart-container mb-5">
        <div class="chart-des">
            <img src="{{Vite::asset('resources/img/icons/coin-up.png')}}" alt="">
            <span>Sponsorizza il tuo appartamento!</span>
        </div>
        <canvas class="chart" id="msgChart"></canvas>
        
    </div>

    <script>
        const ctx = document.getElementById('visitsChart');
        const arrayNum = <?php echo json_encode($monthlyCountsNum); ?>;
        const arrayMsg = <?php echo json_encode($monthlyMsgNum); ?>;
        
        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: [ 'Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre' ,'Ottobre', 'Novembre', 'Dicembre'],
            datasets: [{
                label: '# di visite',
                data: arrayNum,
                borderWidth: 1,
                borderColor: '#174447',
                backgroundColor: '#5a8d8153'
                }]
            },
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        });

        const CTX = document.getElementById('msgChart');
        new Chart(CTX, {
            type: 'bar',
            data: {
            labels: [ 'Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre' ,'Ottobre', 'Novembre', 'Dicembre'],
            datasets: [{
                label: '# di messaggi',
                data: arrayMsg,
                borderWidth: 1,
                borderColor: '#174447',
                backgroundColor: '#5a8d8153'
                }]
            },
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        });
</script>
    </script>
@endsection