<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashbook;
use App\Models\Review;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //show home and books data
    public function index(Request $request){

        $books = Dashbook::withCount('reviews')->withSum('reviews','rating')->orderBy('created_at','desc');
        if(!empty($request->skey))
        {
           $books = Dashbook::where('title','like','%'.$request->skey.'%');
         }
         $books = $books->where('status','=','active')->paginate(8);
         // dd($books); 
        return view('home', ['books' => $books]);
   }

   // spacific book details 
   public function bookdetails($id){

   //   clickable book details
      $book = Dashbook::with(['reviews.user', 'reviews' => function($query){
         $query->where('status','=','active');
      }])->withCount('reviews')->withSum('reviews','rating')->findOrFail($id);

      // return $book;
   // related book details 
     $books = Dashbook::withCount('reviews')->withSum('reviews','rating')->where('status','=','active')->take(3)->where('id','!=',$id)->inRandomOrder()->get();

      return view('books.bookdetail', ['book' => $book, 'relatbooks' => $books]);
      
   }

   // ADD REVIEWS 
   public function addreview(Request $requst){
      
      $count = Review::where('user_id',Auth::user()->id)->where('dashbook_id','=', $requst->bookid)->count();
       
      if($count > 0){
         return redirect()->route('bookdetails', $requst->bookid)->with('review', ' you already add a review and you can add one time!');

      }
      else{
         if($requst->review == '')
          {
          }
          else{
              $review = Review::create([
                 'review' => $requst->review,
                 'rating' => $requst->rating,
                 'user_id' => Auth::user()->id,
                 'dashbook_id' => $requst->bookid,
              ]);
              return redirect()->route('bookdetails', $requst->bookid)->with('adreview', 'added your review successfully !');
          }
      }
   }
}

?>
