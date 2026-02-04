@extends('admin.layouts.app')

@section('title', 'Add Testimonial')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Add Testimonial</h4>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form id="testimonialForm" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Position</label>
                                <input type="text" name="position" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Company</label>
                        <input type="text" name="company" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Testimonial <span class="text-danger">*</span></label>
                        <textarea name="content" class="form-control" rows="4" required></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Rating</label>
                                <select name="rating" class="form-select">
                                    @for($i = 5; $i >= 1; $i--)
                                    <option value="{{ $i }}">{{ $i }} Stars</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Order</label>
                                <input type="number" name="order" class="form-control" value="0">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Photo</label>
                        <input type="file" name="image" class="form-control" accept="image/*" id="imageInput">
                        <div class="mt-2" id="imagePreview"></div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr>
            
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Save</button>
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">Cancel</a>
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
                    <div class="mt-2 text-center d-inline-block">
                        <img src="${e.target.result}" class="img-fluid rounded d-block mb-2" style="max-height: 150px;">
                        <button type="button" class="btn btn-danger btn-sm" id="btnRemovePreview">
                            <i class="bi bi-trash"></i> Remove Image
                        </button>
                    </div>
                `);
            }
            reader.readAsDataURL(file);
        }
    });

    $(document).on('click', '#btnRemovePreview', function() {
        $('#imagePreview').empty();
        $('#imageInput').val('');
    });

    $('#testimonialForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route('admin.testimonials.store') }}',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    showMessage(response.message, 'success');
                    setTimeout(() => window.location.href = '{{ route('admin.testimonials.index') }}', 1500);
                }
            },
            error: function(xhr) {
                const errors = xhr.responseJSON?.errors;
                if (errors) showMessage(Object.values(errors)[0][0], 'error');
                else showMessage('An error occurred.', 'error');
            }
        });
    });
</script>
@endpush
@endsection
