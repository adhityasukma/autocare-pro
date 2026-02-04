@extends('admin.layouts.app')

@section('title', 'Contact Information')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Contact Information</h4>
</div>

<div class="card">
    <div class="card-body">
        <form id="contactForm">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="mb-3">Contact Details</h6>
                    
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ $contact->address ?? '' }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ $contact->phone ?? '' }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $contact->email ?? '' }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">WhatsApp</label>
                        <input type="text" name="whatsapp" class="form-control" value="{{ $contact->whatsapp ?? '' }}" placeholder="+62xxx">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Working Hours</label>
                        <textarea name="working_hours" class="form-control" rows="3">{{ $contact->working_hours ?? '' }}</textarea>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <h6 class="mb-3">Social Media</h6>
                    
                    <div class="mb-3">
                        <label class="form-label"><i class="bi bi-facebook text-primary"></i> Facebook</label>
                        <input type="url" name="facebook" class="form-control" value="{{ $contact->facebook ?? '' }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label"><i class="bi bi-instagram text-danger"></i> Instagram</label>
                        <input type="url" name="instagram" class="form-control" value="{{ $contact->instagram ?? '' }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label"><i class="bi bi-twitter text-info"></i> Twitter</label>
                        <input type="url" name="twitter" class="form-control" value="{{ $contact->twitter ?? '' }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label"><i class="bi bi-youtube text-danger"></i> YouTube</label>
                        <input type="url" name="youtube" class="form-control" value="{{ $contact->youtube ?? '' }}">
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ ($contact->is_active ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Google Maps Embed Code</label>
                <textarea name="map_embed" class="form-control" rows="3" placeholder="Paste Google Maps embed iframe here">{{ $contact->map_embed ?? '' }}</textarea>
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
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        formData.append('_method', 'PUT');
        $.ajax({
            url: '{{ route('admin.contact.update') }}',
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
                if (errors) showMessage(Object.values(errors)[0][0], 'error');
                else showMessage('An error occurred.', 'error');
            }
        });
    });
</script>
@endpush
@endsection
