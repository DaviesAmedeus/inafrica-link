<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ParentCategory;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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

    public function createTour(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:tours,title',
            'description' => 'required',
            'overview' => 'required',
            'category' => 'required|exists:categories,id',
            'featured_image' => 'required|mimes:png,jpg,jpeg|max:2050',
            'itinerary' => 'required|array',
            'itinerary.*.title' => 'required|string|max:255',
            'itinerary.*.content' => 'required|string',
        ]);

        if ($request->hasFile('featured_image')) {

            $path = "images/tours/";
            $resized_path = $path . "resized/";

            $file = $request->file('featured_image');
            $filename = "tour_img_" . time() . '.' . $file->getClientOriginalExtension();

            // store original
            $upload = $file->storeAs($path, $filename, 'public');

            if (!$upload) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Upload failed'
                ]);
            }

            // FULL PATHS (correct)
            $fullPath = storage_path('app/public/' . $path . $filename);
            $fullResizedPath = storage_path('app/public/' . $resized_path);

            // DEBUG (optional - remove after test)
            if (!file_exists($fullPath)) {
                return response()->json([
                    'status' => 0,
                    'message' => 'File not found at: ' . $fullPath
                ]);
            }

            // create resized folder
            if (!File::isDirectory($fullResizedPath)) {
                File::makeDirectory($fullResizedPath, 0777, true, true);
            }

            // THUMBNAIL
            Image::make($fullPath)
                ->fit(250, 250)
                ->save($fullResizedPath . 'thumb_' . $filename);

            // RESIZED IMAGE
            Image::make($fullPath)
                ->fit(512, 320)
                ->save($fullResizedPath . 'resized_' . $filename);

            // SAVE TO DB
            $tour = new Tour();
            $tour->author_id = Auth::user()->id;
            $tour->category = $request->category;
            $tour->title = $request->title;
            $tour->description = $request->description;
            $tour->overview = $request->overview;
            $tour->itinerary = json_encode($request->itinerary);
            $tour->breadcrumb_img_tour = $filename;
            $tour->tags = $request->tags;
            $tour->meta_keywords = $request->meta_keywords;
            $tour->meta_description = $request->meta_description;
            $tour->visibility = $request->visibility;
            $tour->save();

            return response()->json([
                'status' => 1,
                'message' => 'Tour created successfully'
            ]);
        }
    }

      public function allTours(Request $request)
    {
        $data = [
            'pageTitle' => 'Tours'
        ];
        return view('back.pages.tours', $data);
    }
}
