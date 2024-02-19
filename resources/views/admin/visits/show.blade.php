@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between stats-img align-items-center">
            
            <a href="{{route('admin.buildings.show', $building->id)}}">
                <button class="back-btn-stats mb-5">
                    <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
                    <span>Torna Indietro</span>
                </button>
            </a>
            
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