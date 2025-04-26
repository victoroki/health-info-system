@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Program: {{ $program->name }}</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('programs.update', $program->id) }}">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="name" class="form-label">Program Name</label>
                <input type="text" class="form-control" id="name" name="name" 
                       value="{{ old('name', $program->name) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $program->description) }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Update Program
            </button>
        </form>
    </div>
</div>
@endsection