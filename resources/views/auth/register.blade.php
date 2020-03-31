@extends('home')
@section('title'){{config('settings.site_name')}} | {{'Register'}} @endsection
@section('register')
    <div class="sign section--bg" data-bg="{{asset('frontend/img/section/section.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">
                        <!-- registration form -->
                        <form action="{{route('register')}}" method="post" class="sign__form">
                            @csrf
                            <a href="{{route('home.index')}}" class="sign__logo">
                                <img src="{{asset('frontend/img/logo.svg')}}" alt="">
                            </a>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="sign__group">
                                        <input type="text" name="first_name"
                                               class="sign__input @error('first_name') is-invalid @enderror"
                                               placeholder="First Name" value="{{ old('first_name') }}">
                                        <br>
                                        <span class="sign__text"> @error('first_name'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="sign__group">
                                        <input type="text" name="last_name"
                                               class="sign__input @error('last_name') is-invalid @enderror"
                                               placeholder="Last Name" value="{{ old('last_name') }}">
                                        <br>
                                        <span class="sign__text"> @error('last_name'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="sign__group">
                                        <input type="text" name="city" class="sign__input" placeholder="City" value="{{ old('city') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="sign__group">
                                        <input type="text" name="country" class="sign__input" placeholder="Country" value="{{ old('country') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="sign__group">
                                        <input type="text" name="email" class="sign__input @error('email') is-invalid @enderror"
                                               placeholder="Email" value="{{ old('email') }}">
                                        <br>
                                        <span class="sign__text"> @error('email'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="sign__group">
                                        <input type="password" name="password"
                                               class="sign__input @error('password') is-invalid @enderror" placeholder="Password">
                                        <br>
                                        <span class="sign__text"> @error('password'){{ $message }} @enderror</span>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 offset-6">
                                    <div class="sign__group">
                                        <input type="password" name="password_confirmation" class="sign__input @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password">
                                        <br>
                                        <span class="sign__text"> @error('password_confirmation'){{ $message }} @enderror</span>
                                    </div>

                                </div>
                            </div>
                            <div class="sign__group sign__group--checkbox">
                                <input id="remember" name="remember" type="checkbox" checked="checked">
                                <label for="remember">I agree to the <a href="#">Privacy Policy</a></label>
                            </div>

                            <button class="sign__btn" type="submit">Sign up</button>

                            <span class="sign__text">Already have an account? <a
                                    href="{{route('login')}}">Sign in!</a></span>

                        </form>
                        <!-- registration form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
