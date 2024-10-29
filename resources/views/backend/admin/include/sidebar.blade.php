<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <span class="menu-title">Dashboard</span>
                        <i class="mdi mdi-home menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#customerMenu" aria-expanded="false" aria-controls="customerMenu">
                        <span class="menu-title">Projects</span>
                        <i class="fa fa-list menu-icon"></i>
                    </a>
                    <div class="collapse" id="customerMenu">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('projects.index') }}">All Project</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#categoryMenu" aria-expanded="false" aria-controls="categoryMenu">
                        <span class="menu-title">Tasks</span>
                        <i class="fa fa-list menu-icon"></i>
                    </a>
                    <div class="collapse" id="categoryMenu">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('tasks.index') }}">All Task</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- partial -->