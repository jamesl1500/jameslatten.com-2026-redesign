@extends('admin.layout')
@section('page-title', 'Certificates')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Certificates</h2>
        <a href="{{ route('admin.certificates.create') }}" class="btn">+ New Certificate</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Issuer</th>
                <th>Issue Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($certificates as $cert)
                <tr>
                    <td><strong>{{ $cert->name }}</strong></td>
                    <td>{{ $cert->issuer }}</td>
                    <td>{{ $cert->issue_date->format('M Y') }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.certificates.edit', $cert->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form method="POST" action="{{ route('admin.certificates.destroy', $cert->id) }}" style="display: inline;" onsubmit="return confirm('Delete this certificate?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" style="text-align: center; color: #6b7280;">No certificates found.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($certificates->hasPages())
        <div class="pagination">{{ $certificates->links() }}</div>
    @endif
</div>
@endsection
