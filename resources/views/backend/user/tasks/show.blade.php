@extends('backend.user.master')
@section('title')
    Dashboard | User
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper ">
        <div class="page-header">
            <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="fa fa-list menu-icon"></i>
            </span> Project Details
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
                                <td class="text-wrap">{{ $task->description }}</td>
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
