<?php

namespace App\Actions\Admin\Tour;

use App\Models\Tour;
use App\Models\TourPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;


class CreateTourAction
{
    public function execute(Request $request)
    {

        try {
            DB::beginTransaction();

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

                // Saving the tour to the database
                $tour = Tour::create([
                    'author_id' => Auth::user()->id,
                    'category' => $request->category,
                    'title' => $request->title,
                    'description' => $request->description,
                    'overview' => $request->overview,
                    'itinerary' => $request->itinerary,
                    'breadcrumb_img_tour' => $filename,
                    'tags' => $request->tags,
                    'meta_keywords' => $request->meta_keywords,
                    'meta_description' => $request->meta_description,
                    'visibility' => $request->visibility
                ]);

                // Saving the tour prices to the database
                foreach ($request->pricing as $item) {
                    TourPrice::create([
                        'tour_id' => $tour->id,
                        'people' => $item['people'],
                        'price' => $item['price']
                    ]);
                }

                // Saving the tour cost items to the database
                foreach ($request->costInclude as $item) {
                    $tour->costItems()->create([
                        'type' => 'include',
                        'item' => $item
                    ]);
                }

                foreach ($request->costExclude as $item) {
                    $tour->costItems()->create([
                        'type' => 'exclude',
                        'item' => $item
                    ]);
                }

                DB::commit();
                return response()->json([
                    'status' => 1,
                    'message' => 'Tour created successfully'
                ]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Project creation error: ' . $th->getMessage() . ' ' . $th->getTraceAsString());

            return response()->json([
                'status' => 0,
                'message' => 'Something went wrong!'
            ]);
        }
    }
}
