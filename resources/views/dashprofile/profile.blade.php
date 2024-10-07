@extends('dashboard')

<!-- title -->
 @section('title')
 profile
 @endsection

<!-- dash content -->
 @section('content') 
                <div class="card ms-5 w-50 border-0 shadow-lg">
                    <div class="card-header  text-white">
                    {{$profile->name}} {{" your profile"}}
                </div>
                <div class="row px-3 mt-3 mb-4">
                    <div class="col-md-12 mt-2 form-control">{{ $profile->name }}</div>
                    <div class="col-md-12 mt-2 form-control">{{ $profile->age }}</div>
                    <div class="col-md-12 mt-2 form-control">{{ $profile->email }}</div>
                </div>
                </div>
  
 @endsection
<!--end dash content -->