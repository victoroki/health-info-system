@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Clients</h3>
        <a href="{{ route('clients.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Add Client
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('clients.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" 
                           name="search" 
                           class="form-control" 
                           placeholder="Search clients by name or email..."
                           value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="bi bi-search"></i> Search
                    </button>
                    @if(request('search'))
                        <a href="{{ route('clients.index') }}" class="btn btn-outline-danger">
                            <i class="bi bi-x-lg"></i> Clear
                        </a>
                    @endif
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Programs</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clients as $client)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm me-2">
                                            <span class="avatar-title bg-primary rounded-circle text-white">
                                                {{ substr($client->name, 0, 1) }}
                                            </span>
                                        </div>
                                        <div>
                                            <strong>{{ $client->name }}</strong>
                                            @if($client->phone)
                                                <div class="text-muted small">{{ $client->phone }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $client->email }}</td>
                                <td>
                                    @forelse($client->healthPrograms as $program)
                                        <span class="badge bg-primary bg-opacity-10 text-primary mb-1">
                                            {{ $program->name }}
                                        </span>
                                    @empty
                                        <span class="text-muted small">No programs</span>
                                    @endforelse
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('clients.show', $client->id) }}" 
                                           class="btn btn-sm btn-outline-primary"
                                           data-bs-toggle="tooltip" 
                                           title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        
                                        <a href="{{ route('clients.edit', $client->id) }}" 
                                           class="btn btn-sm btn-outline-secondary"
                                           data-bs-toggle="tooltip" 
                                           title="Edit Client">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        
                                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="tooltip" 
                                                    title="Delete Client"
                                                    onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    <div class="text-muted">No clients found</div>
                                    @if(request('search'))
                                        <a href="{{ route('clients.index') }}" class="btn btn-sm btn-primary mt-2">
                                            Clear search
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($clients->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $clients->withQueryString()->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

@push('styles')
<style>
.avatar-sm {
    width: 36px;
    height: 36px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}
.avatar-title {
    font-weight: bold;
    font-size: 1.1rem;
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            .forEach(function (el) {
                new bootstrap.Tooltip(el);
            });
    });
</script>
@endpush