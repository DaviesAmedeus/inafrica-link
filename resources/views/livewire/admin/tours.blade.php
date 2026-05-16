<div>
    <div class="pd-20 card-box mb-30">
        {{-- SEARCH FIELDS --}}
        <div class="row mb-20">
            <div class="col-md-4">
                <label for="searh"><b class="text-secondary">Search</b></label>
                <input wire:model.live="search" id="search" type="text" class="form-control"
                    placeholder="Search posts...">
            </div>

            @if (Auth::user()->type == 'superAdmin')
                <div class="col-md-2">
                    <label for="author"><b class="text-secondary">Author</b></label>
                    <select wire:model.live="author" name="" id="author" class="custom-select form-control">
                        <option value="">No selected</option>
                        @foreach (App\Models\User::whereHas('tours')->get() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach

                    </select>
                </div>
            @endif


            <div class="col-md-2">
                <label for="category"><b class="text-secondary">Category</b></label>
                <select wire:model.live="category" name="" id="category" class="custom-select form-control">
                    <option value="">No selected</option>
                    {!! $categories_html !!}

                </select>
            </div>

            <div class="col-md-2">
                <label for="visibility"><b class="text-secondary">Visibility</b></label>
                <select wire:model.live="visibility" name="" id="visibility" class="custom-select form-control">
                    <option value="">No selected</option>
                    <option value="public">Public</option>
                    <option value="private">Private</option>

                </select>
            </div>

            <div class="col-md-2">
                <label for="sort"><b class="text-secondary">Sort by</b></label>
                <select wire:model.live="sortBy" name="" id="sort" class="custom-select form-control">
                    <option value="asc">ASC</option>
                    <option value="desc">DESC</option>

                </select>
            </div>
        </div>
        {{-- TABLE --}}
        <div class="table-responsive">
            <table class="table table-striped table-auto table-sm">
                <thead class="bg-secondary text-white">
                    <th scope="col">#ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col" style="text-align: center;">Tour Pricing</th>
                    <th scope="col">Visibility</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>

                    @forelse ($tours as $item)
                        <tr>
                            <td scope="row">{{ $item->id }}</td>
                            <td>
                                <a href="">
                                    <img class="img-thumbnail"
                                        src="{{ asset('storage/images/tours/resized/resized_' . $item->breadcrumb_img_tour) }}"
                                        alt="" width="100">
                                </a>
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->author->name }}</td>
                            <td>{{ $item->tour_category->name }}</td>
                            <td>
                                <div class="table-actions justify-content-center">
                                    <a href="javascript:;" wire:click="showPrices({{ $item->id }})"
                                        data-color="#265ed7" style="color: rgb(38, 94, 215);">
                                        <i class="icon-copy dw dw-eye"></i>
                                    </a>

                                </div>
                            </td>
                            <td>
                                @if ($item->visibility == 1)
                                    <span class="badge badge-pill badge-success"><i
                                            class="icon-copy ti-world pr-2"></i>Public</span>
                                @else
                                    <span class="badge badge-pill badge-warning"><i
                                            class="icon-copy ti-lock pr-2"></i>Private</span>
                                @endif
                            </td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('admin.edit_tour', ['id' => $item->id]) }}" data-color="#265ed7"
                                        style="color: rgb(38, 94, 215)">
                                        <i class="icon-copy dw dw-edit2"></i>
                                    </a>
                                    <a href="javascript:;" wire:click="deleteTour({{ $item->id }})"
                                        data-color="#e95959" style="color: rgb(233, 89, 89)">
                                        <i class="icon-copy dw dw-delete-3"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="7">
                                <span class="text-danger">No Tour(s)</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="block mt-1">
            {{ $tours->links('livewire::simple-bootstrap') }}
        </div>
    </div>

    {{-- PRICE MODAL --}}
    <div>
        <div wire:ignore.self class="modal fade" id="price_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" wire:submit="">
                    <div class="modal-header border-0 pb-0">

                        <div class="d-flex align-items-center">

                            {{-- ICON --}}
                            <div class="d-flex align-items-center justify-content-center rounded-circle mr-3"
                                style="
                width: 55px;
                height: 55px;
                background: rgba(40, 167, 69, 0.12);
            ">

                                <i class="fa fa-tags"
                                    style="
                    font-size: 22px;
                    color: #28a745;
                "></i>

                            </div>

                            {{-- TITLE AREA --}}
                            <div>

                                <small class="text-muted d-block">
                                    Tour Pricing Overview
                                </small>

                                <h4 class="modal-title mb-0 font-weight-bold">

                                    {{ $selectedTour->title ?? 'Tour Prices' }}

                                </h4>

                            </div>

                        </div>

                        {{-- CLOSE BUTTON --}}
                        <button type="button" class="close ml-3" data-dismiss="modal" aria-hidden="true"
                            style="
            font-size: 28px;
            outline: none;
        ">
                            ×
                        </button>

                    </div>
                    <div class="modal-body">

                        {{-- @if ($isUpdateParentCategoryMode)
                                <input type="hidden" wire:model="pcategory_id">
                            @endif --}}
                        @if (count($selectedPrices) > 0)

                            <div class="row g-3">

                                @foreach ($selectedPrices as $price)
                                    <div class="col">

                                        <div class="card border-0 shadow-sm h-100">

                                            <div class="card-body">

                                                <div class="d-flex justify-content-between align-items-center">

                                                    <div>

                                                        <small class="text-muted d-block mb-1">
                                                            Package For
                                                        </small>

                                                        <h5 class="mb-0 fw-bold">
                                                            {{ $price->people }}
                                                            {{ $price->people == 1 ? 'Person' : 'People' }}
                                                        </h5>

                                                    </div>

                                                    <div class="text-end">

                                                        <small class="text-muted d-block mb-1">
                                                            Price Per Person
                                                        </small>

                                                        <h4 class="text-success fw-bold mb-0">

                                                            ${{ number_format($price->price, 2) }}

                                                        </h4>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        @else
                            <div class="py-5">

                                <div class="text-center">

                                    {{-- ICON CONTAINER --}}
                                    <div class="mx-auto mb-4 d-flex align-items-center justify-content-center rounded-circle"
                                        style="
                width: 100px;
                height: 100px;
                background: #fff3cd;
            ">

                                        <i class="icon-copy fa fa-money"
                                            style="
                    font-size: 40px;
                    color: #f0ad4e;
                "></i>

                                    </div>

                                    {{-- TITLE --}}
                                    <h4 class="fw-bold mb-3 text-dark">
                                        Pricing Not Available
                                    </h4>

                                    {{-- DESCRIPTION --}}
                                    <p class="text-muted mx-auto"
                                        style="
                max-width: 400px;
                line-height: 1.7;
            ">
                                        This tour does not have pricing information yet.
                                        Please add tour pricing to allow customers
                                        to view package rates.
                                    </p>

                                </div>

                            </div>

                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
