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
                                <tbody id="pricing-body"></tbody>
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
                    <div class="card-header weight-500">COST INCLUDES & EXCLUDES</div>
                    <div class="card-body">



                        <div class="row p-4">
                            <div class="col-6 border py-2">
                                <p><strong>Cost Includes</strong></p>
                                <div id="cost-include-container"></div>


                                <!-- Error Message when fields are empty -->
                                <div id="cost-include-error" class="alert alert-danger d-none"></div>
                                <button type="button" id="add_cost_include_item" class="btn btn-primary">
                                    <i class="icon-copy dw dw-add"></i> Add
                                </button>
                            </div>


                            <div class="col-6 border py-2">
                                <p><strong>Cost Excludes</strong></p>
                                <div id="cost-exclude-container"></div>

                                <!-- Error Message when fields are empty -->
                                <div id="cost-exclude-error" class="alert alert-danger d-none"></div>

                                <button type="button" id="add-cost-exclude-item" class="btn btn-primary">
                                    <i class="icon-copy dw dw-add"></i> Add
                                </button>
                            </div>
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
            <button type="submit" class="btn btn-outline-primary px-5">
                Create Tour (Click here!)
            </button>
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

    {{-- CK Editor --}}
    <script src="{{ asset('ckeditor4-4.22.1/ckeditor.js') }}"></script>

    {{-- Featured Image Preview --}}
    <script src="{{ asset('back/js/admin/featured-image-preview.js') }}"></script>

    {{-- Adding Itinerary Mechanism --}}
     <script src="{{ asset('back/js/admin/add-itinerary.js') }}"></script>

    {{-- Adding Price Mechanism --}}
    <script src="{{ asset('back/js/admin/add-price.js') }}"></script>


    {{-- Adding Cost includes & Excludes Mechanism --}}
    <script src="{{ asset('back/js/admin/cost-includes-excludes.js') }}"></script>

     {{-- Tour Submission using AJAX --}}
    <script src="{{ asset('back/js/admin/create-tour-submission.js') }}"></script>

@endpush
