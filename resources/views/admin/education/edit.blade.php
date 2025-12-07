@extends('admin.layout')
@section('page-title', 'Edit Education')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Edit Education</h2>
        <a href="{{ route('admin.education.index') }}" class="btn btn-secondary">Back</a>
    </div>
    <form method="POST" action="{{ route('admin.education.update', $education->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="degree">Degree *</label>
            <input type="text" id="degree" name="degree" value="{{ old('degree', $education->degree) }}" required>
        </div>
        <div class="form-group">
            <label for="field_of_study">Field of Study</label>
            <input type="text" id="field_of_study" name="field_of_study" value="{{ old('field_of_study', $education->field_of_study) }}">
        </div>
        <div class="form-group">
            <label for="institution">Institution *</label>
            <input type="text" id="institution" name="institution" value="{{ old('institution', $education->institution) }}" required>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" value="{{ old('location', $education->location) }}">
        </div>
        <div class="form-group">
            <label for="start_date">Start Date *</label>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $education->start_date->format('Y-m-d')) }}" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $education->end_date ? $education->end_date->format('Y-m-d') : '') }}">
        </div>
        <div class="form-group">
            <label for="grade">Grade/GPA</label>
            <input type="text" id="grade" name="grade" value="{{ old('grade', $education->grade) }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description">{{ old('description', $education->description) }}</textarea>
        </div>
        <button type="submit" class="btn">Update Education</button>
    </form>
</div>
@endsection
