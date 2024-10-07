@extends('dashboard')

<!-- page -->

@section('title')
reviews list
@endsection

<!-- content -->
@section('content')
<div class="card border-0 shadow">
    
   <div class="card-header  text-white">
       Update Reivew
   </div>
   <div class="px-2">
                        
     <div class="card-body px-3">
           <form action="{{ route('update.review', $edits->id)}}" method="post">
            @csrf
            <label for="">Status</label>
            <select name="status" class="form-control">
                <option value="active" {{ ($edits->status == "active") ? 'selected' : '' }}>Active</option>
                <option value="block" {{ ($edits->status == "block") ? 'selected' : '' }}>Block</option>
            </select>
            <button type="sbumit" class="btn btn-primary mt-3">Update</button>
           </form>
         
     </div> 
</div> 
@endsection                  