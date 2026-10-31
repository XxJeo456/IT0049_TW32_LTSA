<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        // Exactly one user
        User::create([
            'username'  => 'juandc',
            'full_name' => 'Juan Dela Cruz',
            'email'     => 'juan.delacruz@example.com',
        ]);

        $today     = now()->toDateString();
        $yesterday = now()->subDay()->toDateString();
        $tomorrow  = now()->addDay()->toDateString();
        $nextWeek  = now()->addDays(7)->toDateString();

        $tasks = [
            // Yesterday
            ['title' => 'Submit weekly progress report', 'status' => 'completed', 'task_date' => $yesterday],
            ['title' => 'Review lecture slides',          'status' => 'completed', 'task_date' => $yesterday],

            // Today
            ['title' => 'Finish Laravel laboratory activity', 'status' => 'in progress', 'task_date' => $today],
            ['title' => 'Attend group meeting at 2:00 PM',    'status' => 'pending',     'task_date' => $today],
            ['title' => 'Buy groceries',                      'status' => 'pending',     'task_date' => $today],
            ['title' => 'Read 20 pages of a book',            'status' => 'completed',   'task_date' => $today],

            // Tomorrow
            ['title' => 'Prepare presentation slides', 'status' => 'pending', 'task_date' => $tomorrow],
            ['title' => 'Call the dentist',            'status' => 'pending', 'task_date' => $tomorrow],

            // Next week
            ['title' => 'Study for midterm exam', 'status' => 'pending', 'task_date' => $nextWeek],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}