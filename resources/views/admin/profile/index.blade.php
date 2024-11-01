@extends('layouts.main')

@section('sidebar')
    @include('partials.adminSidebar')        
@endsection


@section('container')
    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container my-5 mx-3">
            <h1 class="mb-3">Profile</h1>
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

            <table class="mt-3">
                <tr >
                    <td class="px-1"><h4>Name</h4></td>
                    <td class="px-2"><h4>:</h4></td>
                    <td><h4>{{ auth()->user()->name }}</h4></td>
                <tr>
                    <td class="px-1"><h4>Email</h4></td>
                    <td class="px-2"><h4>:</h4></td>
                    <td><h4>{{ auth()->user()->email }}</h4></td>
                    <td class="px-3"><button type="button" class="btn btn-warning p-1 border" data-bs-toggle="modal" data-bs-target="#changeEmail">Change Email</button></td>
                </tr>
            </table>
            <button type="button" class="btn btn-warning mt-3 p-1 border" data-bs-toggle="modal" data-bs-target="#changePw">Change Password</button>
            <div class="modal position-relative fade modal-dialog modal-dialog-centered" id="changePw" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/admin/profile/change-password" method="POST" class="p-2">
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

            <div class="modal  fade modal-dialog modal-dialog-centered" id="changeEmail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/admin/profile/change-email" method="POST" class="p-2">
                            @method('put')
                            @csrf
                            <div class="modal-header mb-3">
                                <h5 class="modal-title" id="staticBackdropLabel">Change Email</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control p-2 @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}" autofocus required>
                                    <label for="email" class="px-1 py-2">New Email Address</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control p-2" id="password" placeholder="Password" required>
                                    <label for="password" class="px-1 py-2">Your Password</label>
                                </div>
                            </div>
                            <div class="modal-footer py-2">
                                <button type="button" class="btn btn-secondary p-1" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary ms-2 p-1">Change</button>
                            </div>
                        </form>            
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