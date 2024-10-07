@extends('dashboard')

<!-- page -->

@section('title')
book list
@endsection



<!-- message -->
 @section('msg')
    {{session('insert')}}
 @endsection

 <!-- update msg -->
 @section('update')
  {{ session('updats') }}
 @endsection

 <!-- delete msg -->
 @section('delete')
  {{ session('delets') }}
 @endsection

<!-- content -->
@section('content')
<div class="card border-0 shadow">

                    <div class="card-header  text-white">
                        Books
                    </div>
                    <div class="card-body pb-0">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('books.create')}}" class="btn btn-primary">Add Book</a>
                            <form action="{{ route('books.index')}}" method="get">
                            <div class="d-flex justify-content-bewteen">
                                <input type="text" class="form-control" value="{{ Request::get('keyword')}}" placeholder="keyword title" name="keyword">
                                <button type="submit" class="btn ms-2 btn-primary">Search</button>
                                <a href="{{ route('books.index')}}" class="btn btn-secondary ms-2">Clear</a>
                            </div>            
                        </form>

                        </div>          
                        <table class="table  table-striped mt-3">
                            <thead class="table-dark">
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th width="80">Action</th>
                                    </tr>
                                <tbody>
                                 @if($book == 'empty')
                                   <tr>
                                    <td> your searching not found</td>
                                   </tr>
                                 @else
                                    @foreach($book as $books)
                                    <tr>

                                        <td>{{$books->title}}</td>
                                        <td>{{$books->author}}</td>
                                        <td>3.0 (3 Reviews)</td>
                                        @if($books->status == 'active')
                                        <td class="text-success">{{$books->status}}</td>
                                        @else
                                        <td class="text-danger">{{$books->status}}</td>
                                        @endif
                                        <td  class="d-flex">
                                           <a href="{{ route('books.edit',$books->id)}}" class="btn btn-primary btn-sm m-1"><i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('books.destroy', $books->id)}}" method="post" class="m-1">
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
                            @if($book == 'empty')
                            
                            @else
                             {{$book->links()}}
                            @endif
                        </nav>                  
                    </div>
                    
                </div> 
@endsection                  