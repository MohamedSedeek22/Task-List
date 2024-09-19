@extends('layouts.app')

@section('title', 'Task lists')

@section('content')

<div>
  </div>
  <nav class="mb-4">
    <a href="{{ route('tasks.create') }}" class="link">Add Task!</a>

  </nav>

@forelse ($tasks as $task)
<div>      <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
    @class(['line-through' => $task->completed])>{{ $task->title }}</a>
</div>
@empty
<div>No tasks available.</div>
@endforelse

@if ($tasks->count())
<nav>
  {{ $tasks->links() }}
</nav>
@endif

@endsection
