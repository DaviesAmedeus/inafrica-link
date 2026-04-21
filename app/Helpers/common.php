<?php

use App\Models\Category;
use App\Models\ParentCategory;

/*** Dynamic Navigation menus */
if (!function_exists('navigations')) {
    function navigations()
    {
        $navigations_html = '';

        // with dropdown
        $pcategories = ParentCategory::whereHas('children')->orderBy('name', 'asc')->get();

        // without dropdown
        $categories = Category::where('parent', 0)->orderBy('name', 'asc')->get();



        if (count($pcategories) > 0) {
            foreach ($pcategories as $item) {
                $navigations_html .= '
                        <div class="nav-item dropdown">
                            <a href="#!" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">'. $item->name .'</a>

                            <div class="dropdown-menu m-0">
            ';

                foreach ($item->children as $category) {

                        $navigations_html .=   '<a href="'.route('category_tours', $category->slug).'" class="dropdown-item">'.$category->name.'</a> ';

                }

                $navigations_html .= '
                            </div>
                        </div>
            ';
            }
        }
        if (count($categories) > 0) {
            foreach ($categories as $item) {
                $navigations_html .= '
                         <a href="'.route('category_tours', $category->slug).'" class="nav-item nav-link ">'.$item->name.'</a>
                ';


            }
        }

        return $navigations_html;
    }
}

