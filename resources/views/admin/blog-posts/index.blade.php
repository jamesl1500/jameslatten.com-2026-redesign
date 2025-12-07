@extends('admin.layout')

@section('page-title', 'Blog Posts')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>All Blog Posts</h2>
        <a href="{{ route('admin.blog-posts.create') }}" class="btn">+ New Blog Post</a>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Status</th>
                <th>Published</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr>
                    <td><strong>{{ $post->title }}</strong></td>
                    <td>{{ $post->author ?? 'N/A' }}</td>
                    <td>
                        @if($post->published)
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge badge-warning">Draft</span>
                        @endif
                    </td>
                    <td>{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Not published' }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.blog-posts.edit', $post->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form method="POST" action="{{ route('admin.blog-posts.destroy', $post->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this blog post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #6b7280;">No blog posts found. Create your first one!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    @if($posts->hasPages())
        <div class="pagination">
            {{ $posts->links() }}
        </div>
    @endif
</div>
@endsection
