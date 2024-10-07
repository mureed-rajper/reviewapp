<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashbook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class DashbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $rest)
    {
        $books = Dashbook::orderBy('created_at','desc');
        if(!empty($rest->keyword)){
          $books = Dashbook::where('title','like','%'.$rest->keyword.'%');
         }

        // show all books
        $books = $books->paginate(6);
        return view('dashbook.books',['book' => $books]);
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //show form for add new book
        return view('dashbook.addbook');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'author' => 'required | min:5',
                'desp' => 'required |',
                'status' => 'required',
            ]
            );

          if($validate->fails()){

            return redirect()->route('books.create')->withInput()->withErrors($validate);
          }  
        // store books data

        // books img store public foler 

        $imgs = $request->bookimg;
        if(!empty($imgs)){

            $imgext = time() . '.'. $imgs->getClientOriginalExtension();
            $imgs->move(public_path('/storage/bookimg/'), $imgext);

             // DATA INSERTING WITH IMAGE HERE
               $books = Dashbook::create([
                   'title' => $request->title,
                   'author' => $request->author,
                   'description' => $request->desp,
                   'book_img' => $imgext,
                   'status' => $request->status,
               ]);
        }
        else{
            $books = Dashbook::create([
                'title' => $request->title,
                'author' => $request->author,
                'description' => $request->desp,
                'status' => $request->status,
            ]);
        }

       

        return redirect()->route('books.index')->with('insert' , 'book add successfully !');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // show update books form

        $book = Dashbook::findOrFail($id);
        return view('dashbook.editbook',['book' => $book]);
    }

    /**
     * Update the specified resource in storage. 
     */
    public function update(Request $request, string $id)
    {
        //UPDATE IMGS
        $updatimg = Dashbook::find($id);
        if($request->hasFile('image'))
        {
            if($updatimg !="no img "){
              $oldimg = public_path('storage/bookimg/'. $updatimg->book_img);
              unlink($oldimg);
            }
        }
 
        $update = Dashbook::where('id','=',$id);
        $imgs = $request->image;
        if(!empty($imgs)){
            $imgext = time() . '.'. $imgs->getClientOriginalExtension();
            $imgs->move(public_path('/storage/bookimg/'), $imgext);
            $update->update([
                'title' => $request->title,
                'author' => $request->author,
                'description' => $request->desp,
                'book_img' => $imgext,
                'status' => $request->status,
            ]);
        }
        else{
            $update->update([
                'title' => $request->title,
                'author' => $request->author,
                'description' => $request->desp,
                'status' => $request->status,
            ]);
        }

        // $upimg = $request->fille;
      return redirect()->route('books.index')->with('updats','book update successfully !');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delte
        $deltes = Dashbook::find($id);
        if($deltes->book_img !="no img")
        {
             $oldpath = public_path('storage/bookimg/'. $deltes->book_img);
             unlink($oldpath);
        }

        $deltes->delete();
        return redirect()->route('books.index')->with('delets', 'books delete successfully !');
    }
}
