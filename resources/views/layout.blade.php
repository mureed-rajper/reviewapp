<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <!-- top navigation  -->
    <div class="container-fluid shadow-lg header">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="text-center"><a href="{{route('home')}}" class="h3 text-white text-decoration-none">Book Review App</a></h1>
                <div class="d-flex align-items-center navigation">

                @if(Auth::check())
                <a href="{{ route('dash')}}" class="text-white px-2">Account</a> 
                <a href="{{ route('logout')}}" class="text-white ps-2">Logout</a>
                @else
                    <a href="{{route('paglogin')}}" class="text-white">Login</a>
                    <a href="{{route('register')}}" class="text-white ps-2">Register</a>
                @endif
                </div>
            </div>
        </div>
    </div>

<!-- end top navigation  -->

<!--book section  -->
<div class="container mt-3 pb-5">
        <div class="row justify-content-center d-flex mt-5">
            <div class="col-md-12">

            <!-- searching books and books list here -->
             @yield('searchbooks')
            </div>
        </div>
</div>            