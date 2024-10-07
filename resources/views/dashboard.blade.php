<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
<link rel="stylesheet" href="{{asset('css/style.css')}}">

<!-- @stack('style') -->
</head>
<body>
    <div class="container-fluid">
    <!-- dash top navigation -->
    <div class="container-fluid shadow-lg header">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="text-center"><a href="{{ route('home')}}" class="h3 text-white text-decoration-none">Book Review App</a></h1>
                <h4 class="text-center text-white mt-3">Welcome  {{ Auth::user()->name}}</h4>
                <div class="d-flex align-items-center navigation">
                    <a href="{{ route('home')}}" class="text-white px-2">Home</a>                    
                    <a href="{{route('logout')}}" class="text-white px-2">Logout</a>         
                                
                </div>
            </div>
        </div>
    </div>
    
 <!-- end dash top navigation -->
 
 <!--  dash sidebar -->
  <div class="container">
    <div class="row">
        <div class="col-md-3 " >
          <div class="card border-0 shadow-lg mt-3">
                    <div class="card-header  text-white">
                       <a href="{{ route('dash')}}" class="text-white text-decoration-none"> DashBoard</a>
                    </div>
                    <div class="card-body sidebar">
                        <ul class="nav flex-column">
                            @if(Auth::user()->role =='admin')
                            <li class="nav-item">
                                <p class="text-primary">Books</p>
                                 <a href="{{ route('books.index')}}" class="">Books</a> <br>
                                 <a href="{{route('books.create')}}" class="">Add book</a>
                                </li>
                            </li>   
                            <li class="nav-item">
                                <a href="{{ route('reviewlist')}}">Reviews</a>                               
                            </li>
                            @endif
                            <li class="nav-item">
                                <p class="text-primary">Profile</p>
                                 <a href="{{route('profile',Auth::user()->id )}}" class="">Profile</a>
                                </li>
                            <li class="nav-item">
                                <a href="{{ route('myreview')}}">My Reviews</a>
                            </li>
                        </ul>
                    </div>
          </div>
        </div>
    
<!--  end dash sidebar -->

<!-- dash main content -->

<!-- show message -->
 

 <div class="col-md-8  mt-3">

 <!-- auth section -->
 @if(session('auth'))
 <div class="col-md-12 alert alert-danger">
   {{ session('auth')}}
 </div>
 @endif
 <!-- end auth section -->

    @if(session('insert'))
    <div class="alert alert-primary w-100 mb-1"> 
      @yield('msg')
    </div>
    @elseif(session('updats'))
    <div class="alert alert-success w-100 mb-1"> 
      @yield('update')
    </div>
    @elseif(session('delets'))
    <div class="alert alert-danger w-100 mb-1"> 
      @yield('delete')
    </div>
    @endif  

 <!--end show message -->   
    @yield('content')
 </div>
<!-- end dash main content -->
</div>     
  </div>


</div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
     @stack('srcipt') 
</body>
</html>
