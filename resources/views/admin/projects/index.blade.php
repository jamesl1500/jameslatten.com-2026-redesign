@extends('admin.layout')

@section('page-title', 'Projects')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>All Projects</h2>
        <a href="{{ route('admin.projects.create') }}" class="btn">+ New Project</a>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Featured</th>
                <th>Published</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
                <tr>
                    <td><strong>{{ $project->emoji }} {{ $project->title }}</strong></td>
                    <td>{{ $project->category ?? 'N/A' }}</td>
                    <td>{{ $project->status ?? 'completed' }}</td>
                    <td>
                        @if($project->is_featured)
                            <span class="badge badge-success">Yes</span>
                        @else
                            <span class="badge badge-warning">No</span>
                        @endif
                    </td>
                    <td>
                        @if($project->is_published)
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge badge-danger">Unpublished</span>
                        @endif
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form method="POST" action="{{ route('admin.projects.destroy', $project->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: #6b7280;">No projects found. Create your first one!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    @if($projects->hasPages())
        <div class="pagination">
            {{ $projects->links() }}
        </div>
    @endif
</div>
@endsection
