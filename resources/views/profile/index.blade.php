@extends('layouts.main')

@section('sidebar')
    @include('partials.sidebar')    
@endsection


@section('container')
    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container my-5 mx-3">
            @if (session()->has('success'))
                <div class="alert alert-success col-md-8 p-3 mb-3" role="alert">{{ session('success') }}</div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger col-md-7 p-3 mb-3" role="alert">
                    <h6 class="mb-2">Action Failed!</h6>
                    <p>{{ session('error') }}</p>
                </div> 
            @endif

            @if($errors->any())
                <div class="alert alert-danger col-md-8 p-3 mb-3" role="alert">
                    <h6>Action Failed!</h6>
                    <ul class=" mt-2 mb-0 ms-3">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                    </ul>
                </div> 
            @endif
            
            {{-- Todo[P] : profile user --}}
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <h4 class="text-right">Profile</h4>
                            <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                            <span class="font-weight-bold">{{ auth()->user()->name }}</span>
                            <span class="text-black-50">{{ auth()->user()->email }}</span>
                        <span> </span></div>
                    </div>
                    <div class="col-md-7">
                        <div class="d-flex flex-column align-items-left p-3 py-5">
                            <h5 class="text-right">Name</h5>
                            <div class="col-sm-10"></div>
                            <input class="form-control form-control-lg" type="text" placeholder="    {{ auth()->user()->name }}" readonly><br>
                            <h5 class="text-right">Email</h5>
                            <input class="form-control form-control-lg" type="text" placeholder="    {{ auth()->user()->email }}" readonly><br>
                            <h5 class="text-right">Phone</h5>
                            <input class="form-control form-control-lg" type="text" placeholder="    {{ auth()->user()->phone_number }}" readonly><br>
                            <h5 class="text-right">Address</h5>
                            <input class="form-control form-control-lg" type="text" placeholder="    {{ auth()->user()->address }}" readonly><br>
                            <h5 class="text-right">Province</h5>
                            <input class="form-control form-control-lg" type="text" placeholder="    {{ auth()->user()->province }}" readonly><br>
                            <h5 class="text-right">City</h5>
                            <input class="form-control form-control-lg" type="text" placeholder="    {{ auth()->user()->city }}" readonly><br>
                            <h5 class="text-right">Post Code</h5>
                            <input class="form-control form-control-lg" type="text" placeholder="    {{ auth()->user()->post_code }}" readonly><br>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Todo[P] --}}
            </div>
            </div>
        </div>
    </div>
    
@endsection