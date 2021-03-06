@extends('layouts.login-rgs')

@section('content-login')
    <div class="row m-5">
        <div class="col-md-12 rounded">
            <div class="row">
                <div class="col-lg-6 p-0 m-0">
                    <div class="row h-100 py-4 p-5 text-white rounded-3 justify-content-center align-items-center"style="background-color:rgb(25,57,101);">
                        <div class="row justify-content-center py-2">
                            <div class="col-md-9 text-end ms-5 p-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span class="">Start</span>
                                    </div>
                                    <div class="col-md-3">
                                        <h1>BUILD</h1>
                                    </div>
                                    <div class="col-md-3 flex-fill text-start d-flex align-items-end ">
                                        <h5 class="">With Us</h5>
                                    </div>
                                </div>
                            </div>
                            <form action="/auth/register" method="POST" enctype="multipart/form-data" class="col-md-8 p-5">
                                @csrf
                                <div class="form-group mb-4 py-1">
                                    <input type="email" class="form-control rounded-pill" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email" value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <div class="text-danger px-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group mb-4 py-1">
                                    <input type="text" class="form-control rounded-pill" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" placeholder="Username" value="{{ old('username') }}">
                                </div>
                                @error('username')
                                    <div  class="text-danger px-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group mb-4 py-1">
                                    <input type="password" class="form-control rounded-pill" name = "password" id="exampleInputPassword1" placeholder="password">
                                </div>
                                <div class="form-group mb-4 py-1">
                                    <input type="password" class="form-control rounded-pill  @error('passowrd') is-invalid @enderror" name = "password_confirmation" id="exampleInputPassword1" placeholder="Confirm Password">
                                </div>
                                @error('password')
                                    <div class="px-2 text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="text-center">
                                    <button class="btn btn-outline-light rounded-pill w-25 text-center" type="submit">Register</button>
                                </div>
                            </form>
                            <div class="row justify-content-center p-0 m-0">
                                <div class="col-md-12 text-center">
                                    <span class="text-white">Already have an account?</span>
                                    <a href="/auth/login" class="text-success text-decoration-none">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex p-0 m-0">
                    <img src="{{ asset('assets/Register/Register.png') }}" class= " flex-fill" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
