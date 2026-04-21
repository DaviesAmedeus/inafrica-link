<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function categoryTours(Request $request, $slug = null)
    {
        // Find Category by slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Retrieve posts related to this category and paginate
        // $posts = Post::where('category', $category->id)
        //     ->where('visibility', 1)
        //     ->paginate(8);

        $title = 'Posts in Category' . $category->name;
        $description = 'Browse the latest posts in the ' . $category->name . ' category. Stay updated!';

        /**Set SEO Meta Tags */
        // SEOTools::setTitle($title, false);
        // SEOTools::setDescription($description);
        // SEOTools::opengraph()->setUrl(url()->current());


        return view('front.pages.category_tours', compact('category'));
    }

}
