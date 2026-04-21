<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\ParentCategory;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Categories extends Component
{
    use WithFileUploads;

    public $isUpdateParentCategoryMode = false;
    public $pcategory_id, $pcategory_name;

    public $isUpdateCategoryMode = false;
    public $category_id, $parent = 0, $category_name, $category_desc, $breadcrumb_img;
    public $selected_breadcrumb_img = null;

    protected $listeners = [
        'deleteParentCategoryAction'
    ];

    /*-- START f(x)'s Dealing with P. Category -- */

    public function addParentCategory()
    {
        $this->pcategory_id = null;
        $this->pcategory_name = null;
        $this->showParentCategoryModalForm();
    }

    public function createParentCategory()
    {
        $this->validate([
            'pcategory_name' => 'required|unique:parent_categories,name'
        ], [
            'pcategory_name.required' => 'Parent category field is required!',
            'pcategory_name.unique' => 'Parent category name already exists'
        ]);

        /**Store new paarent category */
        $pcategory = new ParentCategory();
        $pcategory->name = $this->pcategory_name;
        $saved = $pcategory->save();

        if ($saved) {
            $this->hideParentCategoryModalForm();
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'New parent category has been created successfully!']);
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Something went wrong!']);
        }
    }

    public function editParentCategory($id)
    {
        $pcategory = ParentCategory::findOrFail($id);
        $this->pcategory_id = $pcategory->id;
        $this->pcategory_name = $pcategory->name;
        $this->isUpdateParentCategoryMode = true;
        $this->showParentCategoryModalForm();
    }

    public function updateParentCategory()
    {
        $pcategory = ParentCategory::findOrFail($this->pcategory_id);
        $this->validate([
            'pcategory_name' => 'required|unique:parent_categories,name,' . $pcategory->id
        ], [
            'pcategory_name.required' => 'Parent category field is required!',
            'pcategory_name.unique' => 'Parent category name is taken'
        ]);

        /**Update parent category */
        $pcategory->name = $this->pcategory_name;
        $pcategory->slug = null;
        $updated = $pcategory->save();

        if ($updated) {
            $this->hideParentCategoryModalForm();
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'New parent category has been updated successfully!']);
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Something went wrong!']);
        }
    }

    public function showParentCategoryModalForm()
    {
        $this->resetErrorBag(); //clears all validation errors stored in the Livewire component.
        $this->dispatch('showParentCategoryModalForm');
    }

    public function hideParentCategoryModalForm()
    {
        $this->dispatch('hideParentCategoryModalForm');
        $this->isUpdateParentCategoryMode = false;
        $this->pcategory_id = $this->pcategory_id = null;
    }


    public function deleteParentCategory($id)
    {
        $this->dispatch('deleteParentCategory', ['id' => $id]);
    }

    public function deleteParentCategoryAction($id)
    {
        $pcategory = ParentCategory::findOrFail($id);
        // // Check if parent category has children
        // if ($pcategory->children->count() > 0) {
        //     foreach ($pcategory->children as $category) {
        //         // Release a category
        //         Category::where('id', $category->id)->update(['parent' => 0]);
        //     }
        // }

        // Delete parent category
        $delete = $pcategory->delete();
        if ($delete) {
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Parent category has been deleted successfully']);
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Something went wrong!']);
        }
    }

    /*-- END f(x)'s Dealing with P. Category -- */



    /*-- START f(x)'s Dealing with Category -- */
    public function addCategory()
    {
        $this->category_id = null;
        $this->parent = 0;
        $this->category_name = null;
        $this->category_desc = null;
        $this->breadcrumb_img = null;
        $this->selected_breadcrumb_img = null;
        $this->isUpdateCategoryMode = false;
        $this->showCategoryModalForm();
    }

    public function showCategoryModalForm()
    {
        $this->resetErrorBag();
        $this->dispatch('showCategoryModalForm');
    }

    public function createCategory()
    {
        $this->validate([
            'category_name' => 'required|unique:categories,name',
            'breadcrumb_img' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
            'category_desc' => 'required',
        ], [
            'category_name.required' => 'Category field is required!',
            'category_name.unique' => 'Category name already exists'
        ]);

        $path = 'images/breadcrumb/';
        $file = $this->breadcrumb_img;
        $filename = "breadcrumb_img_" . date('YmdHis', time()) . '.' . $file->getClientOriginalExtension();

        // upload breadcrumb_img into the folder
        $upload = $file->storeAs($path, $filename, 'public');

        if (!$upload) {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Something went wrong while uploading slide image']);
        } else {
            // Store new category
            $category = new Category();
            $category->parent = $this->parent;
            $category->name = $this->category_name;
            $category->category_desc = $this->category_desc;
            $category->breadcrumb_img = $filename;
            $saved = $category->save();

            if ($saved) {
                $this->hideCategoryModalForm();
                $this->dispatch('showToastr', ['type' => 'success', 'message' => 'New Category created successfully!']);
            } else {
                $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Something went wrong!']);
            }
        }
    }

    public function hideCategoryModalForm()
    {
        $this->dispatch('hideCategoryModalForm');
        $this->isUpdateCategoryMode = false;
        $this->category_id = $this->category_name = null;
        $this->parent = 0;
    }


    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $category->id;
        $this->parent = $category->parent;
        $this->category_name = $category->name;
        $this->category_desc = $category->category_desc;
        $this->breadcrumb_img = null;
        $this->selected_breadcrumb_img = 'images/breadcrumb/' . $category->breadcrumb_img;
        $this->isUpdateCategoryMode = true;
        $this->showCategoryModalForm();
    }

    public function updateCategory()
    {
        $category = Category::findOrFail($this->category_id);
        $this->validate([
            'category_name' => 'required|unique:categories,name,' . $category->id,
            'breadcrumb_img' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
            'category_desc' => 'required',
        ], [
            'category_name.required' => 'Category field is required!',
            'category_name.unique' => 'Category name already exists'
        ]);

        // if form has image file
        if ($this->breadcrumb_img) {
            $path = 'images/breadcrumb/';
            $old_breadcrumb_img = $category->breadcrumb_img;
            $file = $this->breadcrumb_img;
            $filename = 'breadcrumb_img' . date('YmdHis', time()) . '.' . $file->getClientOriginalExtension();

            // upload breadcrumb_img into the folder
            $upload = $file->storeAs($path, $filename, 'public');

            if (!$upload) {
                $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Something went wrong while uploading s;ide image']);
            } else {
                // Delete old image

                if ($old_breadcrumb_img && Storage::disk('public')->exists($path . basename($old_breadcrumb_img))) {
                    Storage::disk('public')->delete($path . basename($old_breadcrumb_img));
                }

                //  Updating the records in the database
                $category->parent = $this->parent;
                $category->name = $this->category_name;
                $category->slug = null;
                $category->category_desc = $this->category_desc;
                $category->breadcrumb_img = $filename;
                $saved = $category->save();

                if ($saved) {
                    $this->hideCategoryModalForm();
                    $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Category Updated!']);
                } else {
                    $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Something went wrong!']);
                }
            }
        }
    }




    public function render()
    {
        return view('livewire.admin.categories', [
            'pcategories' => ParentCategory::orderBy('ordering', 'asc')->get(),
            'categories' => Category::orderBy('ordering', 'asc')->get()
        ]);
    }
}
