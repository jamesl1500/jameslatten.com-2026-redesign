@extends('admin.layout')

@section('page-title', 'Edit Experience')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Edit Experience</h2>
        <a href="{{ route('admin.experiences.index') }}" class="btn btn-secondary">Back</a>
    </div>
    
    <form method="POST" action="{{ route('admin.experiences.update', $experience->id) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Job Title *</label>
            <input type="text" id="title" name="title" value="{{ old('title', $experience->title) }}" required>
        </div>
        
        <div class="form-group">
            <label for="company">Company *</label>
            <input type="text" id="company" name="company" value="{{ old('company', $experience->company) }}" required>
        </div>
        
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" value="{{ old('location', $experience->location) }}">
        </div>
        
        <div class="form-group">
            <label for="employment_type">Employment Type</label>
            <select id="employment_type" name="employment_type">
                <option value="">Select...</option>
                <option value="Full-time" {{ old('employment_type', $experience->employment_type) == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                <option value="Part-time" {{ old('employment_type', $experience->employment_type) == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                <option value="Contract" {{ old('employment_type', $experience->employment_type) == 'Contract' ? 'selected' : '' }}>Contract</option>
                <option value="Freelance" {{ old('employment_type', $experience->employment_type) == 'Freelance' ? 'selected' : '' }}>Freelance</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="start_date">Start Date *</label>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $experience->start_date->format('Y-m-d')) }}" required>
        </div>
        
        <div class="form-group checkbox-group">
            <input type="checkbox" id="currently_working" name="currently_working" value="1" {{ old('currently_working', $experience->currently_working) ? 'checked' : '' }}>
            <label for="currently_working" style="margin: 0;">Currently Working Here</label>
        </div>
        
        <div class="form-group" id="end_date_group" style="display: {{ old('currently_working', $experience->currently_working) ? 'none' : 'block' }}">
            <label for="end_date">End Date</label>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $experience->end_date ? $experience->end_date->format('Y-m-d') : '') }}">
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" style="min-height: 150px;">{{ old('description', $experience->description) }}</textarea>
        </div>
        
        <button type="submit" class="btn">Update Experience</button>
    </form>
</div>

<script>
    document.getElementById('currently_working').addEventListener('change', function() {
        document.getElementById('end_date_group').style.display = this.checked ? 'none' : 'block';
    });
</script>
@endsection
