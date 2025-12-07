@extends('admin.layout')
@section('page-title', 'Education')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Education</h2>
        <a href="{{ route('admin.education.create') }}" class="btn">+ New Education</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Degree</th>
                <th>Institution</th>
                <th>Period</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($education as $edu)
                <tr>
                    <td><strong>{{ $edu->degree }}</strong><br><small>{{ $edu->field_of_study }}</small></td>
                    <td>{{ $edu->institution }}</td>
                    <td>{{ $edu->start_date->format('Y') }} - {{ $edu->end_date ? $edu->end_date->format('Y') : 'Present' }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.education.edit', $edu->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form method="POST" action="{{ route('admin.education.destroy', $edu->id) }}" style="display: inline;" onsubmit="return confirm('Delete this education?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" style="text-align: center; color: #6b7280;">No education records found.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($education->hasPages())
        <div class="pagination">{{ $education->links() }}</div>
    @endif
</div>
@endsection
