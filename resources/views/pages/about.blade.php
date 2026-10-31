@extends('layout')

@section('title', 'About · Tasks for Today')

@section('content')

    <div class="hero">
        <span class="eyebrow">About</span>
        <h1>About this project</h1>
        <p class="lead">A simple task management system rebuilt in Laravel as part of a laboratory activity.</p>
    </div>

    <div class="card about">

        <div class="dev-box">
            <div class="avatar">Y</div>
            <div>
                <strong>Your Name</strong>
                <span>Developer · Your Course &amp; Section · Your School</span>
            </div>
        </div>

        <div>
            <h3>What is Tasks for Today?</h3>
            <p>
                Tasks for Today is a lightweight task management system that helps users focus on what
                matters now. The home page lists only the tasks scheduled for the current date, while the
                Task List page shows everything in chronological order. This version is a Laravel rebuild
                of the original TSA1 project, using migrations, seeders, Eloquent models, controllers and
                Blade templates.
            </p>
        </div>

        <div>
            <h3>Built with</h3>
            <div class="chips">
                <span class="chip">Laravel</span>
                <span class="chip">PHP</span>
                <span class="chip">Eloquent ORM</span>
                <span class="chip">Blade</span>
                <span class="chip">MySQL / SQLite</span>
            </div>
        </div>

    </div>

@endsection