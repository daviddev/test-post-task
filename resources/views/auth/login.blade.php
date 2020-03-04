@extends('layouts.main')

@section('title') Sign In @endsection

@section('content')
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action="{{ route('sign-in') }}" id="signup-form" class="signup-form">
                        @csrf
                        <h2 class="form-title">Sign In</h2>
                        @if (session()->has('invalid_credentials'))
                            <p class="has-error" style="text-align: center">Invalid credentials</p>
                        @endif
                        <div class="form-group">
                            <input type="text" class="form-input" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign in"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Don't Have an Account ? <a href="{{ route('register') }}" class="loginhere-link">Sign up here</a>
                    </p>
                </div>
            </div>
        </section>
    </div>
@endsection
