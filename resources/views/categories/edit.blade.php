@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Category</h1>
    <a href="{{ route('categories.index') }}" class="btn btn-primary">Back to List</a>
    
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Category Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Enabled</option>
                <option value="2" {{ $category->status == 2 ? 'selected' : '' }}>Disabled</option>
            </select>
        </div>
        <div class="form-group">
            <label for="parent_id">Parent Category:</label>
            <select class="form-control" id="parent_id" name="parent_id">
                <option value="">None</option>
                @foreach($categories as $parent)
                    @if ($category->id != $parent->id) <!-- Exclude the category being edited -->
                        <option value="{{ $parent->id }}" {{ $category->parent_id == $parent->id ? 'selected' : '' }}>
                            {{ $parent->getFullPath() }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
