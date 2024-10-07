<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use App\Models\Dashbook;
use Illuminate\Support\Facades\Auth;
class ReviewController extends Controller
{
    //

    public function index(Request $request){
        
        $reviews = Review::with('dashbook','user')->orderBy('created_at','desc');
        // searching option
          $keys = $request->keys;
        if(!empty($keys)){
           $reviews = $reviews->where('review','like','%'.$keys.'%');
         }

         $reviews = $reviews->paginate(6);
         // return $reviews;
         return view('review.revieslist', ['reviews' => $reviews]);
        }


        // show EDIT page THE REVIEWS
        public function edit($id){
         
            $edits = Review::select('id','status')->find($id);
            return view('review.editreview', ['edits' => $edits]); 
        }

        // UPDATE REVIEW STATUS
        public function update(Request $request, $id)
        {
                $update = Review::where('id','=',$id)->update([
                    'status' => $request->status
                ]);

            return redirect()->route('reviewlist')->with('update','review status updated successfully !');
        }

        // DELETE REVIEW
        public function delete($id)
         {
             $review = Review::find($id);
             $reviewdelet = $review->delete();

             if($reviewdelet)
             {
                return redirect()->route('reviewlist')->with('delete','user review deleted successfully !');
             }
         }


     //THESE ARE METHODS USED FOR MY REVIEWS SECTION
       
    //  show all my review
    public function myreview(Request $request){
        
        $myreview = Review::with('dashbook')->where('user_id','=', Auth::user()->id);
        
        if(!empty($request->keys)){
            $myreview = $myreview->where('review','like', '%'.$request->keys.'%');
        }
        $myreview = $myreview->paginate(6);
        return view('review.myreview', ['myreview' => $myreview]);
    }

    // edity myreview form
    public function editmyreview($id)
    {
        $editmy = Review::with('dashbook')->where('user_id','=',Auth::user()->id)->find($id);
        return view('review.editmyreview', ['editmy' => $editmy]);
    }

    // update my review
    public function myupdate(Request $request, $id)
    {
        $update = Review::where('id',$id)->update([
            'review' => $request->review,
            'rating' => $request->rating,
        ]);
        if($update)
        {
            return redirect()->route('myreview')->with('myupdate', 'your review update successfully !');
        }
    }

    // DELETE MY REVIEWs
    public function delets($id){
         
        $delete = Review::find($id);
        $deletes = $delete->delete();

        if($deletes)
        {
         return redirect()->route('myreview')->with('delete','my review deleted successfully !');
        }
    }

    
    


}
?>
