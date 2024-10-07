<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dashbook;
use App\Models\Review;

class DashController extends Controller
{
    //

    public function dashre(){
        $usercount = User::get()->count();
        $bookcount = Dashbook::where('status','=','active')->get()->count();
        $peddingbook = Dashbook::where('status','!=','active')->get()->count();
        $reviewcount = Review::where('status','=','active')->get()->count();

        return view('dashbook.dash',['usercount' => $usercount, 'bookcount' => $bookcount, 'paddingbook' => $peddingbook,'reviews' => $reviewcount]);
   }
}
