@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-4">
        <h3>Clients</h3>
        <a href="{{ route('clients.create') }}" class="btn btn-primary">Add Client</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('clients.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search clients...">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Programs</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>
                            @foreach($client->healthPrograms as $program)
                                <span class="badge bg-info">{{ $program->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-sm btn-info">View</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
