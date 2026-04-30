<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\ParentCategory;
use App\Models\Tour;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Tours extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $categories_html;

    // filter properties
    public $search = null;
    public $author = null;
    public $category = null;
    public $visibility = null;
    public $sortBy = 'desc';
    public $post_visibility;

    protected $listeners = [
        'deleteTourAction'
    ];




    protected $queryString = [
        'search' => ['except' => ''],
        'author' => ['except' => ''],
        'category' => ['except' => ''],
        'visibility' => ['except' => ''],
        'sortBy' => ['except' => '']
    ];

    // Resets the page when search value is updated
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedAuthor()
    {
        $this->resetPage();
    }
    public function updatedCategory()
    {
        $this->resetPage();
    }
    public function updatedVisibility()
    {
        $this->resetPage();
        $this->post_visibility = $this->visibility == 'public' ? 1 : 0;
    }


    public function mount()
    {

        $this->author = Auth::user()->type == "superAdmin" ? Auth::user()->id : '';
        $this->post_visibility = $this->visibility == 'public' ? 1 : 0;

        // prepare categories selection
        $categories_html = '';

        $pcategories = ParentCategory::whereHas('children', function ($q) {
            $q->whereHas('tours');
        })->orderBy('name', 'asc')->get();

        $categories = Category::whereHas('tours')
            ->where('parent', 0)
            ->orderBy('name', 'asc')
            ->get();

        if ($pcategories->count() > 0) {
            foreach ($pcategories as $item) {
                $categories_html .= '<optgroup label="' . $item->name . '">';

                foreach ($item->children as $category) {
                    if ($category->tours->count() > 0) {
                        $categories_html .= '<option value="' . $category->id . '">' . $category->name . '</option>';
                    }
                }

                $categories_html .= '</optgroup>';
            }
        }

        if ($categories->count() > 0) {
            foreach ($categories as $item) {
                $categories_html .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            }
        }


        $this->categories_html = $categories_html;
    }


    public function deleteTour($id)
    {
        $this->dispatch('deleteTour', ['id' => $id]);
    }

    public function deleteTourAction($id)
    {
        $tour = Tour::findOrFail($id);
        $path = "images/tours/";
        $resized_path = $path . 'resized/';
        $old_featured_image = $tour->breadcrumb_img_tour;

        // Delete featured image
        if ($old_featured_image != null && File::exists(storage_path('app/public/' . $path . $old_featured_image))) {
            // Deleting
            File::delete(storage_path('app/public/' . $path . $old_featured_image));

            // Delete resized image
            if (File::exists(storage_path('app/public/' . $resized_path . 'resized_' . $old_featured_image))) {
                File::delete(storage_path('app/public/' . $resized_path . 'resized_' . $old_featured_image));
            }

            // Delete thumbnail image
            if (File::exists(storage_path('app/public/' . $resized_path . 'thumb_' . $old_featured_image))) {
                File::delete(storage_path('app/public/' . $resized_path . 'thumb_' . $old_featured_image));
            }
        }

        // Now Deleting the whole tour from database
        $delete = $tour->delete();
        if ($delete) {
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Tour has been deleted successfully!']);
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Something went wrong!']);
        }
    }


    public function render()
    {
        // dd(auth()->user()->type);
        return view('livewire.admin.tours', [
            'tours' => Auth::user()->type == "superAdmin" ?
                Tour::search(trim($this->search))
                ->when($this->author, function ($query) {
                    $query->where('author_id', $this->author);
                })->when($this->category, function ($query) {
                    $query->where('category', $this->category);
                })
                ->when($this->visibility, function ($query) {
                    $query->where('visibility', $this->post_visibility);
                })
                ->when($this->sortBy, function ($query) {
                    $query->orderBy('id', $this->sortBy);
                })->paginate($this->perPage) :

                Tour::search(trim($this->search))->when($this->author, function ($query) {
                    $query->where('author_id', $this->author);
                })->when($this->category, function ($query) {
                    $query->where('category', $this->category);
                })
                ->when($this->visibility, function ($query) {
                    $query->where('visibility', $this->post_visibility);
                })
                ->when($this->sortBy, function ($query) {
                    $query->orderBy('id', $this->sortBy);
                })->where('author_id', Auth::user()->id)->paginate($this->perPage)
        ]);
    }
}
