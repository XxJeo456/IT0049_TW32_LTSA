<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;

class PageController extends Controller
{
    public function welcome()
    {
        $tasks = Task::whereDate('task_date', today())
            ->orderBy('id')
            ->get();

        return view('pages.welcome', compact('tasks'));
    }

    public function tasks()
    {
        $tasks = Task::orderBy('task_date')->orderBy('id')->get();

        return view('pages.tasks', compact('tasks'));
    }

    public function profile()
    {
        $user = User::first();

        return view('pages.profile', compact('user'));
    }

    public function about()
    {
        return view('pages.about');
    }
}