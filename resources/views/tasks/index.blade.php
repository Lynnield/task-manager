@extends('layouts.app')
@section('title', 'My Tasks')
@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h1>My Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Add Task</a>
</div>

<div class="card">
    @if($tasks->count() > 0)
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>
                    <strong>{{ $task->title }}</strong>
                    @if($task->description)
                    <div style="font-size: 0.9em; color: #777;">{{ Str::limit($task->description, 50) }}</div>
                    @endif
                </td>
                <td>
                    <form action="{{ route('tasks.update', $task) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="title" value="{{ $task->title }}">
                        <input type="hidden" name="is_completed" value="{{ $task->is_completed ? 0 : 1 }}">
                        <button type="submit" class="btn {{ $task->is_completed ? 'btn-success' : 'btn-secondary' }}" style="padding: 0.3rem 0.6rem; font-size: 0.8rem;">
                            {{ $task->is_completed ? 'Completed' : 'Pending' }}
                        </button>
                    </form>
                </td>
                <td class="actions">
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary" style="padding: 0.4rem 0.8rem;">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="padding: 0.4rem 0.8rem;">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top: 1rem;">
        {{ $tasks->links() }}
    </div>
    @else
    <p>No tasks found. Create one to get started!</p>
    @endif
</div>
@endsection