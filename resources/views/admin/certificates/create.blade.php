@extends('admin.layout')
@section('page-title', 'Create Certificate')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Add Certificate</h2>
        <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">Back</a>
    </div>
    <form method="POST" action="{{ route('admin.certificates.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Certificate Name *</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="issuer">Issuing Organization *</label>
            <input type="text" id="issuer" name="issuer" value="{{ old('issuer') }}" required>
        </div>
        <div class="form-group">
            <label for="credential_id">Credential ID</label>
            <input type="text" id="credential_id" name="credential_id" value="{{ old('credential_id') }}">
        </div>
        <div class="form-group">
            <label for="credential_url">Credential URL</label>
            <input type="url" id="credential_url" name="credential_url" value="{{ old('credential_url') }}">
        </div>
        <div class="form-group">
            <label for="issue_date">Issue Date *</label>
            <input type="date" id="issue_date" name="issue_date" value="{{ old('issue_date') }}" required>
        </div>
        <div class="form-group">
            <label for="expiry_date">Expiry Date</label>
            <input type="date" id="expiry_date" name="expiry_date" value="{{ old('expiry_date') }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn">Add Certificate</button>
    </form>
</div>
@endsection
