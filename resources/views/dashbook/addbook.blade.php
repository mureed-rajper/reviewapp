@extends('dashboard')

<!-- page title -->
 @section('title')
 book view
 @endsection

 <!-- content -->
@section('content')
<div class="card border-0 shadow">
                     <div class="card-header  text-white">
                        Add New Book
                    </div>
                    <div class="card-body">
                        <form action="{{ route('books.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-md-6">
                               <label for="title" class="form-label">Title</label>
                               <input  type="text" value="{{ old('title')}}" class="form-control @error('title') is-invalide @enderror" placeholder="Title" name="title" id="title"/>
                               <span class="text-danger">
                                   @error('title')
                                   {{ $message }}
                                   @enderror
                               </span>
                            </div>
                            <div class="col-md-6">
                              <label for="author" class="form-label">Author</label>
                              <input  type="text" value="{{ old('author')}}" class="form-control @error('author') is-invalide @enderror" placeholder="Author"  name="author" id="author"/>
                              <span class="text-danger">
                                  @error('author')
                                  {{ $message }}
                                  @enderror
                              </span>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label for="author" class="form-label">Description</label>
                            <textarea name="desp" class="form-control @error('desp') is-invalide @enderror" placeholder="Description" cols="30" rows="5">{{old('desp')}}</textarea>
                            <span class="text-danger">
                                @error('desp')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                              <label for="Image" class="form-label">Image</label>
                              <input type="file" class="form-control @error('bookimg') is-invalide @enderror"  name="bookimg" id="image"/>
                              <span class="text-danger">
                                  @error('bookimg')
                                  {{ $message }}
                                  @enderror
                              </span>
                            </div>
                            <div class="col-md-6">
                              <label for="" class="form-label">Status</label>
                              <select name="status" id="status" class="form-control">
                                  <option value="active">Active</option>
                                  <option value="block">Block</option>
                              </select>
                            </div>
                               
                        </div>
                        
                        <button class="btn btn-primary mt-3">Add</button>    
                        </form>                 
                    </div>
@endsection