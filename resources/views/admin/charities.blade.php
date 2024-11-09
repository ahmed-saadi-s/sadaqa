@extends('layouts.app')

@section('content')
<style>
    .card {
    transition: transform 0.3s;
}

.card:hover {
    transform: scale(1.05);
}

</style>
<div class="container-fluid py-4">
    <div class="row">
        @foreach($charities as $charity)
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm">
                    @if($charity->image)
                        <img src="{{ asset('images/' . $charity->image) }}" class="card-img-top" alt="{{ $charity->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $charity->name }}</h5>
                        <p class="card-text">{{ Str::limit($charity->description, 100) }}</p>
                        <p class="card-text"><small class="text-muted">{{ $charity->type }}</small></p>
                        <p class="card-text"><small class="text-muted">{{ $charity->location }}</small></p>
                        <a href="{{ route('charities.edit', $charity->id) }}" class="btn btn-primary" style="margin-right: 10px">Edit</a>
                        <form action="{{ route('charities.delete', $charity->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this charity?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
