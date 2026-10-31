@extends('layout')

@section('title', 'Task List · Tasks for Today')

@section('content')

    <div class="hero">
        <span class="eyebrow">All tasks</span>
        <h1>Task List</h1>
        <p class="lead">Every task in the system, ordered by date. Today's entries are highlighted.</p>
    </div>

    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Task</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    @php
                        $key = in_array($task->status, ['pending', 'completed']) ? $task->status : 'other';
                    @endphp
                    <tr>
                        <td class="date-cell">
                            {{ $task->task_date->format('M d, Y') }}
                            @if ($task->task_date->isToday())
                                <span class="today-pill">TODAY</span>
                            @endif
                        </td>
                        <td>{{ $task->title }}</td>
                        <td><span class="badge {{ $key }}">{{ $task->status }}</span></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            <div class="empty">
                                <div class="big">📭</div>
                                <p>No tasks found.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection