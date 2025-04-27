@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Health Programs</h5>
            <a href="{{ route('programs.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Add Program
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Enrolled Clients</th>
                            <th>Client Names</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($programs as $program)
                            <tr>
                                <td>{{ $program->name }}</td>
                                <td>{{ Str::limit($program->description, 50) }}</td>
                                <td>{{ $program->clients_count }}</td>
                                <td>
                                    @if($program->clients->count() > 0)
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" 
                                                    type="button" 
                                                    data-bs-toggle="dropdown">
                                                View Clients ({{ $program->clients->count() }})
                                            </button>
                                            <ul class="dropdown-menu">
                                                @foreach($program->clients as $client)
                                                    <li>
                                                        <a class="dropdown-item" 
                                                        href="{{ route('clients.show', $client->id) }}">
                                                            {{ $client->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @else
                                        <span class="text-muted">No clients</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        <!-- View Button -->
                                        <!-- <a href="{{ route('programs.show', $program->id) }}" 
                                           class="btn btn-sm btn-outline-primary"
                                           data-bs-toggle="tooltip" 
                                           title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </a> -->
                                        
                                        <!-- Edit Button -->
                                        <a href="{{ route('programs.edit', $program->id) }}" 
                                           class="btn btn-sm btn-outline-secondary"
                                           data-bs-toggle="tooltip" 
                                           title="Edit Program">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        

                                        
                                        <!-- Delete Button -->
                                        <form action="{{ route('programs.destroy', $program->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="tooltip" 
                                                    title="Delete Program"
                                                    onclick="return confirm('Are you sure you want to delete this program?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Enable tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
@endpush