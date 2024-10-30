<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class TaskController extends Controller
{
 
    public function index(Request $request)
{
    // Get sorting order or default to ascending
    $sortOrder = $request->input('sort', 'asc');

    // Get selected statuses or use all possible statuses if none selected
    $selectedStatuses = $request->input('status', ['To Do', 'In Progress', 'Completed']);

    // Build the query with filtering and sorting
    $tasks = Task::with(['user', 'project'])
                 ->whereIn('status', (array) $selectedStatuses) // Casting to array for safety
                 ->orderBy('due_date', $sortOrder)
                 ->get();

    return view('backend.admin.tasks.index', compact('tasks', 'selectedStatuses', 'sortOrder'));
}

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        $users = User::where('role', 'user')->get();
        
        return view('backend.admin.tasks.create', compact('projects', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'due_date' => 'required|date|after:today',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'project_id' => $request->project_id,
            'user_id' => $request->user_id,
            'due_date' => $request->due_date,
            'status' => 'To Do',  // default status
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('backend.admin.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        $projects = Project::all();
        $users = User::all();

        return view('backend.admin.tasks.edit', compact('task', 'projects', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'due_date' => 'required|date|after:today',
        ]);

        $task = Task::findOrFail($id);
        $task->update($request->only(['title', 'description', 'project_id', 'user_id', 'due_date']));

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function userTasks()
    {
        $tasks = Task::where('user_id', auth()->id())->get();
        return view('backend.user.tasks.index', compact('tasks'));
    }

    public function updateStatus(Request $request, Task $task)
    {
        if ($task->user_id == auth()->id()) {
            $task->status = $request->status;
            $task->save();
            return redirect()->back()->with('status', 'Task status updated successfully.');
        }
        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    public function userShowTask(Task $task)
    {
        // Check if the authenticated user is the owner of the task
        if ($task->user_id !== Auth::id()) {
            // Optionally handle unauthorized access
            abort(403, 'Unauthorized action.');
        }

        return view('backend.user.tasks.show', compact('task'));
    }

}
