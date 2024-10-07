<!-- add books layout -->
@extends('booklayout')

<!-- page title -->
 @section('title')
 details of {{ $book->title }}
 @endsection

 <!-- page title -->
 @section('maincontent')
      <div class="col-md-4">
        <img src="{{ asset('storage/bookimg/'. $book->book_img)}}" alt="" class="card-img-top">
      </div>
      
      <div class="col-md-8">
      @if(!empty(session('adreview')))
           <div class="w-100 alert alert-success">
            {{ session('adreview')}}
          </div>
      @elseif(session('review'))  
      <div class="w-100 alert alert-danger">
            {{ session('review')}}
          </div>    
           @endif
       <h3 class="h2 mb-3">Title :{{ $book->title }}</h3>
       <div class="h4 text-muted">Author :{{ $book->author }}</div>

       @php
        if($book->reviews_count > 0){
         $avg = $book->reviews_sum_rating/$book->reviews_count; 
         }
         else{
             $avg = 0;
         }
         $precent = ($avg*100)/5;
      @endphp
       <div class="star-rating d-inline-flex ml-2" title="">
          <span class="rating-text theme-font theme-yellow">{{ number_format($avg,1)}}</span>
          <div class="star-rating d-inline-flex mx-2" title="">
              <div class="back-stars ">
                 <i class="fa fa-star " aria-hidden="true"></i>
                 <i class="fa fa-star" aria-hidden="true"></i>
                 <i class="fa fa-star" aria-hidden="true"></i>
                 <i class="fa fa-star" aria-hidden="true"></i>
                 <i class="fa fa-star" aria-hidden="true"></i>
                       
                <div class="front-stars" style="width: {{ $precent}}%">
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

        <div class="content mt-3">
            <p>{{ $book->description }}</p>
            <!-- end book paragraph -->
        </div>
        </div>

        <div class="col-md-12 pt-2">
              <hr>
        </div>
        </div>

        <div class="row mt-4">
          <div class="col-md-12">
              <h2 class="h3 mb-4">Readers also enjoyed</h2>
          </div>
          @if(!empty($relatbooks))
           @foreach($relatbooks as $boks)
          <div class="col-md-4 col-lg-4 mb-4">
          @php
            if($boks->reviews_count > 0){
             $avg = $boks->reviews_sum_rating/$boks->reviews_count; 
             }
             else{
                 $avg = 0;
             }
             $precent = ($avg*100)/5;
        @endphp 
                                <div class="card border-0 shadow-lg">
                                  <a href="{{ route('bookdetails', $boks->id)}}">
                                    <img src="{{ asset('storage/bookimg/'. $boks->book_img) }}" style="height:450px" class="card-img-top">
                                    </a>
                                    <div class="card-body">
                                        <h3 class="h4 heading">{{ $boks->title}}</h3>
                                        <p>by {{ $boks->author}}</p>
                                        <div class="star-rating d-inline-flex ml-2" title="">
                                            <span class="rating-text theme-font theme-yellow">{{number_format($avg,1)}}</span>
                                            <div class="star-rating d-inline-flex mx-2" title="">
                                                <div class="back-stars ">
                                                    <i class="fa fa-star " aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                
                                                    <div class="front-stars" style="width: {{$precent}}%">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="theme-font text-muted">({{($boks->reviews_count > 1)? $boks->reviews_count.'reviews': $boks->reviews_count.'review'}})</span>
                                        </div>
                                    </div>
                                </div>
          </div>
          @endforeach
          @endif                       
     </div>
      <div class="col-md-12 pt-2">
          <hr>
      </div>
                        <!-- user add review -->
                        <div class="row pb-5">
                            <div class="col-md-12  mt-4">
                                <div class="d-flex justify-content-between">
                                    <h3>Reviews</h3>
                                    <div>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            Add Review
                                          </button>
                                          
                            </div>

                        </div>           

                    <!--all users reviews -->
                     @if($book->reviews !='')
                        @foreach($book->reviews as $review)
                        <div class="card border-0 shadow-lg my-4">
                          <div class="card-body">
                            <div class="d-flex justify-content-between">
                               <h5 class="mb-3">{{$review->user->name}}</h4>
                               <span class="text-muted">
                                 {{ \Carbon\Carbon::parse($review->created_at)->format('d M, Y')}}
                              </span>         
                            </div>
                                       
                            <div class="mb-3">
                                            <div class="star-rating d-inline-flex" title="">
                                                <div class="star-rating d-inline-flex " title="">
                                                    <div class="back-stars ">
                                                        <i class="fa fa-star " aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                    
                                                        @php
                                                         $perrats = ($review->rating/5)*100;
                                                        @endphp
                                                        <div class="front-stars" style="width: {{ $perrats }}%">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                                               
                            </div>
                            <div class="content">
                                            <p>{{ $review->review}}</p>
                            </div>
                          </div>
                        </div>
                      @endforeach
                      @else
                      <div class="text-danger">
                        reveiws not found here
                      </div>
                      @endif    
                    <!--end all users reviews  -->
                     </div>
                        </div>
                    </div>
                </div>    
              </div>

          <!-- Modal -->
           
    <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Review for <strong>{{ $book->title }}</strong></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('addreview')}}" method="post">
                      @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Review</label>
                            <textarea name="review" id="review" class="form-control @error('review') is-invalide @enderror" cols="5" rows="5" placeholder="Review"></textarea>
                          </div>
                          <input type="hidden" name="bookid" value="{{ $book->id}}">
                        <div class="mb-3">
                            <label for=""  class="form-label">Rating</label>
                            <select name="rating" id="rating" class="form-control @error('rating') is-invalide @enderror">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
            </div>
        </div>
    </div>     

 @endsection
