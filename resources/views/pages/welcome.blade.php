@extends('layout')

@section('title', 'Welcome · Tasks for Today')

@section('content')

    <div class="hero">
        <span class="eyebrow">{{ now()->format('l, F j, Y') }}</span>
        <h1>Welcome back 👋<br>Here's your day.</h1>
        <p class="lead">Only the tasks scheduled for today are shown here. Stay focused and tick them off one by one.</p>
    </div>

    <div class="stats">
        <div class="card stat">
            <div class="num">{{ $tasks->count() }}</div>
            <div class="lbl">Tasks today</div>
        </div>
        <div class="card stat">
            <div class="num">{{ $tasks->where('status', 'completed')->count() }}</div>
            <div class="lbl">Completed</div>
        </div>
        <div class="card stat">
            <div class="num">{{ $tasks->where('status', '!=', 'completed')->count() }}</div>
            <div class="lbl">Remaining</div>
        </div>
    </div>

    <div class="card">
        @if ($tasks->isEmpty())
            <div class="empty">
                <div class="big">🎉</div>
                <p>No tasks scheduled for today. Enjoy the free time!</p>
            </div>
        @else
            <ul class="task-list">
                @foreach ($tasks as $task)
                    @php
                        $key = in_array($task->status, ['pending', 'completed']) ? $task->status : 'other';
                    @endphp
                    <li class="task {{ $task->status === 'completed' ? 'done' : '' }}">
                        <span class="dot {{ $key }}"></span>
                        <span class="task-title">{{ $task->title }}</span>
                        <span class="badge {{ $key }}">{{ $task->status }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

@endsection