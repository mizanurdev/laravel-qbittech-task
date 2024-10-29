@extends('backend.user.master')
@section('title')
    Dashboard | User
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="fa fa-list menu-icon"></i>
            </span> My Tasks
            </h3>
            <a href="#" onclick="history.back()" class="btn btn-primary float-end">Back</a>
        </div>
        
        @if(session('status'))
            <div class="col-9">
                <div class="alert alert-success">{{ session('status') }}</div>
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
                                <th>Status</th>
                                <th>Due Date</th>
                                <th>Comments</th>
                                <th>View</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->id }}</td>
                                    <td>{{ $task->title }}</td>
                                    <td class="table-description text-wrap">{{ $task->description }}</td>
                                    <td>{{ $task->project->name }}</td>
                                    <td>
                                        <label class="badge {{ $task->status == 'Completed' ? 'badge-success' : ($task->status == 'In Progress' ? 'badge-dark' : 'badge-info') }}">
                                            {{ $task->status }}
                                        </label>
                                    </td>
                                    <td>{{ $task->due_date }}</td>
                                    <td>
                                         <a href="{{ route('user.tasks.comments.show', $task->id) }}" class="btn p-0">
                                            <i class="fa fa-wechat (alias)"></i>
                                        </a>
                                        
                                    </td>
                                    <td>
                                        <a href="{{ route('user.tasks.show', $task->id) }}" class="btn p-0">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td class="status-select">
                                        <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST">
                                            @csrf
                                            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                @if ($task->status == 'To Do')
                                                    <option value="To Do" selected>To Do</option>
                                                    <option value="In Progress">In Progress</option>
                                                    <option value="Completed" disabled>Completed</option>
                                                @elseif ($task->status == 'In Progress')
                                                    <option value="To Do" disabled>To Do</option>
                                                    <option value="In Progress" selected>In Progress</option>
                                                    <option value="Completed">Completed</option>
                                                @elseif ($task->status == 'Completed')
                                                    <option value="To Do" disabled>To Do</option>
                                                    <option value="In Progress" disabled>In Progress</option>
                                                    <option value="Completed" selected>Completed</option>
                                                @endif
                                            </select>
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
