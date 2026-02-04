@extends('admin.layouts.app')

@section('title', 'Gallery')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Gallery</h4>
    <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Add New
    </a>
</div>

<div class="card">
    <div class="card-body">
        <!-- Toolbar -->
        <div class="row mb-3">
            <div class="col-md-6 d-flex align-items-center gap-2">
                <div id="bulkActions" class="d-none">
                    <button class="btn btn-success btn-sm" onclick="confirmBulkStatus(1)">
                        <i class="bi bi-check-lg"></i> Set Active
                    </button>
                    <button class="btn btn-secondary btn-sm" onclick="confirmBulkStatus(0)">
                        <i class="bi bi-x-lg"></i> Set Inactive
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="confirmBulkDelete()">
                        <i class="bi bi-trash"></i> Delete Selected
                    </button>
                </div>
                
                <div class="input-group input-group-sm" style="width: 150px;">
                    <span class="input-group-text">Show</span>
                    <select class="form-select" onchange="window.location.href = updateQueryStringParameter(window.location.href, 'per_page', this.value)">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="all" {{ request('per_page') == 'all' ? 'selected' : '' }}>All</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <form action="{{ route('admin.galleries.index') }}" method="GET" class="d-flex justify-content-end">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                        @if(request('per_page'))
                        <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                        @endif
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th width="40"><input type="checkbox" class="form-check-input" id="checkAll"></th>
                        <th width="80">Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Order</th>
                        <th width="100">Status</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galleries as $gallery)
                    <tr>
                        <td><input type="checkbox" class="form-check-input check-item" value="{{ $gallery->id }}"></td>
                        <td>
                            @if($gallery->image)
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="" class="rounded" style="width: 60px; height: 40px; object-fit: cover;">
                            @else
                            <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 60px; height: 40px;">
                                <i class="bi bi-image text-muted"></i>
                            </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold">{{ $gallery->title }}</div>
                            <small class="text-muted">{{ Str::limit($gallery->description, 50) }}</small>
                        </td>
                        <td><span class="badge bg-light text-dark">{{ $gallery->category ?? 'Uncategorized' }}</span></td>
                        <td>{{ $gallery->order }}</td>
                        <td>
                            <span class="badge {{ $gallery->is_active ? 'badge-active' : 'badge-inactive' }}">
                                {{ $gallery->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete('{{ route('admin.galleries.destroy', $gallery) }}')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                            No gallery items found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-3">
            @if($galleries instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $galleries->links('pagination::bootstrap-5') }}
            @endif
        </div>
    </div>
</div>

<script>
    // URL Helper
    function updateQueryStringParameter(uri, key, value) {
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re)) {
            return uri.replace(re, '$1' + key + "=" + value + '$2');
        }
        else {
            return uri + separator + key + "=" + value;
        }
    }

    // Bulk Selection Logic
    document.addEventListener('DOMContentLoaded', function() {
        const checkAll = document.getElementById('checkAll');
        const checkItems = document.querySelectorAll('.check-item');
        const bulkActions = document.getElementById('bulkActions');

        function updateBulkButton() {
            const checkedCount = document.querySelectorAll('.check-item:checked').length;
            if (checkedCount > 0) {
                bulkActions.classList.remove('d-none');
            } else {
                bulkActions.classList.add('d-none');
            }
        }

        checkAll.addEventListener('change', function() {
            checkItems.forEach(item => item.checked = this.checked);
            updateBulkButton();
        });

        checkItems.forEach(item => {
            item.addEventListener('change', updateBulkButton);
        });
    });

    // Bulk Delete
    function confirmBulkDelete() {
        showConfirm({
            title: 'Confirm Bulk Delete',
            body: 'Are you sure you want to delete selected items? This cannot be undone.',
            confirmText: 'Delete',
            confirmClass: 'btn-danger',
            callback: function() {
                const ids = Array.from(document.querySelectorAll('.check-item:checked')).map(cb => cb.value);
                $.ajax({
                    url: '{{ route('admin.galleries.bulk_destroy') }}',
                    type: 'DELETE',
                    data: { ids: ids, _token: '{{ csrf_token() }}' },
                    success: function(response) {
                        if (response.success) {
                            showMessage(response.message, 'success');
                            setTimeout(() => window.location.reload(), 1500);
                        }
                    },
                    error: function() { showMessage('Failed to delete selected items.', 'error'); }
                });
            }
        });
    }

    function confirmBulkStatus(status) {
        const action = status ? 'activate' : 'deactivate';
        showConfirm({
            title: 'Confirm Bulk Status',
            body: `Are you sure you want to ${action} selected items?`,
            callback: function() {
                const ids = Array.from(document.querySelectorAll('.check-item:checked')).map(cb => cb.value);
                $.ajax({
                    url: '{{ route('admin.galleries.bulk_status') }}',
                    type: 'POST',
                    data: { ids: ids, status: status, _token: '{{ csrf_token() }}' },
                    success: function(response) {
                        if (response.success) {
                            showMessage(response.message, 'success');
                            setTimeout(() => window.location.reload(), 1000);
                        }
                    },
                    error: function() { showMessage('Failed to update status.', 'error'); }
                });
            }
        });
    }
</script>
@endsection
