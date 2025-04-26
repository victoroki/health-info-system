@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Client: {{ $client->name }}</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('clients.update', $client->id) }}">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" 
                       value="{{ old('name', $client->name) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" 
                       value="{{ old('email', $client->email) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" 
                       value="{{ old('dob', $client->dob->format('Y-m-d')) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" 
                       value="{{ old('phone', $client->phone) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Health Programs</label>
                <div class="row">
                    @foreach($programs as $program)
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" 
                                       name="programs[]" 
                                       value="{{ $program->id }}" 
                                       id="program{{ $program->id }}"
                                       {{ $client->healthPrograms->contains($program->id) ? 'checked' : '' }}>
                                <label class="form-check-label" for="program{{ $program->id }}">
                                    {{ $program->name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Update Client
            </button>
        </form>
    </div>
</div>
@endsection