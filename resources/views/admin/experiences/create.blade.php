@extends('admin.layout')

@section('page-title', 'Create Experience')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Add New Experience</h2>
        <a href="{{ route('admin.experiences.index') }}" class="btn btn-secondary">Back</a>
    </div>
    
    <form method="POST" action="{{ route('admin.experiences.store') }}">
        @csrf
        
        <div class="form-group">
            <label for="title">Job Title *</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        
        <div class="form-group">
            <label for="company">Company *</label>
            <input type="text" id="company" name="company" value="{{ old('company') }}" required>
        </div>
        
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" value="{{ old('location') }}">
        </div>
        
        <div class="form-group">
            <label for="employment_type">Employment Type</label>
            <select id="employment_type" name="employment_type">
                <option value="">Select...</option>
                <option value="Full-time" {{ old('employment_type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                <option value="Part-time" {{ old('employment_type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                <option value="Contract" {{ old('employment_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                <option value="Freelance" {{ old('employment_type') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="start_date">Start Date *</label>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
        </div>
        
        <div class="form-group checkbox-group">
            <input type="checkbox" id="currently_working" name="currently_working" value="1" {{ old('currently_working') ? 'checked' : '' }}>
            <label for="currently_working" style="margin: 0;">Currently Working Here</label>
        </div>
        
        <div class="form-group" id="end_date_group">
            <label for="end_date">End Date</label>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}">
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" style="min-height: 150px;">{{ old('description') }}</textarea>
        </div>
        
        <button type="submit" class="btn">Add Experience</button>
    </form>
</div>

<script>
    document.getElementById('currently_working').addEventListener('change', function() {
        document.getElementById('end_date_group').style.display = this.checked ? 'none' : 'block';
    });
</script>
@endsection
