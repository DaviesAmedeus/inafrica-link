<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function adminDashboard(Request $request)
    {

        $data = [
            'pageTitle' => 'Dashboard'
        ];

        return view('back.pages.dashboard', $data);
    }


     public function logoutHandler(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        if (isset($request->source)) {
            return redirect()->back();
        }
        return redirect()->route('admin.login')->with('fail', 'You are now logged out!');
    }



     public function categoriesPage(Request $request){
        $data = [
            'pageTitle'=> 'Manage categories',

        ];

                    return view('back.pages.categories_page', $data);
    }

}
