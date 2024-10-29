@extends('backend.admin.master')
@section('title')
    Edit Task | Admin
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="fa fa-list menu-icon"></i>
                </span> Edit Task
            </h3>
            <a href="#" onclick="history.back()" class="btn btn-primary float-end">Back</a>
        </div>
        <div class="card">
          <div class="card-body">
            <form class="forms-sample" method="POST" action="{{ route('tasks.update', $task->id) }}">
              @csrf
              @method('PUT')
              
              <div class="form-group">
                <label for="taskName">Task Name</label>
                <input type="text" class="form-control" id="taskName" name="title" value="{{ old('title', $task->title) }}" required>
              </div>
              
              <div class="form-group">
                <label for="taskDescription">Task Description</label>
                <textarea class="form-control" id="taskDescription" name="description" rows="5" required>{{ old('description', $task->description) }}</textarea>
              </div>
              
              <div class="form-group">
                <label for="project">Project</label>
                <select class="form-select" id="project" name="project_id" required>
                  <option value="">-- Select Project --</option>
                  @foreach ($projects as $project)
                      <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                          {{ $project->name }}
                      </option>
                  @endforeach
                </select>
              </div>
              
              <div class="form-group">
                <label for="user">User</label>
                <select class="form-select" id="user" name="user_id" required>
                  <option value="">-- Select User --</option>
                  @foreach ($users as $user)
                      <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                          {{ $user->userId }} | {{ $user->name }}
                      </option>
                  @endforeach
                </select>
              </div>
              
              <div class="form-group">
                <label for="dueDate">Due Date</label>
                <input type="date" class="form-control" id="dueDate" name="due_date" value="{{ old('due_date', $task->due_date) }}" required>
              </div>
              
              <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
            </form>
          </div>
        </div>
    </div>
    
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="https://mizanurdev.com/" target="_blank">Md. Mizanur Rahman</a></span>
        </div>
    </footer>
</div>
@endsection
