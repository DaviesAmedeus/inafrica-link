<?php


namespace App\Actions\Admin\Tour;

use App\Models\Tour;
use App\Models\TourPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;


class UpdateTourAction
{


    public function execute(Request $request, $id)
    {

        $tour = Tour::findOrFail($id);
        $featured_image_name = $tour->breadcrumb_img_tour;

        try {
            DB::beginTransaction();

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

            //UPDATING tour data in database
            $tour->update([
                'category' => $request->category,
                'title' => $request->title,
                'slug' => null,
                'description' => $request->description,
                'overview' => $request->overview,
                'itinerary' => $request->itinerary,
                'breadcrumb_img_tour' => $featured_image_name,
                'tags' => $request->tags,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'visibility' => $request->visibility,
            ]);



             // Saving / Updating the tour prices to the database
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

            DB::commit();
              return response()->json(['status' => 1, 'message' => 'The tour was updated successfully!']);

        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Project creation error: ' . $th->getMessage() . ' ' . $th->getTraceAsString());
              return response()->json(['status' => 0, 'message' => 'Something went wrong while updating the blog post']);
        }
    }
}
