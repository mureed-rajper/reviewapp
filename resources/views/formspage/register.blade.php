
<!-- forms layout -->
 @extends('formlayout')

<!-- title -->
@section('title')
Register
@endsection

<!-- form heading  -->
@section('heading')
Register Now
@endsection

<!-- form -->
@section('form')
<form action="{{ route('regis')}}" method="post">
    @csrf
 <div class="row gy-3 overflow-hidden">
    <div class="col-12">
        <div class="form-floating mb-3">
            <input type="text" value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" >
            <label for="text" class="form-label">Name</label>
      </div>
      @error('name')
      <span class="text-danger">
          {{ $message }}
      </span>
      @enderror
    </div>
    <div class="col-12">
        <div class="form-floating mb-3">
            <input type="text" value="{{ old('age')}}" class="form-control @error('email') is-invalid @enderror" name="age" id="age" placeholder="age" >
            <label for="text" class="form-label">Age</label>
        </div>
        @error('age')
      <span class="text-danger">
          {{ $message }}
      </span>
      @enderror
    </div>
  
    <div class="col-12">
        <div class="form-floating mb-3">
            <input type="text" value="{{ old('email')}}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" >
            <label for="text" class="form-label">Email</label>
        </div>
        @error('email')
      <span class="text-danger">
          {{ $message }}
      </span>
      @enderror
    </div>
   
    <div class="col-12">
             <div class="form-floating mb-3">
                 <input type="password" value="{{ old('password')}}" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" >
             <label for="password" class="form-label">Password</label>
           </div>
           @error('password')
   <span class="text-danger">
    {{ $message}}

   </span>
   @enderror
   </div>
 
   <div class="col-12">
       <div class="d-grid">
           <button class="btn bsb-btn-xl btn-primary py-3" type="submit">Register Now</button>
       </div>
   </div>
 </div>
</form>
@endsection


<!-- login form link -->
 @section('logregis')
 
 <a href="{{route('login')}}" class="link-secondary text-decoration-none">Click here to login</a>
@endsection 