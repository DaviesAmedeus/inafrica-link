<?php

use App\Models\Category;
use App\Models\GeneralSetting;
use App\Models\ParentCategory;
use Illuminate\Support\Str;


/*** Site Information */
if (!function_exists('settings')) {
    function settings()
    {
        $settings = GeneralSetting::take(1)->first();
        if (!is_null($settings)) {
            return $settings;
        }
    }
}


/** STRIP WORD */
if(!function_exists('words')){
    function words($value, $words = 15, $end= "..."){
        return Str::words(strip_tags($value), $words, $end);
    }
}

/*** Dynamic Navigation menus */
if (!function_exists('navigations')) {
    function navigations()
    {
        $navigations_html = '';

        // with dropdown
        $pcategories = ParentCategory::whereHas('children')->orderBy('name', 'asc')->get();

        // without dropdown
        $categories = Category::where('parent', 0)->orderBy('name', 'asc')->get();



      foreach ($pcategories as $item) {

    // Get current slug from URL
    $currentSlug = request()->route('slug');

    // Check if current slug exists in children
    $isActive = $item->children->contains('slug', $currentSlug);

    $activeClass = $isActive ? 'active' : '';

    $navigations_html .= '
        <div class="nav-item dropdown">
            <a href="#"
               class="nav-link dropdown-toggle '.$activeClass.'"
               data-bs-toggle="dropdown">
               '.$item->name.'
            </a>

            <div class="dropdown-menu m-0">
    ';

    foreach ($item->children as $category) {

        $childActive = $currentSlug == $category->slug ? 'active' : '';

        $navigations_html .= '
            <a href="'.route('category_tours', $category->slug).'"
               class="dropdown-item '.$childActive.'">
               '.$category->name.'
            </a>
        ';
    }

    $navigations_html .= '
            </div>
        </div>
    ';
}
        if (count($categories) > 0) {
            foreach ($categories as $item) {
                                     $activeClass = request()->route('slug') == $item->slug ? 'active' : '';


                $navigations_html .= '
                         <a href="'.route('category_tours', $item->slug).'" class="nav-item nav-link '.$activeClass.'  ">'.$item->name.'</a>
                ';


            }
        }


        return $navigations_html;
    }
}

