@extends('backend.admin.master')
@section('title')
    Dashboard | Admin
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="fa fa-list menu-icon"></i>
                </span> Tasks
            </h3>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary float-end">Create</a>
        </div>
        
        <!-- Filter and Sort Form -->
        <form method="GET" action="{{ route('tasks.index') }}" class="mb-3">
            <div class="row">
                <!-- Status Filter -->
                <div class="col-md-6">
                    <h5>Filter by Status</h5>
                    @foreach(['To Do', 'In Progress', 'Completed'] as $status)
                        <label>
                            <input type="checkbox" name="status[]" value="{{ $status }}" 
                                   {{ in_array($status, $selectedStatuses) ? 'checked' : '' }}>
                            {{ $status }}
                        </label>
                    @endforeach
                </div>
                
                <!-- Sort by Due Date -->
                <div class="col-md-6">
                    <h5>Sort by Due Date</h5>
                    <select name="sort" onchange="this.form.submit()" class="form-select form-select-sm">
                        <option value="asc" {{ $sortOrder == 'asc' ? 'selected' : '' }}>Old Tasks</option>
                        <option value="desc" {{ $sortOrder == 'desc' ? 'selected' : '' }}>New Tasks</option>
                    </select>
                </div>

            </div>
            <button type="submit" class="btn btn-primary mt-2">Apply Filters</button>
        </form>

        <!-- Task Table -->
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
                                <th>Due Date</th>
                                <th>Comments</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
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
                                    <td>{{ $task->due_date }}</td>
                                    <td>
                                        <a href="{{ route('tasks.comments.show', $task->id) }}" class="btn p-0">
                                            <i class="fa fa-wechat (alias)"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('tasks.show', $task->id) }}" class="btn p-0">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn p-0">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn p-0">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> 
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="https://mizanurdev.com/" target="_blank">Md. Mizanur Rahman</a></span>
        </div>
    </footer>
</div>
@endsection
