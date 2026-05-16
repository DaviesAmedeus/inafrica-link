<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tour;
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

        $title = 'Posts in Category' . $category->name;
        $description = 'Browse the latest posts in the ' . $category->name . ' category. Stay updated!';

        /**Set SEO Meta Tags */
        // SEOTools::setTitle($title, false);
        // SEOTools::setDescription($description);
        // SEOTools::opengraph()->setUrl(url()->current());


        return view('front.pages.category_tours', compact('category', 'tours'));
    }

     public function readTour(Request $request, $slug = null)
    {
        // fetch single post by slug
        $tour = Tour::where('slug', $slug)->firstOrFail();


        // Get related tourss
        $relatedTourss = Tour::where('category', $tour->category)
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



        // Set SEO Meta Tags
        $title = $tour->title;
        // $description = ($tours->meta_description != '') ? $tours->meta_description : words($tours->content, 35);

        // SEOTools::setTitle($title, false);
        // SEOTools::setDescription($description);
        // SEOTools::opengraph()->setUrl(route('read_tours', ['slug' => $tours->slug]));
        // SEOTools::opengraph()->addProperty('type', 'article');
        // SEOTools::opengraph()->addImage(asset('images/tourss' . $tours->featured_image));
        // SEOTools::twitter()->setImage(asset('images/tourss' . $tours->featured_image));

        $data = [
            'pageTitle' => $title,
            'tour'=>$tour,
            'relatedTourss' => $relatedTourss,
            'nextTours'=>$nextTour,
            'prevTours'=>$prevTour
        ];

        return view('front.pages.single_tour', $data);
    }

}
