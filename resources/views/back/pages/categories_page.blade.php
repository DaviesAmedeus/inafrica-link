@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')

@section('content')
    @livewire('admin.categories')
@endsection

@push('scripts')
    <script>
        // P.CATEGORY
        window.addEventListener('showParentCategoryModalForm', function() {
            $('#pcategory_modal').modal('show');
        });

        window.addEventListener('hideParentCategoryModalForm', function() {
            $('#pcategory_modal').modal('hide');
        });

        window.addEventListener('deleteParentCategory', function(event) {
            var id = event.detail[0].id;
            // using ijabo
            $().konfirma({
                title: 'Are you sure?',
                html: 'Deleting this Parent category will release  it sub-categories (if any)',
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, Delete',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: 400,
                allowOutsideClick: false,
                fontSize: '1rem',
                done: function() {
                    Livewire.dispatch('deleteParentCategoryAction', [id]);
                }
            });
        });

    // CATEGORY
        window.addEventListener('showCategoryModalForm', function() {
            $('#category_modal').modal('show');
        });

          window.addEventListener('hideCategoryModalForm', function() {
            $('#category_modal').modal('hide');
        });

             window.addEventListener('deleteCategory', function(event){
            var id = event.detail[0].id;
            // using ijabo
            $().konfirma({
                title: 'Are you sure?',
                html: 'You want to delete this category',
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, Delete',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: 400,
                allowOutsideClick: false,
                fontSize: '1rem',
                done: function() {
                    Livewire.dispatch('deleteCategoryAction', [id]);
                }
            });
        });
    </script>
@endpush
