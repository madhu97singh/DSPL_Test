@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Category List</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Parent ID</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->getFullPath() }}</td>
                <td>{{ $category->status == 1 ? 'Enabled' : 'Disabled' }}</td>
                <td>{{ $category->parent_id }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                    <!-- Add a Delete button with a confirmation dialog -->
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
