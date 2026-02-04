@extends('admin.layouts.app')

@section('title', 'Site Settings')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Site Settings</h4>
</div>

<div class="card">
    <div class="card-body">
        <form id="settingsForm" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Site Name</label>
                        <input type="text" name="site_name" class="form-control" value="{{ $settings['site_name'] ?? '' }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Tagline</label>
                        <input type="text" name="site_tagline" class="form-control" value="{{ $settings['site_tagline'] ?? '' }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Footer Text</label>
                        <textarea name="footer_text" class="form-control" rows="2">{{ $settings['footer_text'] ?? '' }}</textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Primary Color</label>
                                <div class="input-group">
                                    <input type="color" name="primary_color" class="form-control form-control-color" value="{{ $settings['primary_color'] ?? '#e63946' }}">
                                    <input type="text" class="form-control color-input" value="{{ $settings['primary_color'] ?? '#e63946' }}" placeholder="#RRGGBB">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Secondary Color</label>
                                <div class="input-group">
                                    <input type="color" name="secondary_color" class="form-control form-control-color" value="{{ $settings['secondary_color'] ?? '#1d3557' }}">
                                    <input type="text" class="form-control color-input" value="{{ $settings['secondary_color'] ?? '#1d3557' }}" placeholder="#RRGGBB">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Site Logo</label>
                        <input type="hidden" name="remove_site_logo" id="remove_site_logo" value="0">
                        <input type="file" name="site_logo" class="form-control" accept="image/*" id="logoInput">
                            <div class="mt-2" id="logoPreview">
                                @if(isset($settings['site_logo']) && $settings['site_logo'])
                                <div class="d-inline-block text-center" id="currentLogoContainer">
                                    <img src="{{ asset('storage/' . $settings['site_logo']) }}" class="img-fluid rounded d-block mb-2" style="max-height: 100px;">
                                    <button type="button" class="btn btn-danger btn-sm" id="btnRemoveLogo" title="Remove Logo">
                                        <i class="bi bi-trash"></i> Remove
                                    </button>
                                </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Favicon</label>
                            <input type="hidden" name="remove_site_favicon" id="remove_site_favicon" value="0">
                            <input type="file" name="site_favicon" class="form-control" accept="image/*" id="faviconInput">
                            <div class="mt-2" id="faviconPreview">
                                @if(isset($settings['site_favicon']) && $settings['site_favicon'])
                                <div class="d-inline-block text-center" id="currentFaviconContainer">
                                    <img src="{{ asset('storage/' . $settings['site_favicon']) }}" class="rounded d-block mb-2" style="max-height: 32px;">
                                    <button type="button" class="btn btn-danger btn-sm" id="btnRemoveFavicon" title="Remove Favicon">
                                        <i class="bi bi-trash"></i> Remove
                                    </button>
                                </div>
                                @endif
                            </div>
                        </div>
                </div>
            </div>
            
            <hr>
            
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-lg"></i> Save Settings
            </button>
        </form>
    </div>
</div>

@push('scripts')
<script>
    $('#logoInput').on('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#logoPreview').html(`
                    <div class="mt-2 text-center d-inline-block">
                        <img src="${e.target.result}" class="img-fluid rounded d-block mb-2" style="max-height: 100px;">
                        <button type="button" class="btn btn-danger btn-sm" id="btnRemoveLogoPreview">
                            <i class="bi bi-trash"></i> Remove
                        </button>
                    </div>
                `);
            }
            reader.readAsDataURL(file);
            $('#remove_site_logo').val('0');
        }
    });

    $(document).on('click', '#btnRemoveLogo', function() {
        $('#currentLogoContainer').remove();
        $('#remove_site_logo').val('1');
        $('#logoInput').val('');
    });

    $(document).on('click', '#btnRemoveLogoPreview', function() {
        $('#logoPreview').empty();
        $('#logoInput').val('');
    });

    $('#faviconInput').on('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#faviconPreview').html(`
                    <div class="mt-2 text-center d-inline-block">
                        <img src="${e.target.result}" class="rounded d-block mb-2" style="max-height: 32px;">
                        <button type="button" class="btn btn-danger btn-sm" id="btnRemoveFaviconPreview">
                            <i class="bi bi-trash"></i> Remove
                        </button>
                    </div>
                `);
            }
            reader.readAsDataURL(file);
            $('#remove_site_favicon').val('0');
        }
    });

    $(document).on('click', '#btnRemoveFavicon', function() {
        $('#currentFaviconContainer').remove();
        $('#remove_site_favicon').val('1');
        $('#faviconInput').val('');
    });

    $(document).on('click', '#btnRemoveFaviconPreview', function() {
        $('#faviconPreview').empty();
        $('#faviconInput').val('');
    });

    $('input[type="color"]').on('input', function() {
        $(this).next('input').val($(this).val());
    });

    $('.color-input').on('input', function() {
        let hex = $(this).val();
        if (hex.indexOf('#') !== 0) {
            hex = '#' + hex;
        }
        
        // Validate hex color
        if (/^#([0-9A-F]{3}){1,2}$/i.test(hex)) {
            $(this).prev('input[type="color"]').val(hex);
        }
    });

    $('#settingsForm').on('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        formData.append('_method', 'PUT');
        $.ajax({
            url: '{{ route('admin.settings.update') }}',
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
