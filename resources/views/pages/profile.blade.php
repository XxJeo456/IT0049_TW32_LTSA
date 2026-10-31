@extends('layout')

@section('title', 'Profile · Tasks for Today')

@section('content')

    <div class="hero">
        <span class="eyebrow">Account</span>
        <h1>Profile</h1>
        <p class="lead">Details of the registered user of this system.</p>
    </div>

    @if ($user)
        <div class="card profile">
            <div class="profile-cover"></div>
            <div class="profile-body">
                <div class="avatar">{{ strtoupper(substr($user->full_name, 0, 1)) }}</div>
                <h2>{{ $user->full_name }}</h2>
                <div class="handle">@{{ $user->username }}</div>

                <div class="info">
                    <div class="info-row">
                        <span class="k">Username</span>
                        <span class="v">{{ $user->username }}</span>
                    </div>
                    <div class="info-row">
                        <span class="k">Full name</span>
                        <span class="v">{{ $user->full_name }}</span>
                    </div>
                    <div class="info-row">
                        <span class="k">Email</span>
                        <span class="v">{{ $user->email }}</span>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="card empty">
            <div class="big">👤</div>
            <p>No user record found. Run <code>php artisan db:seed</code>.</p>
        </div>
    @endif

@endsection