@extends('backend.admin.master')
@section('title')
    Dashboard | Admin
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper ">
        <div class="page-header">
            <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="fa fa-list menu-icon"></i>
            </span> Task and Comment
            </h3>
            <a href="#" onclick="history.back()" class="btn btn-primary float-end">Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th># ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Project</th>
                            <th>User Info</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->title }}</td>
                                <td class="table-description">{{ $task->description }}</td>
                                <td>{{ $task->project->name }}</td>
                                <td>
                                    <strong>User ID:</strong> {{ $task->user->userId }}<br>
                                    <strong>Name:</strong> {{ $task->user->name }}
                                </td>
                                <td>
                                    <label class="badge {{ $task->status == 'Completed' ? 'badge-success' : ($task->status == 'In Progress' ? 'badge-dark' : 'badge-info') }}">
                                        {{ $task->status }}
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container mt-4">
                    <div class="container chat-container mt-4">
                        <h4 class="text-center mb-4">Task Comments</h4>

                        <!-- Chat Messages -->
                        <div class="chat-box border rounded p-3" style="height: 400px; overflow-y: auto;">
                            @foreach ($comments as $comment)
                                @if ($comment->user->role == 'user')
                                    <!-- Received Message (left-aligned for user) -->
                                    <div class="d-flex flex-row mb-3">
                                        <div class="chat-bubble comment-left">
                                            <p class="mb-0">{{ $comment->comment_body }}</p>
                                            <small class="timestamp">{{ $comment->user->role }} - {{ $comment->created_at->timezone('Asia/Dhaka')->format('Y-m-d h:i A') }}</small>
                                        </div>
                                    </div>
                                @else
                                    <!-- Sent Message (right-aligned for Admin) -->
                                    <div class="d-flex flex-row mb-3 justify-content-end">
                                        <div class="chat-bubble comment-right">
                                            <p class="mb-0">{{ $comment->comment_body }}</p>
                                            <small class="timestamp">{{ $comment->user->role }} - {{ $comment->created_at->timezone('Asia/Dhaka')->format('Y-m-d h:i A') }}</small>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <!-- Chat Input -->
                        <form action="{{ route('tasks.comments.store', $task->id) }}" method="POST">
                            @csrf
                            <div class="chat-footer d-flex align-items-center">
                                <textarea class="form-control me-2" name="comment_body" placeholder="Type a comment..." rows="2" required></textarea>
                                <button class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="https://mizanurdev.com/" target="_blank">Md. Mizanur Rahman</a></span>
        </div>
    </footer>
    <!-- partial -->
</div>
@endsection
