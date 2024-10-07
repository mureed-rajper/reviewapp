<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashbookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DashController;




// home page route
Route::get('/',[HomeController::class,'index'])->name('home');

// make route for  login and registration page here


// user logout here

// one middleware used with multiple routes

Route::group(['middleware' => 'guest'], function(){
    Route::get('/register',[AccountController::class,'registerpage'])->name('register');
    Route::get('/login',[AccountController::class,'loginpage'])->name('paglogin');
    // make route for user register and login
    Route::post('/register',[AccountController::class,'register'])->name('regis');
    Route::post('/login',[AccountController::class,'login'])->name('login');
});

Route::group(['middleware' => 'auth'], function(){
    
    // spacific book details
     Route::get('/book/details/{id}',[HomeController::class, 'bookdetails'])->name('bookdetails');
   
    // add review 
    Route::post('/addreview',[HomeController::class, 'addreview'])->name('addreview'); 
    
    Route::group(['middleware' => 'admin'], function(){
       //review list 
       Route::get('/reviewlist',[ReviewController::class, 'index'])->name('reviewlist'); 
       Route::get('/editreview/{id}',[ReviewController::class, 'edit'])->name('edit.review'); 
       Route::post('/updatereview/{id}',[ReviewController::class, 'update'])->name('update.review'); 
       Route::delete('/deletereview/{id}',[ReviewController::class, 'delete'])->name('delete.review');
       
       // these all routes relate dashboard books
       Route::resource('/books',DashbookController::class);
       // Route::post('/sotrebooks', [DashbookController::class,'storbook'])->name('storbook');

    });
    
    
    //THESE ARE ROUTES FOR MYREVIEWS  
    Route::get('/myreview',[ReviewController::class, 'myreview'])->name('myreview'); 
    Route::get('/editmyreview/{id}',[ReviewController::class, 'editmyreview'])->name('editmyreview'); 
    Route::post('/updatemyreview/{id}',[ReviewController::class, 'myupdate'])->name('myupdate'); 
    Route::delete('/deletemyreview/{id}',[ReviewController::class, 'delets'])->name('mydelte'); 

    Route::get('/dashre', [DashController::class, 'dashre'])->name('dash');
    Route::get('/logout',[AccountController::class,'logout'])->name('logout');
    
    // these all routes relate dashboard profile
    Route::get('/indexprofile/{id}', [AccountController::class,'profile'])->name('profile');
    Route::get('/editpprofile/{id}', [AccountController::class,'editpro'])->name('editprofile');
    Route::put('/updateprofile/{id}', [AccountController::class,'updatsprofile'])->name('updatepro');
        




});


?>
