<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tour;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class TourController extends Controller
{

    public function categoryTours(Request $request, $slug = null)
    {
        // Find Category by slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Retrieve posts related to this category and paginate
        $tours = Tour::where('category', $category->id)
            ->where('visibility', 1)
            ->latest()->paginate(8);

        $title = $category->name;
        $description = 'Browse the tours in ' . $category->name . ' category. Stay updated!';


        /**Set SEO Meta Tags */
        SEOTools::setTitle($title, false);
        SEOTools::setDescription($description);
        SEOTools::opengraph()->setUrl(url()->current());


        return view('front.pages.category_tours', compact('category', 'tours'));
    }



    public function readTour(Request $request, $slug = null)
    {
        // fetch single post by slug
        $tour = Tour::where('slug', $slug)->firstOrFail();


        // Get related tourss
        $relatedTours = Tour::where('category', $tour->category)
            ->where('id', "!=", $tour->id)
            ->where('visibility', 1)
            ->get();

        // Get next and previous tour
        $nextTour = Tour::where('id', '>', $tour->id)
            ->where('visibility', 1)
            ->orderBy('id', 'asc')
            ->first();

        // Get next and previous tour
        $prevTour = Tour::where('id', '<', $tour->id)
            ->where('visibility', 1)
            ->orderBy('id', 'desc')
            ->first();



        $title = $tour->title;
        $description = ($tour->meta_description != '') ? $tour->meta_description : words($tour->content, 35);
        $keywords = isset(settings()->$tour->meta_keywords) ? settings()->$tour->meta_keywords : '';

        // Set SEO Meta Tags
        SEOTools::setTitle($title, false);
        SEOTools::setDescription($description);
        SEOMeta::setKeywords($keywords);

         // Set Open graph
        SEOTools::opengraph()->setUrl(route('read_tour', ['slug' => $tour->slug]));
        SEOTools::opengraph()->addProperty('type', 'article');
        SEOTools::opengraph()->addImage(asset('storage/images/tours/' . $tour->breadcrumb_img_tour));
        
        //twitter SEO
        SEOTools::twitter()->setImage(asset('storage/images/tours/' . $tour->breadcrumb_img_tour));

        $data = [
            'tour' => $tour,
            'relatedTours' => $relatedTours,
            'nextTours' => $nextTour,
            'prevTours' => $prevTour
        ];

        return view('front.pages.single_tour', $data);
    }
}
