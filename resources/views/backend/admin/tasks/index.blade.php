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
            </span> Tasks
            </h3>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary float-end">Create</a>
        </div>
        @if(session('success'))
            <!-- <div class="row"> -->
                <div class="col-9">
                    <div class="alert alert-success">{{ session('success') }}</div>
                <!-- </div> -->
            </div>
        @endif
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
