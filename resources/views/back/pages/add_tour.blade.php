@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Add Tour</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Add tour
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{ route('admin.tours') }}" class="btn btn-primary">View all tours</a>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.create_tour') }}" method="POST" autocomplete="off" enctype="multipart/form-data"
        id="addPostForm">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-box mb-2">
                    <div class="card-body">
                        <div class="form-group">
                            <label for=""><b>Title</b>:</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter tour title">
                            <span class="text-danger error-text title_error"></span>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Description</b>:</label>
                            <textarea name="description" cols="30" rows="10" class="form-control"
                                placeholder="Enter tour description here"></textarea>
                            <span class="text-danger error-text description_error"></span>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Overview</b>:</label>
                            <textarea name="overview" id="overview" cols="30" rows="10" class="ckeditor form-control"
                                placeholder="Enter post overview here"></textarea>
                            <span class="text-danger error-text overview_error"></span>

                        </div>

                    </div>
                </div>
                <div class="card card-box mb-2">
                    <div class="card-header weight-500">
                        Itinerary List</div>
                    <div class="card-body">
                        <div class="form-group">
    <label><b>Itinerary</b>:</label>

    <div id="itinerary_container"></div>

    <button type="button" id="add_itinerary" class="btn btn-primary mt-2">
        + Add Itinerary
    </button>
</div>
                    </div>
                </div>
                <div class="card card-box mb-2">
                    <div class="card-header weight-500">SEO</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for=""><b>Tour meta key words</b>:<small>(Separated by comma.)</small></label>
                            <input type="text" class="form-control" name="meta_keywords"
                                placeholder="Enter tour meta keywords">
                        </div>
                        <div class="form-group">
                            <label for=""><b>Tour meta description</b>:</label>
                            <textarea name="meta_description" class="form-control" id="" cols="30" rows="10"
                                placeholder="Enter tour meta description.."></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-box mb-2">
                    <div class="card-body">
                        <div class="form-group">
                            <label for=""><b>Tour category</b>:</label>
                            <select name="category" id="" class="custom-select form-control">
                                <option value="">Choose...</option>
                                {!! $categories_html !!}
                            </select>
                            <span class="text-danger error-text category_error"></span>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Tour featured image</b>:</label>
                            <input type="file" name="featured_image" class="form-control-file form-control"
                                height="auto">
                            <span class="text-danger error-text featured_image_error"></span>
                        </div>
                        <div class="d-block mb-3" style="max-width: 250px;">
                            <img src="" alt="" class="img-thumbnail" id="featured_image_preview"
                                data-ijabo-default-img="">
                        </div>
                        <div class="form-group">
                            <label for=""><b>Tags</b>:</label>
                            <input type="text" class="form-control" name="tags" data-role='tagsinput'>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for=""><b>Visibility</b>:</label>
                            <div class="custom-control custom-radio mb-5">
                                <input type="radio" name="visibility" id="customRadio1" class="custom-control-input"
                                    value="1" checked>
                                <label for="customRadio1" class="custom-control-label">Public</label>
                            </div>
                            <div class="custom-control custom-radio mb-5">
                                <input type="radio" name="visibility" id="customRadio2" class="custom-control-input"
                                    value="0">
                                <label for="customRadio2" class="custom-control-label">Private</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Create Tour</button>
        </div>
    </form>
@endsection
@push('stylesheets')
    {{-- For tags presentational --}}
    <link rel="stylesheet" href="{{ asset('back/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
@endpush

@push('scripts')
    {{-- For tags interactivity --}}
    <script src="{{ asset('back/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('ckeditor4-4.22.1/ckeditor.js') }}"></script>
    <script>
        $('input[type="file"][name="featured_image"]').ijaboViewer({
            preview: 'img#featured_image_preview',
            imageShape: 'rectangular',
            allowedExtensions: ['jpeg', 'jpg', 'png'],
            onErrorShape: function(message, element) {
                alert(message);
            },
            onInvalidType: function(message, element) {
                alert(message);
            },
            onSuccess: function(message, element) {}
        });

        // Adding Itenerary List
      let itineraryIndex = 0;

$('#add_itinerary').on('click', function () {

    let lastContent = $('.itinerary-item textarea').last().val();

    if (lastContent !== undefined && lastContent.trim() === '') {
        alert('Please fill the current itinerary content first.');
        return;
    }

    itineraryIndex++;

    $('#itinerary_container').append(`
        <div class="card mb-2 p-2 itinerary-item">

            <input type="text"
                   name="itinerary[${itineraryIndex}][title]"
                   class="form-control mb-2"
                   placeholder="Day ${itineraryIndex} Title (optional)">

            <textarea
                name="itinerary[${itineraryIndex}][content]"
                class="form-control mb-2"
                placeholder="Enter itinerary content (required)..."></textarea>
                <span class="text-danger itinerary_error"></span>

            <button type="button" class="btn btn-danger btn-sm remove-itinerary">
                Remove
            </button>

        </div>
    `);
});

// Remove itinerary from the list
$(document).on('click', '.remove-itinerary', function () {
    $(this).closest('.itinerary-item').remove();
});

        // Submitting the form using ajax / i.e CREATE A POST
        $('#addPostForm').on('submit', function(e) {
            e.preventDefault();
            var form = this;
            var overview = CKEDITOR.instances.overview.getData();
            var formdata = new FormData(form);
            formdata.append('overview', overview);

            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: formdata,
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(form).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 1) {
                        $(form)[0].reset();
                        CKEDITOR.instances.overview.setData('')
                        $('img#featured_image_preview').attr('src', '');
                        $('input[name="tags"]').tagsinput('removeAll');
                        $().notifa({
                            vers: 2,
                            cssClass: 'success',
                            html: data.message,
                            delay: 2500
                        });
                    } else {
                        $().notifa({
                            vers: 2,
                            cssClass: 'error',
                            html: data.message,
                            delay: 2500
                        });
                    }
                },
                error: function(data) {
                    $.each(data.responseJSON.errors, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                }



            });
        });
    </script>
@endpush
