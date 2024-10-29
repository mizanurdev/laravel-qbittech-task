<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function adminDashboard() {
        $totalTasks = Task::count();
        $todoCount = Task::where('status', 'To Do')->count();
        $inProgressCount = Task::where('status', 'In Progress')->count();
        $completedCount = Task::where('status', 'Completed')->count();

        return view('backend.admin.dashboard', compact('totalTasks', 'todoCount', 'inProgressCount', 'completedCount'));
    }
    public function userDashboard() {
        $user = Auth::user(); // Get the currently authenticated user
        $totalTasks = $user->tasks()->count(); // Count tasks for the logged-in user
        $todoCount = $user->tasks()->where('status', 'To Do')->count(); // Count 'To Do' tasks
        $inProgressCount = $user->tasks()->where('status', 'In Progress')->count(); // Count 'In Progress' tasks
        $completedCount = $user->tasks()->where('status', 'Completed')->count(); // Count 'Completed' tasks
    
        return view('backend.user.dashboard', compact('totalTasks', 'todoCount', 'inProgressCount', 'completedCount'));
    }
}
