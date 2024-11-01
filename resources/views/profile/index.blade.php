@extends('layouts.main')

@section('sidebar')
    @include('partials.sidebar')    
@endsection


@section('container')
    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container my-5 mx-3">
            <div class="container rounded bg-white mt-5 mb-5">
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

                <div class="row">
                    <div class="col-md-3">
                        <div class="d-flex flex-column align-items-center text-center px-3 py-5">
                            <h4 class="text-right">Profile</h4>
                            <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                            <span class="font-weight-bold">{{ auth()->user()->name }}</span>
                            <span class="text-black-50">{{ auth()->user()->email }}</span>
                            <button type="button" class="btn btn-warning mt-3 p-1 border" data-bs-toggle="modal" data-bs-target="#changePw">Change Password</button>
                            <div class="modal position-relative fade modal-dialog modal-dialog-centered" id="changePw" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="/profile/change-password" method="POST" class="p-2">
                                            @method('put')
                                            @csrf
                                            <div class="modal-header mb-3">
                                                <h5 class="modal-title" id="staticBackdropLabel">Change Password</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-floating position-relative mb-3">
                                                    <input type="password" name="old_password" class="form-control p-2" id="old_password" placeholder="Old Password" autofocus required>
                                                    <label for="old_password" class="p-2">Old Password</label>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary position-absolute end-0 top-50 translate-middle-y me-2" onclick="togglePasswordVisibility('old_password')">
                                                        <span data-feather="eye" id="old_password_icon"></span>
                                                    </button>
                                                </div>
                                                <div class="form-floating position-relative mb-3">
                                                    <input type="password" name="new_password" class="form-control p-2" id="new_password" placeholder="New Password" required>
                                                    <label for="new_password" class="p-2">New Password</label>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary position-absolute end-0 top-50 translate-middle-y me-2" onclick="togglePasswordVisibility('new_password')">
                                                        <span data-feather="eye" id="new_password_icon"></span>
                                                    </button>
                                                </div>
                                                <div class="form-floating position-relative">
                                                    <input type="password" name="new_password_confirmation" class="form-control p-2" id="new_password_confirmation" placeholder="New Password Confirmation" required>
                                                    <label for="new_password_confirmation" class="p-2">New Password Confirmation</label>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary position-absolute end-0 top-50 translate-middle-y me-2" onclick="togglePasswordVisibility('new_password_confirmation')">
                                                        <span data-feather="eye" id="new_password_confirmation_icon"></span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="modal-footer py-2">
                                                <button type="button" class="btn btn-danger p-1" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary ms-2 p-1">Confirm</button>
                                            </div>
                                        </form>            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex flex-column align-items-left p-3 py-5">
                            <h5 class="text-right">Name</h5>
                            <div class="row g-3">
                                <div class="col-sm-7 col-md-7">
                                    <input class="form-control form-control-lg px-3" type="text" value="{{ auth()->user()->name }}" readonly>
                                </div>
                                <div class="col-sm-1 col-md-1"></div>
                                <div class="col-sm-3 col-md-3">
                                    <a href="/profile/edit" class="btn btn-primary btn-lg px-2 py-2">Edit Profile</a>
                                </div>
                            </div>
                            <br>
                            <h5 class="text-right">Email</h5>
                            <div class="row g-3">
                                <div class="col-sm-7 col-md-7">
                                    <input class="form-control form-control-lg px-3" type="text" value="{{ auth()->user()->email }}" readonly>
                                </div>
                            </div>
                            <br>
                            <h5 class="text-right">Phone</h5>
                            <div class="row g-3">
                                <div class="col-sm-7 col-md-7">
                                    <input class="form-control form-control-lg px-3" type="text" value="{{ auth()->user()->phone_number }}" readonly>
                                </div>
                            </div>
                            <br>
                            <h5 class="text-right">Address</h5>
                            <div class="row g-3">
                                <div class="col-sm-7 col-md-7">
                                    <input class="form-control form-control-lg px-3" type="text" value="{{ auth()->user()->address }}" readonly>
                                </div>
                            </div>
                            <br>
                            <h5 class="text-right">Province</h5>
                            <div class="row g-3">
                                <div class="col-sm-7 col-md-7">
                                    <input class="form-control form-control-lg px-3" type="text" value="{{ auth()->user()->province }}" readonly>
                                </div>
                            </div>
                            <br>
                            <h5 class="text-right">City</h5>
                            <div class="row g-3">
                                <div class="col-sm-7 col-md-7">
                                    <input class="form-control form-control-lg px-3" type="text" value="{{ auth()->user()->city }}" readonly>
                                </div>
                            </div>
                            <br>
                            <h5 class="text-right">Postal Code</h5>
                            <div class="row g-3">
                                <div class="col-sm-7 col-md-7">
                                    <input class="form-control form-control-lg px-3" type="text" value="{{ auth()->user()->post_code }}" readonly>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <script>
        function togglePasswordVisibility(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const icon = document.getElementById(`${fieldId}_icon`);
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.setAttribute('data-feather', 'eye-off');
            } else {
                passwordField.type = 'password';
                icon.setAttribute('data-feather', 'eye');
            }
    
            feather.replace();
        }
    
        feather.replace();
    </script>
@endsection