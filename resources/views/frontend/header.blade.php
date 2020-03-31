<!-- header -->
<header class="header">
    <div class="header__wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header__content">
                        <!-- header logo -->
                        <a href="{{URL::to('/')}}" class="header__logo">
                            <img src="{{asset('frontend/img/logo.svg')}}" alt="">
                        </a>
                        <!-- end header logo -->

                        <!-- header nav -->
                        <ul class="header__nav">
                            <!-- dropdown -->
                            <li class="header__nav-item">
                                <a class=" header__nav-link" href="{{URL::to('/')}}"
                                   role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                            </li>
                            <!-- end dropdown -->

                            <!-- dropdown -->
                            <li class="header__nav-item">
                                <a class="dropdown-toggle header__nav-link" href="{{url('/genres')}}" role="button"
                                   id="dropdownMenuCatalog" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">Genres</a>

                                <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuCatalog">
                                    <li><a href="#">Genre 1</a></li>
                                </ul>
                            </li>
                            <!-- end dropdown -->

                            <li class="header__nav-item">
                                <a href="#" class="header__nav-link">Showing Now</a>
                            </li>

                            <li class="header__nav-item">
                                <a href="#" class="header__nav-link">Premieres</a>
                            </li>

                            <!-- dropdown -->
                            <li class="dropdown header__nav-item">
                                <a class="dropdown-toggle header__nav-link header__nav-link--more"
                                   href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false"><i class="icon ion-ios-more"></i></a>

                                <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">Reservations & Bookings</a></li>
                                </ul>
                            </li>
                            <!-- end dropdown -->
                        </ul>
                        <!-- end header nav -->

                        <!-- header auth -->
                        <div class="header__auth">
                            <button class="header__search-btn" type="submit">
                                <i class="icon ion-ios-search"></i>
                            </button>

                            @guest
                            <a href="{{route('login')}}" class="header__sign-in">
                                <i class="icon ion-ios-log-in"></i>
                                <span>sign in</span>
                            </a>
                                @else
                                <a href="{{route('logout')}}" class="header__sign-in"
                                   onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit() "
                                >
                                    <i class="icon ion-ios-log-in"></i>
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none">
                                    @csrf
                                </form>
                                @endguest
                        </div>
                        <!-- end header auth -->

                        <!-- header menu btn -->
                        <button class="header__btn" type="button">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <!-- end header menu btn -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- header search -->
    <form action="#" class="header__search">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header__search-content">
                        <input type="text" placeholder="Search for a movie, TV Series that you are looking for">

                        <button type="button">search</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- end header search -->
</header>
<!-- end header -->
