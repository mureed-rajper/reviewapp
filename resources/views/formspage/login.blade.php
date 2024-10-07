
<!-- forms layout -->
@extends('formlayout')

<!-- title -->
@section('title')
Login
@endsection

<!-- form heading  -->
@section('heading')
Login Now
@endsection

<!-- form -->
@section('form')
<form action="{{route('login')}}" method="post">
    @csrf
 <div class="row gy-3 overflow-hidden">
    </div>
    <div class="col-12">
        <div class="form-floating mb-3">
            <input type="" value="{{ old('email') }}" class="form-control @error('email') is-invalide @enderror" name="email" id="email" placeholder="name@example.com" >
            <label for="text" class="form-label">Email</label>
        </div>

        @error('email')
        <span class="text-danger">
            {{$message}}
        </span>
        @enderror
    </div>
    <div class="col-12">
             <div class="form-floating mb-3">
                 <input type="password" class="form-control @error('password') is-invalide @enderror" name="password" id="password" placeholder="Password" >
             <label for="password" class="form-label">Password</label>
           </div>
           @error('password')
        <span class="text-danger">
            {{$message}}
        </span>
        @enderror
   </div>
   <div class="col-12">
       <div class="d-grid">
           <button class="btn bsb-btn-xl btn-primary py-3" type="submit">Login</button>
       </div>
   </div>
 </div>
</form>
@endsection


<!-- login form link -->
 @section('logregis')
 
 <a href="{{route('register')}}" class="link-secondary text-decoration-none mb-5">Click here to register</a>
@endsection 