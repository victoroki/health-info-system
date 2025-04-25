@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{ isset($program) ? 'Edit' : 'Create' }} Health Program</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ isset($program) ? route('programs.update', $program->id) : route('programs.store') }}">
                @csrf
                @if(isset($program)) @method('PUT') @endif

                <div class="mb-3">
                    <label for="name" class="form-label">Program Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="{{ old('name', $program->name ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $program->description ?? '') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i>
                    {{ isset($program) ? 'Update' : 'Save' }} Program
                </button>
            </form>
        </div>
    </div>
@endsection
