<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'title' => 'Create Homepage Wireframe',
            'description' => 'Design wireframes for the homepage.',
            'status' => 'To Do',
            'user_id' => 2,
            'project_id' => 1,
            'due_date' => Carbon::now()->addDays(10),
        ]);

        Task::create([
            'title' => 'Build API for Mobile App',
            'description' => 'Develop and integrate API endpoints for mobile features.',
            'status' => 'In Progress',
            'user_id' => 3,
            'project_id' => 2,
            'due_date' => Carbon::now()->addDays(15),
        ]);

        Task::create([
            'title' => 'Optimize Homepage SEO',
            'description' => 'Improve search engine optimization for homepage.',
            'status' => 'Completed',
            'user_id' => 4,
            'project_id' => 3,
            'due_date' => Carbon::now()->addDays(20),
        ]);

        Task::create([
            'title' => 'Backup Database',
            'description' => 'Backup the database before migration.',
            'status' => 'To Do',
            'user_id' => 5,
            'project_id' => 4,
            'due_date' => Carbon::now()->addDays(21),
        ]);

        Task::create([
            'title' => 'Schedule Campaign Launch',
            'description' => 'Plan and schedule the launch of the social media campaign.',
            'status' => 'In Progress',
            'user_id' => 6,
            'project_id' => 5,
            'due_date' => Carbon::now()->addDays(25),
        ]);
    }
}
