@extends('layouts.app')

@section('content')
<style>
    .card-title {
    font-size: 1.25rem; /* أو الحجم المناسب للعنوان */
}

.card-text {
    font-size: 2rem; /* الحجم الأساسي للنص */
    max-width: 100%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

</style>
<div class="container-fluid py-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Donations</h5>
                    <p class="card-text display-4">{{ number_format($totalDonations, 2) }} Sp</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Charities</h5>
                    <p class="card-text display-4">{{ $charities->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">New Donations (This Month)</h5>
                    <p class="card-text display-4">{{ $charities->where('created_at', '>=', now()->subMonth())->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Donations Over Time</h5>
                    <canvas id="donationsChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Recent Charities</h5>
                    <ul class="list-group list-group-flush">
                        @foreach ($charities->sortByDesc('created_at')->take(5) as $charity)
                            <li class="list-group-item">{{ $charity->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById('donationsChart').getContext('2d');
    var donationsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($donations->pluck('date')) !!},
            datasets: [{
                label: 'Donations',
                data: {!! json_encode($donations->pluck('total')) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return  value + ' SP';
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
