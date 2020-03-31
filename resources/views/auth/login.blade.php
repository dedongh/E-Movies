@extends('home')
@section('title'){{config('settings.site_name')}} | {{'Login'}} @endsection
@section('login')
    <div class="sign section--bg" data-bg="{{asset('frontend/img/section/section.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">
                        <!-- authorization form -->
                        <form action="{{route('login')}}" method="post" class="sign__form">
                            @csrf
                            <a href="{{URL::to('/')}}" class="sign__logo">
                                <img src="{{asset('frontend/img/logo.svg')}}" alt="">
                            </a>

                            <div class="sign__group">
                                <input type="text" name="email" class="sign__input
                                    @error('email') is-invalid @enderror" placeholder="Email"
                                value="{{old('email')}}">
                                <br>
                                <span class="sign__text"> @error('email'){{ $message }} @enderror</span>

                            </div>

                            <div class="sign__group">
                                <input type="password" name="password" class="sign__input
                                    @error('password') is-invalid @enderror" placeholder="Password"><br>
                                <span class="sign__text">@error('password'){{ $message }}@enderror</span>
                            </div>

                            <div class="sign__group sign__group--checkbox">
                                <input id="remember" name="remember" type="checkbox" checked="checked">
                                <label for="remember">{{ __('Remember Me')}}</label>
                            </div>

                            <button class="sign__btn" type="submit">Sign in</button>

                            <span class="sign__text">Don't have an account? <a href="{{route('register')}}">Sign up!</a></span>

                            <span class="sign__text"><a href="#">Forgot password?</a></span>
                        </form>
                        <!-- end authorization form -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
