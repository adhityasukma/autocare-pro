@extends('admin.layouts.app')

@section('title', 'Edit Hero Slide')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Edit Hero Slide</h4>
    <a href="{{ route('admin.hero.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form id="heroForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="{{ $hero->title }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ $hero->subtitle }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ $hero->description }}</textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Button Text</label>
                                <input type="text" name="button_text" class="form-control" value="{{ $hero->button_text }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Button Link</label>
                                <input type="text" name="button_link" class="form-control" value="{{ $hero->button_link }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Slide Image</label>
                                <input type="file" name="image" class="form-control" accept="image/*" id="imageInput">
                                <input type="hidden" name="remove_image" id="remove_image" value="0">
                                
                                <div class="mt-2" id="imagePreview">
                                    @if($hero->image)
                                    <div class="position-relative d-inline-block">
                                        <img src="{{ asset('storage/' . $hero->image) }}" class="img-fluid rounded" style="max-height: 200px;">
                                        <div class="mt-2 text-center">
                                            <button type="button" class="btn btn-danger btn-sm" id="btnRemoveImage">
                                                <i class="bi bi-trash"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Order</label>
                                <input type="number" name="order" class="form-control" value="{{ $hero->order }}">
                                <small class="text-muted">Display priority in carousel</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ $hero->is_active ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active Slide</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr>
            
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Update Slide</button>
                <a href="{{ route('admin.hero.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    $('#imageInput').on('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').html(`
                    <div class="mt-2 text-center d-inline-block position-relative">
                        <img src="${e.target.result}" class="img-fluid rounded d-block mb-2" style="max-height: 200px;">
                        <button type="button" class="btn btn-danger btn-sm" id="btnRemovePreview">
                            <i class="bi bi-trash"></i> Remove
                        </button>
                    </div>
                `);
                $('#remove_image').val('0');
            }
            reader.readAsDataURL(file);
        }
    });

    $(document).on('click', '#btnRemovePreview', function() {
        $('#imagePreview').empty();
        $('#imageInput').val('');
    });

    $(document).on('click', '#btnRemoveImage', function() {
        $('#imagePreview').empty();
        $('#imageInput').val('');
        $('#remove_image').val('1');
    });

    $('#heroForm').on('submit', function(e) {
        e.preventDefault();
        const btn = $(this).find('button[type="submit"]');
        btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Updating...');
        
        $.ajax({
            url: '{{ route('admin.hero.update', $hero) }}',
            type: 'POST', // Spoofed to PUT via method field
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    showMessage(response.message, 'success');
                    setTimeout(() => window.location.href = '{{ route('admin.hero.index') }}', 1500);
                }
            },
            error: function(xhr) {
                btn.prop('disabled', false).html('<i class="bi bi-check-lg"></i> Update Slide');
                const errors = xhr.responseJSON?.errors;
                if (errors) showMessage(Object.values(errors)[0][0], 'error');
                else showMessage('An error occurred during update.', 'error');
            }
        });
    });
</script>
@endpush
@endsection
