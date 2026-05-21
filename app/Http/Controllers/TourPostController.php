<?php

namespace App\Http\Controllers;

use App\Actions\Admin\Tour\CreateTourAction;
use App\Actions\Admin\Tour\UpdateTourAction;
use App\Http\Requests\Admin\Tour\CreateTourRequest;
use App\Http\Requests\Admin\Tour\UpdateTourRequest;
use App\Models\Category;
use App\Models\ParentCategory;
use App\Models\Tour;
use App\Models\TourPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class TourPostController extends Controller
{
    public function addTour(Request $request)
    {
        $categories_html = '';
        $pcategories = ParentCategory::whereHas('children')->orderBy('name', 'asc')->get();
        $categories = Category::where('parent', 0)->orderBy('name', 'asc')->get();

        if (count($pcategories) > 0) {
            foreach ($pcategories as $item) {
                $categories_html .= '<optgroup label="' . $item->name . '">';
                foreach ($item->children as $category) {
                    $categories_html .= '<option value="' . $category->id . '">' . $category->name . '</option>';
                }
                $categories_html .= '</optgroup>';
            }
        }

        if (count($categories) > 0) {
            foreach ($categories as $item) {
                $categories_html .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            }
        }

        $data = [
            'pageTitle' => 'Add new post',
            'categories_html' => $categories_html
        ];

        return view('back.pages.add_tour', $data);
    }

    public function createTour(CreateTourRequest $request, CreateTourAction $createTourAction)
    {
        // Validate the form
        $request->validated();
        return $createTourAction->execute($request);
    }

    public function allTours(Request $request)
    {
        $data = [
            'pageTitle' => 'Tours'
        ];
        return view('back.pages.tours', $data);
    }


    public function editTour(Request $request, $id = null)
    {
        $tour = Tour::with('tourPrices')->findOrFail($id);

        $categories_html = '';
        $pcategories = ParentCategory::whereHas('children')->orderBy('name', 'asc')->get();
        $categories = Category::where('parent', 0)->orderBy('name', 'asc')->get();

        if (count($pcategories) > 0) {
            foreach ($pcategories as $item) {
                $categories_html .= '<optgroup label="' . $item->name . '">';
                foreach ($item->children as $category) {
                    $selected = $category->id == $tour->category ? 'selected' : '';
                    $categories_html .= '<option value="' . $category->id . '" ' . $selected . '>' . $category->name . '</option>';
                }
                $categories_html .= '</optgroup>';
            }
        }

        if (count($categories) > 0) {
            foreach ($categories as $item) {
                $selected = $item->id == $tour->category ? 'selected' : '';
                $categories_html .= '<option value="' . $item->id . '" ' . $selected . '>' . $item->name . '</option>';
            }
        }

        $data = [
            'pageTitle' => 'Edit',
            'tour' => $tour,
            'categories_html' => $categories_html
        ];

        return view('back.pages.edit_tour', $data);
    }

    public function updateTour(UpdateTourRequest $request, UpdateTourAction $updateTourAction, $id)
    {
        // Validate form
        $request->validated();
        return $updateTourAction->execute($request, $id);
    }
}
