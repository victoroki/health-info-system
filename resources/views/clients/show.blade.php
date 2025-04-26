@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0 text-gray-800">Client Profile</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clients</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $client->name }}</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Edit Client
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Client Details Card -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 font-weight-bold">Full Name:</div>
                        <div class="col-md-8">{{ $client->name }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 font-weight-bold">Email:</div>
                        <div class="col-md-8">{{ $client->email }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 font-weight-bold">Date of Birth:</div>
                        <div class="col-md-8">{{ $client->dob->format('F j, Y') }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 font-weight-bold">Phone:</div>
                        <div class="col-md-8">{{ $client->phone }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 font-weight-bold">Address:</div>
                        <div class="col-md-8">{{ $client->address ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enrolled Programs Card -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Enrolled Health Programs</h6>
                </div>
                <div class="card-body">
                    @if($client->healthPrograms->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Program</th>
                                        <th>Enrollment Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($client->healthPrograms as $program)
                                    <tr>
                                        <td>{{ $program->name }}</td>
                                        <td>
                                            @if($program->pivot->enrollment_date)
                                                {{ \Carbon\Carbon::parse($program->pivot->enrollment_date)->format('M d, Y') }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('clients.programs.detach', [$client->id, $program->id]) }}" 
                                                  method="POST" 
                                                  style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Remove from this program?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">This client is not enrolled in any programs.</div>
                    @endif
                    
                    <!-- Enroll in New Program Form -->
                    <div class="mt-4">
                        <form action="{{ route('clients.programs.attach', $client->id) }}" method="POST">
                            @csrf
                            <div class="form-row align-items-center">
                                <div class="col-md-8">
                                    <select name="program_id" class="form-control" required>
                                        <option value="">Select Program...</option>
                                        @foreach(App\Models\HealthProgram::all() as $program)
                                            <option value="{{ $program->id }}">{{ $program->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fas fa-plus"></i> Enroll
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection