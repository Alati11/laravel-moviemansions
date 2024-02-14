@extends('layouts.app')

@section('content')
    <h1>Le visite di {{$building->title}}</h1>
    {{-- <p>{{$monthlyCountsNum}}</p> --}}
    <div class="chart-container mb-5">
        <canvas class="container chart" id="visitsChart"></canvas>
        <p class="chart-des">
            <span>Le visite:</span>
            Il primo numero in alto a sinistra rappresenta il massimo delle visite ricevute negli ultimi 3 giorni.
            Vuoi ricevere più visite? Sponsorizza il tuo appartamento!
        </p>
    </div>

    <div class="chart-container mb-5">
        <p class="chart-des">
            <span>I messaggi:</span>
            Il primo numero in alto a sinistra rappresenta il massimo dei messaggi ricevuti negli ultimi 3 giorni.
            Vuoi ricevere più messaggi? Sponsorizza il tuo appartamento!
        </p>
        <canvas class="container chart" id="msgChart"></canvas>
        
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
                borderWidth: 1
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
                borderWidth: 1
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