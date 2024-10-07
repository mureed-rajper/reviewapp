@extends('dashboard')

<!-- page -->

@section('title')
reviews list
@endsection

<!-- content -->
@section('content')

<!--show messages for delete and update  -->
@if(session('update'))
    <div class="col-md-12 alert alert-success">
       {{ session('update')}}
    </div>
 @elseif(session('delete'))
  <div class="col-md-12 alert alert-danger">
       {{ session('delete')}}
  </div>
   @endif

<div class="card border-0 shadow">

                    <div class="card-header  text-white">
                        Reivews
                    </div>
                    <div class="px-2">
                        
                    <div class="card-body">
                     <div class="d-flex justify-content-center">
                         <form action="{{ route('reviewlist')}}" method="get" class="d-flex justify-content-center">
                            @csrf
                            <input type="text" value="{{ Request::get('keys')}}" name="keys" class="form-control" placeholder="searching...key">
                            <button type="submit"  class="btn btn-primary ms-2">Search</button>
                        </form>
                        <a href="{{ route('reviewlist')}}" class="btn btn-secondary ms-2">Clear</a>
                     </div>
                    </div>          
                        <table class="table  table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Book</th>
                                    <th>Review</th>
                                    <th>Rating</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th width="90">Action</th>
                                    </tr>
                                <tbody>
                                    @if(!empty($reviews))
                                    @foreach($reviews as $review)
                                    <tr>

                                        <td>{{$review->dashbook->title}}</td>
                                        <td>{{$review->review}}</td>
                                        <td>{{$review->rating}}</td>
                                        <td>{{ \Carbon\Carbon::parse($review->created_at)->format('d M, Y') }}</td>
                                        @if($review->status == 'active')
                                        <td class="text-success">{{$review->status}}</td>
                                        @else
                                        <td class="text-danger">{{$review->status}}</td>
                                        @endif
                                        <td  class="d-flex"><a href="{{ route('edit.review',$review->id)}}" class="btn btn-primary btn-sm m-1"><i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('delete.review', $review->id)}}" method="post" class="m-1">
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                  @endif                  
                                    
                                </tbody>
                            </thead>
                        </table>   
                        <nav aria-label="Page navigation " >
                            
                             {{$reviews->links()}}
                            
                        </nav>                  
                    </div>
                    </div>
                    
                </div> 
@endsection                  