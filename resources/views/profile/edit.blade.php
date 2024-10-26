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
        
            <div class="container rounded bg-white mt-5 mb-5">
                <h1 class="mt-2 px-3">Edit Profile</h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex flex-column align-items-left p-3 py-5">
                            <h5 class="text-right">Name</h5>
                            <form action="/profile" method="post">
                                @csrf
                                @method('put')
                                
                                <div class="row g-3">
                                    <div class="col-sm-7 col-md-7">
                                        <input class="form-control form-control-lg px-3" name="name" id="name" type="text" value="{{ auth()->user()->name }}" required>
                                    </div>
                                </div>
                                <br>
                                <h5 class="text-right">Phone</h5>
                                <div class="row g-3">
                                    <div class="col-sm-7 col-md-7">
                                        <input class="form-control form-control-lg px-3" name="phone_number" id="phone_number" type="text" value="{{ auth()->user()->phone_number }}">
                                    </div>
                                </div>
                                <br>
                                <h5 class="text-right">Address</h5>
                                <div class="row g-3">
                                    <div class="col-sm-7 col-md-7">
                                        <input class="form-control form-control-lg px-3" name="address" id="address" type="text" value="{{ auth()->user()->address }}">
                                    </div>
                                </div>
                                <br>
                                <h5 class="text-right">Province</h5>
                                <div class="row g-3">
                                    <div class="col-sm-7 col-md-7">
                                        <input class="form-control form-control-lg px-3" name="province" id="province" type="text" value="{{ auth()->user()->province }}" >
                                    </div>
                                </div>
                                <br>
                                <h5 class="text-right">City</h5>
                                <div class="row g-3">
                                    <div class="col-sm-7 col-md-7">
                                        <input class="form-control form-control-lg px-3" name="city" id="city" type="text" value="{{ auth()->user()->city }}">
                                    </div>
                                </div>
                                <br>
                                <h5 class="text-right">Postal Code</h5>
                                <div class="row g-3">
                                    <div class="col-sm-7 col-md-7">
                                        <input class="form-control form-control-lg px-3" name="post_code" id="post_code" type="text" value="{{ auth()->user()->post_code }}">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary px-4 py-2 mb-3" >Edit</button>
                            </form>
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