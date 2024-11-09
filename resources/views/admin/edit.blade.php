@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-8 mb-4 offset-lg-2">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Edit Charity</h5>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('charities.update', $charity->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $charity->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ $charity->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @if($charity->image)
                                <img src="{{ asset('images/' . $charity->image) }}" class="mt-3" alt="{{ $charity->name }}" width="100">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" id="type" name="type" value="{{ $charity->type }}" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ $charity->location }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update Charity</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
