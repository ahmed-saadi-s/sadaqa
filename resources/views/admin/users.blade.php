@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Nationality</th>
                                <th>Residence</th>
                                <th>Email</th>
                                <th>Verified</th>
                                <th>Admin</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->age }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->nationality }}</td>
                                    <td>{{ $user->residence }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->email_verified_at ? 'Yes' : 'No' }}</td>
                                    <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td>
                                        <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
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
