@extends('dashboard')

<!-- page title -->
 @section('title')
update book
 @endsection


<!-- content -->
@section('content')
<div class="card border-0 shadow">
                    <div class="card-header  text-white">
                        Update Book
                    </div>
                    <div class="card-body">
                        <form action="{{ route('books.update',$book->id)}}" method="post" enctype="multipart/form-data">
                         @csrf
                         @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                             <label for="title" class="form-label">Title</label>
                             <input value="{{ $book->title}}" type="text" class="form-control" placeholder="Title" name="title" id="title" />
                            </div>
                            <div class="col-md-6">
                             <label for="author" class="form-label">Author</label>
                             <input value="{{ $book->author}}" type="text" class="form-control" placeholder="Author"  name="author" id="author"/>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="author" class="form-label">Description</label>
                            <textarea name="desp" class="form-control" placeholder="Description" cols="30" rows="5">{{ $book->description}}</textarea>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                              <label for="Image" class="form-label">Image</label>
                              <input type="file" class="form-control"  name="image" onchange="document.querySelector('#img').src=window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="col-md-6">
                              <label for="" class="form-label">Status</label>
                              <select name="status" id="status" class="form-control">
                                  <option value="active" {{($book->status == 'active') ? 'selected' : ''}}>Active</option>
                                  <option value="block" {{($book->status == 'block') ? 'selected' : ''}}>Block</option>
                              </select>
                            </div>
                             
                           </div>
                          <div class="row mt-4">
                           @if(!empty($book->book_img))
                            <div class="col-md-6">
                                <strong>Selected Image</strong>
                            </div>
                            <div class="col-md-6">
                            <img id="img"  name ="fille" src="{{asset('storage/bookimg/'. $book->book_img)}}" class="img-thumbnail m-2" style="width:150px;height:150px;">
                            </div>                              
                           @endif
                          </div>
                        
                        <button class="btn btn-primary mt-3">Update</button> 
                        </form>                    
                    </div>
@endsection