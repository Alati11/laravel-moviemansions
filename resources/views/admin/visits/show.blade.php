@extends('layouts.app')

@section('content')
    <h1>Le visite di {{$building->title}}</h1>
    <p>{{$IPCountToday}}</p>
    <div>
        <canvas id="myChart"></canvas>
      </div>
    @foreach ($visits as $visit)
        <p>{{$visit->ip_address}}</p>
        <p>{{$visit->time}}</p>
    @endforeach
    <script>
        const ctx = document.getElementById('myChart');

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
</script>
    </script>
@endsection