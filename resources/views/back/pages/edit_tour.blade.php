@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Edit Tour</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit tour
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{ route('admin.tours', ['post_id' => $tour->id]) }}" class="btn btn-primary">View all tours</a>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.update_tour', ['tour_id' => $tour->id]) }}" method="POST" autocomplete="off"
        enctype="multipart/form-data" id="updatePostForm">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-box mb-2">
                    <div class="card-body">
                        <div class="form-group">
                            <label for=""><b>Title</b>:</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter post title"
                                value="{{ $tour->title }}">
                            <span class="text-danger error-text title_error"></span>
                        </div>

                        <div class="form-group">
                            <label for=""><b>Description</b>:</label>
                            <textarea name="description" cols="30" rows="10" class="form-control"
                                placeholder="Enter tour description here">{{ $tour->description }}</textarea>
                            <span class="text-danger error-text description_error"></span>
                        </div>

                        <div class="form-group">
                            <label for=""><b>Overview</b>:</label>
                            <textarea name="overview" id="overview" cols="30" rows="10" class="ckeditor form-control"
                                placeholder="Enter tour overview here">{!! $tour->overview !!}</textarea>
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

                            <div id="itinerary_container">
                                @if (!empty($tour->itinerary))
                                    @foreach ($tour->itinerary as $index => $item)
                                        <div class="card mb-2 p-2 itinerary-item">

                                            <input type="text" name="itinerary[{{ $index }}][title]"
                                                class="form-control mb-2"
                                                placeholder="Itinerary title (Required)..."
                                                value="{{ $item['title'] ?? '' }}">

                                            <textarea name="itinerary[{{ $index }}][content]" class="form-control mb-2"
                                                placeholder="Itinerary content (Optional)...">{{ $item['content'] ?? '' }}</textarea>

                                            <span class="text-danger itinerary_error"></span>

                                            <button type="button" class="btn btn-danger btn-sm remove-itinerary">
                                                Remove
                                            </button>

                                        </div>
                                    @endforeach
                                @endif
                            </div>
                             <!-- Error Message when fields are empty -->
                            <div id="itinerary-error" class="alert alert-danger d-none"></div>

                            <button type="button" id="add_itinerary" class="btn btn-primary mt-2">
                                + Add Itinerary
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card card-box mb-2">
                    <div class="card-header weight-500">TOUR PRICING</div>
                    <div class="card-body">




                        <div class="table-responsive">
                            <table class="table table-bordered" id="pricing-table">

                                <thead>
                                    <tr>
                                        <th>People</th>
                                        <th>Price(USD) per person</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody id="pricing-body">
                                    @if (!empty($tour->tourPrices))

                                        @foreach ($tour->tourPrices as $index => $price)
                                            <tr>
                                                <input type="hidden" name="pricing[{{ $index }}][id]"
                                                    value="{{ $price->id }}">

                                                <td>
                                                    <input type="number" name="pricing[{{ $index }}][people]"
                                                        class="form-control people-input" placeholder="e.g 5" min="1"
                                                        max="10" value="{{ $price->people }}">

                                                </td>

                                                <td>
                                                    <input type="number" name="pricing[{{ $index }}][price]"
                                                        class="form-control price-input" placeholder="e.g 1200"
                                                        min="0" value="{{ $price->price }}" step="0.01">
                                                </td>

                                                <td>
                                                    <button type="button" class="btn btn-danger remove-row">
                                                        Remove
                                                    </button>
                                                </td>

                                            </tr>
                                        @endforeach



                                    @endif
                                </tbody>

                            </table>
                        </div>
                        <!-- Error Message when fields are empty -->
                        <div id="pricing-error" class="alert alert-danger d-none"></div>
                        <button type="button" id="add-price-group" class="btn btn-primary">
                            + Add Pricing Group
                        </button>

                    </div>
                </div>






                <div class="card card-box mb-2">
                    <div class="card-header weight-500">SEO</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for=""><b>Tour meta key words</b>:<small>(Separated by comma.)</small></label>
                            <input type="text" class="form-control" name="meta_keywords"
                                placeholder="Enter tour meta keywords" value="{{ $tour->meta_keywords }}">
                        </div>
                        <div class="form-group">
                            <label for=""><b>Tour meta description</b>:</label>
                            <textarea name="meta_description" class="form-control" id="" cols="30" rows="10"
                                placeholder="Enter tour meta description..">{{ $tour->meta_description }}</textarea>
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
                                data-ijabo-default-img="{{ asset('storage/images/tours/resized/resized_' . $tour->breadcrumb_img_tour) }}">
                        </div>
                        <div class="form-group">
                            <label for=""><b>Tags</b>:</label>
                            <input type="text" class="form-control" name="tags" data-role='tagsinput'
                                value="{{ $tour->tags }}">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for=""><b>Visibility</b>:</label>
                            <div class="custom-control custom-radio mb-5">
                                <input type="radio" name="visibility" id="customRadio1" class="custom-control-input"
                                    value="1" {{ $tour->visibility == 1 ? 'checked' : '' }}>
                                <label for="customRadio1" class="custom-control-label">Public</label>
                            </div>
                            <div class="custom-control custom-radio mb-5">
                                <input type="radio" name="visibility" id="customRadio2" class="custom-control-input"
                                    value="0" {{ $tour->visibility == 0 ? 'checked' : '' }}>
                                <label for="customRadio2" class="custom-control-label">Private</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update post</button>
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
        let itineraryIndex = {{ !empty($tour->itinerary) ? count($tour->itinerary) : 0 }};

           function addItineraryItem() {
            let itineraryItem = `
                <div class="card mb-2 p-2 itinerary-item">

                    <input type="text"
                        name="itinerary[${itineraryIndex}][title]"
                        class="form-control mb-2"
                        placeholder="Itinerary title (Required)...">

                    <textarea
                        name="itinerary[${itineraryIndex}][content]"
                        class="form-control mb-2"
                        placeholder="Enter itinerary content (Optional)..."></textarea>
                        <span class="text-danger itinerary_error"></span>

                    <button type="button" class="btn btn-danger btn-sm remove-itinerary">
                        Remove
                    </button>

                </div> `;

            $('#itinerary_container').append(itineraryItem);
            itineraryIndex++;
        }


        $('#add_itinerary').on('click', function() {

            let lastItineraryTitle = $('.itinerary-item input').last().val();

            if (lastItineraryTitle !== undefined && lastItineraryTitle.trim() === '') {
                $('#itinerary-error')
                    .removeClass('d-none')
                    .text('"Itinerary title" is required but "Itinerary content" is optional!.');
                return;
            }
            // Clearing error
            $('#itinerary-error').addClass('d-none').text('');

            addItineraryItem();
        });

        // Remove itinerary from the list
        $(document).on('click', '.remove-itinerary', function() {
            if ($('#itinerary_container div').length == 1) {
                $('#itinerary-error')
                    .removeClass('d-none')
                    .text('At least one "Itinerary Item" is required!');
                return;
            }
            $(this).closest('.itinerary-item').remove();
        });





        // OLD

    //     $('#add_itinerary').on('click', function() {

    //         let lastContent = $('.itinerary-item textarea').last().val();

    //         if (lastContent !== undefined && lastContent.trim() === '') {
    //             alert('Please fill the current itinerary content first.');
    //             return;
    //         }

    //         itineraryIndex++;

    //         $('#itinerary_container').append(`
    //     <div class="card mb-2 p-2 itinerary-item">

    //         <input type="text"
    //                name="itinerary[${itineraryIndex}][title]"
    //                class="form-control mb-2"
    //                placeholder="Day ${itineraryIndex} Title (optional)">

    //         <textarea
    //             name="itinerary[${itineraryIndex}][content]"
    //             class="form-control mb-2"
    //             placeholder="Enter itinerary content (required)..."></textarea>
    //             <span class="text-danger itinerary_error"></span>

    //         <button type="button" class="btn btn-danger btn-sm remove-itinerary">
    //             Remove
    //         </button>

    //     </div>
    // `);

    //     });
    //     // Remove itinerary from the list
    //     $(document).on('click', '.remove-itinerary', function() {
    //         $(this).closest('.itinerary-item').remove();
    //     });



        /* ---UPDATING TOUR PRICING MECHANISM START --- */
        let pricingIndex = {{ count($tour->tourPrices) }};

        function addPricingRow() {
            let row = `
            <tr>

                <td>
                    <input type="number"
                        name="pricing[${pricingIndex}][people]"
                        class="form-control people-input"
                        placeholder="e.g 5"
                        min="1"
                        max="10">

                </td>

                <td>
                    <input type="number"
                        name="pricing[${pricingIndex}][price]"
                        class="form-control price-input"
                        placeholder="e.g 1200"
                        min="0"
                        step="0.01">
                </td>

                <td>
                    <button type="button"
                        class="btn btn-danger remove-row">
                        Remove
                    </button>
                </td>

            </tr>
        `;
            $('#pricing-body').append(row);
            pricingIndex++;
        };

        $('#add-price-group').click(function() {

            let lastRow = $('#pricing-body tr:last');

            let people = lastRow.find('.people-input').val();

            let price = lastRow.find('.people-price').val();

            // VALIDATION (checking if either of the fields are empty)
            if (people == '' || price == '') {
                $('#pricing-error')
                    .removeClass('d-none')
                    .text('Please complete the current pricing group first.');
                return;
            }

            // CLEAR ERROR
            $('#pricing-error')
                .addClass('d-none')
                .text('');

            addPricingRow();
        });

        // Removing the pricing group row
        $(document).on('click', '.remove-row', function() {

            if ($('#pricing-body tr').length == 1) {

                $('#pricing-error')
                    .removeClass('d-none')
                    .text('At least one pricing group is required.');
                return;
            }
            $(this).closest('tr').remove();
        });

        /* ---UPDATE PRICING MECHANISM END --- */









        // Submitting the form using ajax / i.e UPDATE A POST
        $('#updatePostForm').on('submit', function(e) {
            e.preventDefault();
            var form = this;
            var overview = CKEDITOR.instances.overview.getData();
            var formdata = new FormData(form);
            formdata.append('overview', overview);

            // for (let [key, value] of formdata.entries()) {
            //     console.log(key, value, typeof value);
            // }

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

                        $().notifa({
                            vers: 2,
                            cssClass: 'success',
                            html: data.message,
                            delay: 2500
                        });

                        setTimeout(() => {
                            location.reload();
                        }, 500);

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
