@extends('layout')

<!-- title -->
@section('title')
Home page
@endsection
<!-- navbar links -->

@section('searchbooks')
<div class="d-flex justify-content-between">
  <h2 class="mb-3">Books</h2>
  <div class="mt-2">
      <a href="{{ route('home')}}" class="text-dark">Clear</a>
  </div>
</div>
                <!-- searching books  -->
                <div class="card shadow-lg border-0">
                    <form action="{{ route('home')}}" method="get">
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-11 col-md-11">
                                <input type="text" value="{{Request::get('skey')}}" class="form-control form-control-lg" name="skey" placeholder="Search by title">
                            </div>
                            <div class="col-lg-1 col-md-1">
                                <button type="submit" class="btn btn-primary btn-lg w-100"><i class="fa-solid fa-magnifying-glass"></i></button>                                                                    
                            </div>                                                                                 
                        </div>
                    </div>
                    </form>
                </div>
                <!--end searching books  -->
                
                <!-- all books -->
                <div class="row mt-4">

                <!-- here we can add books dyamically -->
                     @foreach($books as $book)
 
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="card border-0 shadow-lg">
                            <a href="{{route('bookdetails',$book->id)}}">
                              @if(!empty($book->book_img !='no img'))
                                <img src="{{ asset('storage/bookimg/'.$book->book_img)}}" style="height:470px;" class="card-img-top">
                              @else
                               <img src="https://placehold.co/910x1400?text=no img" alt="no img" class="card-img-top">
                              @endif
                              </a>

                              @php
                               if($book->reviews_count > 0){
                                $avg = $book->reviews_sum_rating/$book->reviews_count; 
                                }
                                else{
                                    $avg = 0;
                                }
                                $precent = ($avg*100)/5;
                              @endphp
                            <div class="card-body">
                                <h3 class="h4 heading"><a href="#">{{ $book->title}}</a></h3>
                                <p>by {{ $book->author}}</p>
                                <div class="star-rating d-inline-flex ml-2" title="">
                                    <span class="rating-text theme-font theme-yellow">{{ number_format($avg,1)}}</span>
                                    <div class="star-rating d-inline-flex mx-2" title="">
                                        <div class="back-stars ">
                                            <i class="fa fa-star " aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
        
                                            <div class="front-stars" style="width: {{ $precent }}%">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="theme-font text-muted">({{($book->reviews_count > 1)? $book->reviews_count.'reviews': $book->reviews_count.'review'}})</span>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    @endforeach
                <!-- end here we can add books dyamically -->

                    <nav aria-label="Page navigation " >
                        {{$books->links()}}
                      </nav>    
                    
                </div>

@endsection