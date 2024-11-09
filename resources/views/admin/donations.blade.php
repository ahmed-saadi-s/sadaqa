@extends('layouts.app')

@section('content')
<style>
    .btn-delivery {
        border-radius: 20px;
        padding: 5px 15px;
        font-size: 14px;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-delivery:hover {
        opacity: 0.8;
    }

    .btn-success, .btn-danger {
        border: 1px solid transparent;
        box-shadow: none;
    }

    .btn-success {
        background-color: #28a745;
        color: white;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-success:hover {
        background-color: #218838;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333;
        color: white;
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
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">All Donations</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Donation ID</th>
                                <th>User Name</th>
                                <th>Charity Name</th>
                                <th>Amount</th>
                                <th>Donor Name</th>
                                <th>Donor Phone</th>
                                <th>City</th>
                                <th>Donor Address</th>
                                <th>User Delivered ?</th>
                                <th>Site Delivered ?</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donations as $donation)
                                <tr>
                                    <td>{{ $donation->id }}</td>
                                    <td>{{ $donation->user->first_name }} {{ $donation->user->last_name }}</td>
                                    <td>{{ $donation->charity->name }}</td>
                                    <td>{{ number_format($donation->amount, 2) }} SP</td>
                                    <td>{{ $donation->recipient_name }}</td>
                                    <td>{{ $donation->recipient_phone }}</td>
                                    <td>{{ $donation->city }}</td>
                                    <td>{{ $donation->recipient_address }}</td>
                                    <td>
                                        <form action="{{ route('donations.updateDeliveryStatus', $donation->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" name="user_delivered" value="{{ $donation->user_delivered ? 0 : 1 }}" class="btn btn-delivery {{ $donation->user_delivered ? 'btn-success' : 'btn-danger' }}">
                                                {{ $donation->user_delivered ? 'Yes' : 'No' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('donations.updateDeliveryStatus', $donation->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" name="site_delivered" value="{{ $donation->site_delivered ? 0 : 1 }}" class="btn btn-delivery {{ $donation->site_delivered ? 'btn-success' : 'btn-danger' }}">
                                                {{ $donation->site_delivered ? 'Yes' : 'No' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>{{ $donation->created_at->format('Y-m-d H:i:s') }}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
