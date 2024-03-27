@extends('layouts.applogin')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <form class="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row text-center">
                    <div class="col">
                        <h3>Selamat Datang di Departemen PPA</h3>
                        <img src="{{ asset('assets/images/logo-inka.png')}}" class="card-img-index" style="width:50%"
                            alt="logo-inka">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                        ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-login btn-primary form-control">Login</button>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-secondary form-control">Register</a>
                    @endif

                </div>
            </form>
        </div>

    </div>
</div>
@endsection

<style media="screen">
    /* CSS Styling */
    body {
        background-color: #f9fafc;
    }

    .container {
        padding-top: 20px;
    }

    .form {
        background-color: rgba(255, 255, 255, 0.13);
        border-radius: 10px;
        border: 2px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 4px rgba(8, 7, 16, 0.6);
        padding: 50px 35px;
        margin: auto;
        width: 100%;
    }

    h3 {
        font-size: 32px;
        font-weight: 500;
        line-height: 42px;
        text-align: center;
        color: black;
    }

    label {
        font-size: 16px;
        font-weight: 500;
    }

    input {
        height: 50px;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.07);
        border-radius: 3px;
        padding: 0 10px;
        margin-top: 8px;
        font-size: 14px;
        font-weight: 300;
    }

    .form-check {
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .button-group {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }

    button,
    a.btn {
        flex: 1;
        background-color: #ffffff;
        color: #080710;
        padding: 15px 0;
        font-size: 18px;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
        border: 1px solid black;
        transition: background-color 0.3s ease;
    }

    button:hover,
    a.btn:hover {
        background-color: #f0f0f0;
    }

    @media (max-width: 768px) {
        .form {
            width: 90%;
            padding: 30px;
            margin: auto;
        }
    }
</style>