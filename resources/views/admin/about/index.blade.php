@extends('admin.layouts.app')

@section('title', 'About Section')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">About Section</h4>
</div>

<div class="card">
    <div class="card-body">
        <form id="aboutForm" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="{{ $about->title ?? '' }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Short Description</label>
                        <input type="text" name="description" class="form-control" value="{{ $about->description ?? '' }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea name="content" class="form-control" rows="5">{{ $about->content ?? '' }}</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Video URL</label>
                        <input type="text" name="video_url" class="form-control" value="{{ $about->video_url ?? '' }}" placeholder="https://youtube.com/...">
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Years of Experience</label>
                                <input type="number" name="experience_years" class="form-control" value="{{ $about->experience_years ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Happy Customers</label>
                                <input type="number" name="happy_customers" class="form-control" value="{{ $about->happy_customers ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Projects Completed</label>
                                <input type="number" name="projects_completed" class="form-control" value="{{ $about->projects_completed ?? '' }}">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="hidden" name="remove_image" id="remove_image" value="0">
                        <input type="file" name="image" class="form-control" accept="image/*" id="imageInput">
                        <div class="mt-2" id="imagePreview">
                            @if($about && $about->image)
                            <div class="mt-2">
                                <div class="d-inline-block text-center" id="currentImageContainer">
                                    <img src="{{ asset('storage/' . $about->image) }}" class="img-fluid rounded d-block mb-2" style="max-height: 200px;">
                                    <button type="button" class="btn btn-danger btn-sm" id="btnRemoveImage" title="Remove Image">
                                        <i class="bi bi-trash"></i> Remove
                                    </button>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ ($about->is_active ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr>
            
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-lg"></i> Save Changes
            </button>
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
                        <img src="${e.target.result}" class="img-fluid rounded d-block mb-2" style="max-height: 200px;">
                        <button type="button" class="btn btn-danger btn-sm" id="btnRemovePreview">
                            <i class="bi bi-trash"></i> Remove Image
                        </button>
                    </div>
                `);
            }
            reader.readAsDataURL(file);
            $('#remove_image').val('0'); // Reset remove flag if new image selected
        }
    });

    $(document).on('click', '#btnRemoveImage', function() {
        $('#currentImageContainer').remove();
        $('#remove_image').val('1');
        $('#imageInput').val(''); // Clear file input
    });

    $(document).on('click', '#btnRemovePreview', function() {
        $('#imagePreview').empty();
        $('#imageInput').val('');
    });

    $('#aboutForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        formData.append('_method', 'PUT');
        
        $.ajax({
            url: '{{ route('admin.about.update') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    showMessage(response.message, 'success');
                }
            },
            error: function(xhr) {
                const errors = xhr.responseJSON?.errors;
                if (errors) {
                    const firstError = Object.values(errors)[0][0];
                    showMessage(firstError, 'error');
                } else {
                    showMessage('An error occurred. Please try again.', 'error');
                }
            }
        });
    });
</script>
@endpush
@endsection
