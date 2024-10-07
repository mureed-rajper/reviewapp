@extends('dashboard')

<!-- page -->

@section('title')
reviews list
@endsection

<!-- content -->
@section('content')
<div class="card border-0 shadow">
    
   <div class="card-header  text-white">
       Update My Reivew
   </div>
   <div class="px-2">
                        
     <div class="card-body px-3">
           <form action="{{ route('myupdate', $editmy->id)}}" method="post">
            @csrf
            <div class="my-3">
                Book : <strong>{{$editmy->dashbook->title}}</strong>
            </div>
            <div class="">
                <label for="">Review</label>
             <textarea name="review" id="" class="form-control">{{$editmy->review}}</textarea>
            </div>
            <label class="mt-2">Rating</label>
            <select name="rating" class="form-control">
                <option value="1" {{ ($editmy->rating == 1) ? 'selected' : '' }}>1</option>
                <option value="2" {{ ($editmy->rating == 2) ? 'selected' : '' }}>2</option>
                <option value="3" {{ ($editmy->rating == 3) ? 'selected' : '' }}>3</option>
                <option value="4" {{ ($editmy->rating == 4) ? 'selected' : '' }}>4</option>
                <option value="5" {{ ($editmy->rating == 5) ? 'selected' : '' }}>5</option>
            </select>
            <button type="sbumit" class="btn btn-primary mt-3">Update</button>
           </form>
         
     </div> 
</div> 
@endsection                  