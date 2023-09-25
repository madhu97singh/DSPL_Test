@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Category</h1>
    <a href="{{ route('categories.index') }}" class="btn btn-primary">Back to List</a>
    
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1">Enabled</option>
                <option value="2">Disabled</option>
            </select>
        </div>
        <div class="form-group">
            <label for="parent_id">Parent Category:</label>
            <select class="form-control" id="parent_id" name="parent_id">
                <option value="">None</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->getFullPath() }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
