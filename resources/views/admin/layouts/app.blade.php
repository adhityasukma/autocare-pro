<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - AutoCare Pro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #e63946;
            --secondary-color: #1d3557;
            --sidebar-width: 260px;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(180deg, var(--secondary-color) 0%, #0d1b2a 100%);
            z-index: 1000;
            transition: transform 0.3s ease;
        }
        
        .sidebar-brand {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-brand h4 {
            color: #fff;
            margin: 0;
            font-weight: 700;
        }
        
        .sidebar-brand span {
            color: var(--primary-color);
        }
        
        .sidebar-nav {
            padding: 1rem 0;
        }
        
        .nav-item {
            margin: 0.25rem 0.75rem;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 0.75rem 1rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover, .nav-link.active {
            color: #fff;
            background-color: rgba(255,255,255,0.1);
        }
        
        .nav-link.active {
            background-color: var(--primary-color);
        }
        
        .nav-link i {
            font-size: 1.1rem;
        }
        
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .top-navbar {
            background: #fff;
            padding: 1rem 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .content-wrapper {
            padding: 1.5rem;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .card-header {
            background: transparent;
            border-bottom: 1px solid #eee;
            padding: 1rem 1.25rem;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #c5303c;
            border-color: #c5303c;
        }
        
        .table th {
            font-weight: 600;
            color: var(--secondary-color);
        }
        
        .badge-active {
            background-color: #198754;
        }
        
        .badge-inactive {
            background-color: #6c757d;
        }
        
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
        }
        
        /* Modal Styles */
        .modal-content {
            border: none;
            border-radius: 12px;
        }
        
        .modal-header {
            border-bottom: 1px solid #eee;
        }
        
        .modal-footer {
            border-top: 1px solid #eee;
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <h4><span>Auto</span>Care Pro</h4>
        </div>
        <div class="sidebar-nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.hero.*') ? 'active' : '' }}" href="{{ route('admin.hero.index') }}">
                        <i class="bi bi-image"></i> Hero Section
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">
                        <i class="bi bi-gear"></i> Services
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}" href="{{ route('admin.about.index') }}">
                        <i class="bi bi-info-circle"></i> About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.features.*') ? 'active' : '' }}" href="{{ route('admin.features.index') }}">
                        <i class="bi bi-star"></i> Features
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}" href="{{ route('admin.testimonials.index') }}">
                        <i class="bi bi-chat-quote"></i> Testimonials
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}" href="{{ route('admin.galleries.index') }}">
                        <i class="bi bi-images"></i> Gallery
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}" href="{{ route('admin.contact.index') }}">
                        <i class="bi bi-telephone"></i> Contact
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.index') }}">
                        <i class="bi bi-sliders"></i> Settings
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <nav class="top-navbar">
            <button class="btn btn-link d-lg-none" id="sidebarToggle">
                <i class="bi bi-list fs-4"></i>
            </button>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('landing') }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-eye"></i> View Site
                </a>
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle text-dark text-decoration-none" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle fs-5"></i> {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content-wrapper flex-grow-1">
            @yield('content')
        </div>

        <footer class="py-3 text-center border-top bg-white">
            <span class="text-muted small">&copy; {{ date('Y') }} AutoCare Pro Admin By Adhitya Sukma. All rights reserved.</span>
        </footer>
    </div>

    <!-- Message Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalTitle">Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="messageModalBody"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Generic Confirmation Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalTitle">Confirm Action</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="confirmModalBody">Are you sure you want to proceed?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="confirmModalCancelBtn">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmModalConfirmBtn">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Sidebar toggle
        $('#sidebarToggle').on('click', function() {
            $('#sidebar').toggleClass('show');
        });

        // Show message modal (Replacement for alert)
        function showMessage(message, type = 'success') {
            const modal = new bootstrap.Modal(document.getElementById('messageModal'));
            const title = type === 'success' ? 'Success' : 'Error';
            const iconClass = type === 'success' ? 'bi-check-circle text-success' : 'bi-x-circle text-danger';
            
            $('#messageModalTitle').html('<i class="bi ' + iconClass + ' me-2"></i>' + title);
            $('#messageModalBody').text(message);
            modal.show();
        }

        // Generic Confirmation function (Replacement for confirm)
        function showConfirm(options) {
            const defaults = {
                title: 'Confirm Action',
                body: 'Are you sure you want to proceed?',
                confirmText: 'Confirm',
                cancelText: 'Cancel',
                confirmClass: 'btn-primary',
                callback: function() {}
            };
            const settings = $.extend({}, defaults, options);
            
            $('#confirmModalTitle').text(settings.title);
            $('#confirmModalBody').text(settings.body);
            $('#confirmModalConfirmBtn').text(settings.confirmText).attr('class', 'btn ' + settings.confirmClass);
            $('#confirmModalCancelBtn').text(settings.cancelText);
            
            const modalElement = document.getElementById('confirmModal');
            const modal = new bootstrap.Modal(modalElement);
            
            // Remove previous event listeners
            $('#confirmModalConfirmBtn').off('click');
            
            $('#confirmModalConfirmBtn').on('click', function() {
                modal.hide();
                settings.callback();
            });
            
            modal.show();
        }

        // Delete confirmation
        let deleteUrl = '';
        function confirmDelete(url) {
            showConfirm({
                title: 'Confirm Delete',
                body: 'Are you sure you want to delete this item? This action cannot be undone.',
                confirmText: 'Delete',
                confirmClass: 'btn-danger',
                callback: function() {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        success: function(response) {
                            if (response.success) {
                                showMessage(response.message, 'success');
                                setTimeout(() => location.reload(), 1500);
                            }
                        },
                        error: function(xhr) {
                            showMessage('An error occurred. Please try again.', 'error');
                        }
                    });
                }
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
