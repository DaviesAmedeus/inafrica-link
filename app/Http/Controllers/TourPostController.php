<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ParentCategory;
use App\Models\Tour;
use App\Models\TourPrice;
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
            $tour->itinerary = $request->itinerary;
            $tour->breadcrumb_img_tour = $filename;
            $tour->tags = $request->tags;
            $tour->meta_keywords = $request->meta_keywords;
            $tour->meta_description = $request->meta_description;
            $tour->visibility = $request->visibility;
            $savedTour = $tour->save();

            if ($savedTour) {

                foreach ($request->pricing as $item) {

                    TourPrice::create([
                        'tour_id' => $tour->id,
                        'people' => $item['people'],
                        'price' => $item['price']
                    ]);
                }


                return response()->json([
                    'status' => 1,
                    'message' => 'Tour created successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'Something went wrong!'
                ]);
            }
        }
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


        // dd($tour);

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

    public function updateTour(Request $request)
    {

        $tour = Tour::findOrFail($request->tour_id);
        $featured_image_name = $tour->breadcrumb_img_tour;

        // Validate form
        $request->validate([
            'title' => 'required|unique:tours,title,' . $tour->id,
            'description' => 'required',
            'overview' => 'required',
            'category' => 'required|exists:categories,id',
            'featured_image' => 'nullable|mimes:jpeg,jpg,png|max:2050',
            'itinerary' => 'array',
            'itinerary.*.title' => 'required|string|max:255',
            'itinerary.*.content' => 'required|string',
        ]);



        if ($request->hasFile('featured_image')) {
            $old_featured_image = $tour->breadcrumb_img_tour;
            $path = 'images/tours/';
            $resized_path = $path . "resized/";
            $file = $request->file('featured_image');
            $filename = "tour_img_" . time() . '.' . $file->getClientOriginalExtension();

            // upload a new featured image
            $upload = $file->storeAs($path, $filename, 'public');

            if ($upload) {
                // FULL PATHS (correct)
                $fullPath = storage_path('app/public/' . $path . $filename);
                $fullResizedPath = storage_path('app/public/' . $resized_path);

                // THUMBNAIL
                Image::make($fullPath)
                    ->fit(250, 250)
                    ->save($fullResizedPath . 'thumb_' . $filename);

                // RESIZED IMAGE
                Image::make($fullPath)
                    ->fit(512, 320)
                    ->save($fullResizedPath . 'resized_' . $filename);



                // Deleting old featured image
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

                $featured_image_name = $filename;
            } else {
                return response()->json(['status' => 0, 'message' => 'Something went wrong while uploading the featured image']);
            }
        }

        //UPDATING post data in database
        $tour->category = $request->category;
        $tour->title = $request->title;
        $tour->slug = null;
        $tour->description = $request->description;
        $tour->overview = $request->overview;
        $tour->itinerary = $request->itinerary;
        $tour->breadcrumb_img_tour = $featured_image_name;
        $tour->tags = $request->tags;
        $tour->meta_keywords = $request->meta_keywords;
        $tour->meta_description = $request->meta_description;
        $tour->visibility = $request->visibility;
        $saved = $tour->save();

        if ($saved) {


            foreach ($request->pricing as $item) {

                // EXISTING PRICE
                if (!empty($item['id'])) {

                    $tourPrice = TourPrice::findorFail($item['id']);

                    if ($tourPrice) {

                        $tourPrice->update([
                            'people' => $item['people'],
                            'price' => $item['price']
                        ]);
                    }
                } else {

                    // NEW PRICE
                    TourPrice::create([
                        'tour_id' => $tour->id,
                        'people' => $item['people'],
                        'price' => $item['price']
                    ]);
                }
            }




            return response()->json(['status' => 1, 'message' => 'The tour was updated successfully!']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong while updating the blog post']);
        }
    }
}
