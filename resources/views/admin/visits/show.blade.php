@extends('layouts.app')

@section('content')
    <h1>Le visite di {{$building->title}}</h1>
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

        const todayCount = <?php echo $IPCountToday; ?>;
        const YSCount = <?php echo $IPCountYS; ?>;
        const GG2Count = <?php echo $IPCount2gg; ?>;
        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: ['-2gg', 'ieri', 'oggi'],
            datasets: [{
                label: '# di visite',
                data: [GG2Count, YSCount, todayCount],
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
        const todayMsg = <?php echo $msgCountToday; ?>;
        const YSMsg = <?php echo $msgCountYS; ?>;
        const GG2Msg = <?php echo $msgCount2gg; ?>;
        new Chart(CTX, {
            type: 'bar',
            data: {
            labels: ['-2gg', 'ieri', 'oggi'],
            datasets: [{
                label: '# di messaggi',
                data: [GG2Msg, YSMsg, todayMsg],
                // data: [1, 2, 3],
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