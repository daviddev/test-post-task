@extends('layouts.main')

@section('title') Sign Up @endsection

@section('content')
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action="{{ route('sign-up') }}" id="signup-form" class="signup-form">
                        @csrf
                        <h2 class="form-title">Sign Up</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Name" value="{{ old('name') }}"/>
                            @if ($errors->has('name'))
                                <small class="has-error">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}"/>
                            @if ($errors->has('email'))
                                <small class="has-error">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            @if ($errors->has('password'))
                                <small class="has-error">{{ $errors->first('password') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="{{ route('login') }}" class="loginhere-link">Sign in here</a>
                    </p>
                </div>
            </div>
        </section>
    </div>
@endsection
