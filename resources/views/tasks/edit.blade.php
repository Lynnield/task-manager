@extends('layouts.app')
@section('title', 'Edit Task')
@section('content')
<div class="card">
    <h2>Edit Task</h2>
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
        </div>
        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $task->description) }}</textarea>
        </div>
        <div class="form-group">
            <label class="form-label">
                <input type="hidden" name="is_completed" value="0">
                <input type="checkbox" name="is_completed" value="1" {{ $task->is_completed ? 'checked' : '' }}>
                Mark as Completed
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Update Task</button>
        <a href="{{ route('tasks.index') }}" class="btn" style="background: #ddd; margin-left: 0.5rem;">Cancel</a>
    </form>
</div>
@endsection