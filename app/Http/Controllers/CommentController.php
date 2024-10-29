<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    
     /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $comments = $task->comments()->orderBy('created_at', 'asc')->get();

        return view('backend.admin.comments.show', compact('task', 'comments'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Task $task)
    {
        $request->validate([
            'comment_body' => 'required|string|max:500'
        ]);

        Comment::create([
            'task_id' => $task->id,
            'user_id' => Auth::id(),
            'comment_body' => $request->comment_body,
        ]);

        return redirect()->route('tasks.comments.show', $task->id)
                         ->with('success', 'Comment added successfully');
    }


    public function showUserComment(Task $task)
    {
        // Ensure the logged-in user owns the task
        if ($task->user_id !== Auth::id()) {
            abort(403); // Unauthorized
        }

        // Get comments for the task
        $comments = $task->comments()->orderBy('created_at', 'asc')->get();

        return view('backend.user.comments.show', compact('task', 'comments'));
    }

    /**
     * Store a newly created comment in storage.
     */
    public function storeUserComment(Request $request, Task $task)
    {
        $request->validate([
            'comment_body' => 'required|string|max:500'
        ]);

        // Ensure the logged-in user owns the task
        if ($task->user_id !== Auth::id()) {
            abort(403); // Unauthorized
        }

        // Create the comment
        Comment::create([
            'task_id' => $task->id,
            'user_id' => Auth::id(),
            'comment_body' => $request->comment_body,
        ]);

        return redirect()->route('user.tasks.comments.show', $task->id)
                         ->with('success', 'Comment added successfully');
    }


}
