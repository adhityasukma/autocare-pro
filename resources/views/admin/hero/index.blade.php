@extends('admin.layouts.app')

@section('title', 'Hero Section')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Hero Section</h4>
    <a href="{{ route('admin.hero.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Add New Slide
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
            </div>
            <div class="col-md-6 text-end">
                <span class="text-muted small">Manage slides for your landing page carousel</span>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th width="40"><input type="checkbox" class="form-check-input" id="checkAll"></th>
                        <th width="60">Order</th>
                        <th width="100">Image</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th width="100">Status</th>
                        <th width="120">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($heroes as $hero)
                    <tr>
                        <td><input type="checkbox" class="form-check-input check-item" value="{{ $hero->id }}"></td>
                        <td>{{ $hero->order }}</td>
                        <td>
                            @if($hero->image)
                            <img src="{{ asset('storage/' . $hero->image) }}" class="rounded" style="width: 80px; height: 50px; object-fit: cover;">
                            @else
                            <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted" style="width: 80px; height: 50px;">
                                <i class="bi bi-image"></i>
                            </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold">{{ $hero->title }}</div>
                        </td>
                        <td>{{ Str::limit($hero->subtitle, 40) }}</td>
                        <td>
                            <span class="badge {{ $hero->is_active ? 'badge-active' : 'badge-inactive' }}">
                                {{ $hero->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.hero.edit', $hero) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete('{{ route('admin.hero.destroy', $hero) }}')" title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No hero slides found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-3">
            @if($heroes instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $heroes->links('pagination::bootstrap-5') }}
            @endif
        </div>
    </div>
</div>

<script>
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

        if (checkAll) {
            checkAll.addEventListener('change', function() {
                checkItems.forEach(item => item.checked = this.checked);
                updateBulkButton();
            });
        }

        checkItems.forEach(item => item.addEventListener('change', updateBulkButton));
    });

    function confirmBulkDelete() {
        showConfirm({
            title: 'Confirm Bulk Delete',
            body: 'Are you sure you want to delete selected items? This cannot be undone.',
            confirmText: 'Delete',
            confirmClass: 'btn-danger',
            callback: function() {
                const ids = Array.from(document.querySelectorAll('.check-item:checked')).map(cb => cb.value);
                $.ajax({
                    url: '{{ route('admin.hero.bulk_destroy') }}',
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
                    url: '{{ route('admin.hero.bulk_status') }}',
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
