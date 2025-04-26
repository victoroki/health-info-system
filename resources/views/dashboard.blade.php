@extends('layouts.app')

@section('content')
@php use App\Models\Client; @endphp
<div class="container-fluid px-4">
    <h1 class="mt-4">Health System Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">System Overview</li>
    </ol>

    <!-- Stats Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fw-normal">Total Clients</h6>
                            <h2 class="mb-0">{{ $stats['total_clients'] }}</h2>
                        </div>
                        <i class="bi bi-people-fill fs-1"></i>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('clients.index') }}">View Details</a>
                    <div class="small text-white"><i class="bi bi-chevron-right"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fw-normal">Health Programs</h6>
                            <h2 class="mb-0">{{ $stats['total_programs'] }}</h2>
                        </div>
                        <i class="bi bi-clipboard2-pulse fs-1"></i>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('programs.index') }}">View Details</a>
                    <div class="small text-white"><i class="bi bi-chevron-right"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fw-normal">Active Enrollments</h6>
                            <h2 class="mb-0">{{ $stats['program_distribution']->sum('clients_count') }}</h2>
                        </div>
                        <i class="bi bi-clipboard2-check fs-1"></i>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Reports</a>
                    <div class="small text-white"><i class="bi bi-chevron-right"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fw-normal">Today's Registrations</h6>
                            <h2 class="mb-0">{{ Client::whereDate('created_at', today())->count() }}</h2>
                        </div>
                        <i class="bi bi-person-plus fs-1"></i>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('clients.create') }}">Add New</a>
                    <div class="small text-white"><i class="bi bi-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Data Section -->
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-white">
                    <i class="bi bi-bar-chart me-1"></i>
                    Program Enrollment Distribution
                </div>
                <div class="card-body">
                    <div style="height: 300px">
                        <canvas id="programChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-white">
                    <i class="bi bi-people me-1"></i>
                    Recent Client Registrations
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Programs</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stats['recent_clients'] as $client)
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>
                                        @foreach($client->healthPrograms as $program)
                                            <span class="badge bg-primary me-1">{{ $program->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $client->created_at->format('M d') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-white">
                    <i class="bi bi-lightning me-1"></i>
                    Quick Actions
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('clients.create') }}" class="btn btn-primary w-100 py-3">
                                <i class="bi bi-person-plus fs-4 d-block mb-2"></i>
                                Add Client
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('programs.create') }}" class="btn btn-success w-100 py-3">
                                <i class="bi bi-clipboard-plus fs-4 d-block mb-2"></i>
                                Create Program
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="#" class="btn btn-info w-100 py-3">
                                <i class="bi bi-graph-up fs-4 d-block mb-2"></i>
                                Generate Report
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js for Program Distribution -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('programChart').getContext('2d');
        const programs = @json($stats['program_distribution']);
        
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: programs.map(program => program.name),
                datasets: [{
                    data: programs.map(program => program.clients_count),
                    backgroundColor: [
                        '#4e73df',
                        '#1cc88a',
                        '#36b9cc',
                        '#f6c23e',
                        '#e74a3b',
                        '#858796'
                    ],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right'
                    }
                }
            }
        });
    });
</script>
@endsection