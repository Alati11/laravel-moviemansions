@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-end stats-img">
            <div class="d-flex flex-column align-items-center">
                <img src="{{Vite::asset('resources/img/icons/coin-up.png')}}" alt="">
            <p>
                <small class="color-green chart-title">Le statistiche di {{$building->title}}</small>
            </p>
            </div>
        </div>
    </div>
    
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
            <span class="add-sponsorship"><a href="{{ route('admin.sponsorships.index', ['building_id' => $building->id]) }}">Sponsorizza il tuo appartamento!</a></span>
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