@extends('dashboard')

<!-- title -->
@section('title')
dashboard
@endsection

<!-- main section -->
@section('content')

<div class="row ms-5 mt-3 px-3 justify-content-between" >
    <div class="col-md-5 card-header text-white" style="height:200px;">
        <div class=" text-white text-center mt-1" >
            <img src="{{ asset('/icons/user.png')}}" class="" style="height:70px;width:90px;">
        </div>
        <h2 class=" text-white text-center mt-2" >{{ $usercount}}</h2>
        <h4 class=" text-white text-center mt-1" >total users</h2>
    </div>
    <div class="col-md-5 ms-2 card-header text-white" style="height:200px;">
    <div class=" text-white text-center mt-1" >
            <img src="{{ asset('/icons/book.png')}}" class="" style="height:70px;width:90px;">
        </div>
        <h2 class=" text-white text-center mt-2" >{{$bookcount}}</h2>
        <h4 class=" text-white text-center mt-1" >total active books</h2>
    </div>
</div>

<div class="row ms-5 mt-3 px-3 justify-content-between" >
    <div class="col-md-5 card-header text-white" style="height:200px;">
        <div class=" text-white text-center mt-1" >
            <img src="{{ asset('/icons/review.png')}}" class="" style="height:70px;width:90px;">
        </div>
        <h2 class=" text-white text-center mt-2" >{{$reviews}}</h2>
        <h4 class=" text-white text-center mt-1" >total reviews</h2>
    </div>
    <div class="col-md-5 ms-2 card-header text-white" style="height:200px;">
    <div class=" text-white text-center mt-1" >
            <img src="{{ asset('/icons/book.png')}}" class="" style="height:70px;width:90px;">
        </div>
        <h2 class=" text-white text-center mt-2" >{{ $paddingbook}}</h2>
        <h4 class=" text-white text-center mt-1" >total book padding</h2>
    </div>
</div>
@endsection
