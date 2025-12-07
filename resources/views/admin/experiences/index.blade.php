@extends('admin.layout')

@section('page-title', 'Experience')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Work Experience</h2>
        <a href="{{ route('admin.experiences.create') }}" class="btn">+ New Experience</a>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Company</th>
                <th>Period</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($experiences as $experience)
                <tr>
                    <td><strong>{{ $experience->title }}</strong></td>
                    <td>{{ $experience->company }}</td>
                    <td>
                        {{ $experience->start_date->format('M Y') }} - 
                        {{ $experience->currently_working ? 'Present' : $experience->end_date->format('M Y') }}
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.experiences.edit', $experience->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form method="POST" action="{{ route('admin.experiences.destroy', $experience->id) }}" style="display: inline;" onsubmit="return confirm('Delete this experience?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: #6b7280;">No experiences found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    @if($experiences->hasPages())
        <div class="pagination">
            {{ $experiences->links() }}
        </div>
    @endif
</div>
@endsection
