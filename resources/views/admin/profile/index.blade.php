@extends('layouts.main')

@section('sidebar')
    @include('partials.adminSidebar')        
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

            {{-- Todo[A-P] --}}
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
                    <!-- <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value="{{ auth()->user()->name }}"></div>
                                <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="surname"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value=""></div>
                                <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                                <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                                <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                                <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                                <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                                <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value=""></div>
                                <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value=""></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                                <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                            </div>
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                        </div>
                    </div> -->
                </div>
            </div>
            {{-- ToDo --}}

            <!-- contoh -->
            <form action="/profile" method="post">
                @csrf
                @method('put')
                <div class="form-floating">
                    <input type="text" name="name" class="form-control p-2 @error('name') is-invalid @enderror" id="name" placeholder="name@example.com" value="{{ old('name') }}" required>
                    <label class="p-1" for="name">Name</label>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="text" name="phone_number" class="form-control p-2 @error('phone_number') is-invalid @enderror" id="phone_number" value="{{ old('phone_number') }}">
                    <label class="p-1" for="name">Phone Number</label>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-danger px-4 py-2 mb-3">Edit</button>
            </form>
            <!-- contoh -->

        </div>
    </div>
@endsection