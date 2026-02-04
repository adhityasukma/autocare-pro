@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Dashboard</h4>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
                            <i class="bi bi-gear text-primary fs-4"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Total Services</h6>
                        <h3 class="mb-0">{{ $stats['services'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="bg-success bg-opacity-10 p-3 rounded-circle">
                            <i class="bi bi-chat-quote text-success fs-4"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Testimonials</h6>
                        <h3 class="mb-0">{{ $stats['testimonials'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="bg-info bg-opacity-10 p-3 rounded-circle">
                            <i class="bi bi-images text-info fs-4"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Gallery Items</h6>
                        <h3 class="mb-0">{{ $stats['galleries'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <a href="{{ route('admin.hero.index') }}" class="btn btn-outline-primary w-100 py-3">
                            <i class="bi bi-image d-block fs-4 mb-2"></i>
                            Manage Hero
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.services.index') }}" class="btn btn-outline-primary w-100 py-3">
                            <i class="bi bi-gear d-block fs-4 mb-2"></i>
                            Manage Services
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline-primary w-100 py-3">
                            <i class="bi bi-images d-block fs-4 mb-2"></i>
                            Manage Gallery
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-primary w-100 py-3">
                            <i class="bi bi-sliders d-block fs-4 mb-2"></i>
                            Site Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
