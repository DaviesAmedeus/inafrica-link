<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $title = isset(settings()->site_title) ? settings()->site_title : '';
        $description = isset(settings()->site_meta_description) ? settings()->site_meta_description : '';
        $imgURL = isset(settings()->site_logo) ? asset('/images/site/' . settings()->site_logo) : '';
        $keywords = isset(settings()->site_meta_keywords) ? settings()->site_meta_keywords : '';
        $currentUrl = url()->current();

        /**Meta SEO */
        SEOTools::setTitle($title, false);
        SEOTools::setDescription($description);
        SEOMeta::setKeywords($keywords);

        /**Open Graph */
        SEOTools::opengraph()->setUrl($currentUrl);
        SEOTools::opengraph()->addImage($imgURL);
        SEOTools::opengraph()->addProperty('type', 'articles');

        /** Twitter */
        SEOTools::twitter()->addImage($imgURL);
        SEOTools::twitter()->setUrl($currentUrl);
        SEOTools::twitter()->setSite('@inafrica-link');


        $data = ['pageTitle' => $title];

    return view('front.pages.index', $data);
    }


    public function about(){
        $title = 'about';
        $description = isset(settings()->site_meta_description) ? settings()->site_meta_description : '';
        $imgURL = isset(settings()->site_logo) ? asset('/images/site/' . settings()->site_logo) : '';
        $keywords = isset(settings()->site_meta_keywords) ? settings()->site_meta_keywords : '';
        $currentUrl = url()->current();

        /**Meta SEO */
        SEOTools::setTitle($title, false);
        SEOTools::setDescription($description);
        SEOMeta::setKeywords($keywords);

        /**Open Graph */
        SEOTools::opengraph()->setUrl($currentUrl);
        SEOTools::opengraph()->addImage($imgURL);
        SEOTools::opengraph()->addProperty('type', 'articles');

        /** Twitter */
        SEOTools::twitter()->addImage($imgURL);
        SEOTools::twitter()->setUrl($currentUrl);
        SEOTools::twitter()->setSite('@inafrica-link');


        $data = ['pageTitle' => $title];
        return view('front.pages.about');
    }
}
