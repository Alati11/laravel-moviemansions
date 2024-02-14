@extends('layouts.app')

@section('content')
    <h1>Le visite di {{$building->title}}</h1>
    <div class="mb-5">
        <canvas id="visitsChart"></canvas>
    </div>

    <div>
        <canvas id="msgChart"></canvas>
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