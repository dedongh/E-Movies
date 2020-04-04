@extends('home')
@section('title'){{config('settings.site_name')}} | {{'All Movies'}} @endsection
@prepend('header')
    @include('frontend.header')
@endprepend

@section('catalog')
    <!-- page title -->
    <section class="section section--first section--bg" data-bg="img/section/section.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__wrap">
                        <!-- section title -->
                        <h2 class="section__title">{{'All Movies'}}</h2>
                        <!-- end section title -->

                        <!-- breadcrumb -->
                        <ul class="breadcrumb">
                            <li class="breadcrumb__item"><a href="{{URL::to('/')}}">Home</a></li>
                            <li class="breadcrumb__item breadcrumb__item--active">{{'All Movies'}}</li>
                        </ul>
                        <!-- end breadcrumb -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->

    <!-- filter -->
    <div class="filter">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="filter__content">
                        <div class="filter__items">
                            <!-- filter item -->
                            <div class="filter__item" id="filter__genre">
                                <span class="filter__item-label">GENRE:</span>

                                <div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-genre"
                                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <input type="button" value="">
                                    <span></span>
                                </div>

                                <ul class="filter__item-menu dropdown-menu scrollbar-dropdown"
                                    aria-labelledby="filter-genre">
                                    @foreach($genres as $genre)
                                        @if($genre->id != 1)
                                            <li>
                                                <a style="color: white"
                                                   href="{{route('genre.show',$genre->slug )}}">{{$genre->name}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <!-- end filter item -->

                            <!-- filter item -->
                            <div class="filter__item" id="filter__quality">
                                <span class="filter__item-label">QUALITY:</span>

                                <div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-quality"
                                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <input type="button" value="HD 1080">
                                    <span></span>
                                </div>

                                <ul class="filter__item-menu dropdown-menu scrollbar-dropdown"
                                    aria-labelledby="filter-quality">
                                    <li>HD 1080</li>
                                    <li>HD 720</li>
                                    <li>DVD</li>
                                    <li>TS</li>
                                </ul>
                            </div>
                            <!-- end filter item -->

                            <!-- filter item -->
                            <div class="filter__item" id="filter__rate">
                                <span class="filter__item-label">IMBd:</span>

                                <div class="filter__item-btn dropdown-toggle" role="button" id="filter-rate"
                                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="filter__range">
                                        <div id="filter__imbd-start"></div>
                                        <div id="filter__imbd-end"></div>
                                    </div>
                                    <span></span>
                                </div>

                                <div class="filter__item-menu filter__item-menu--range dropdown-menu"
                                     aria-labelledby="filter-rate">
                                    <div id="filter__imbd"></div>
                                </div>
                            </div>
                            <!-- end filter item -->

                            <!-- filter item -->
                            <div class="filter__item" id="filter__year">
                                <span class="filter__item-label">RELEASE YEAR:</span>

                                <div class="filter__item-btn dropdown-toggle" role="button" id="filter-year"
                                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="filter__range">
                                        <div id="filter__years-start"></div>
                                        <div id="filter__years-end"></div>
                                    </div>
                                    <span></span>
                                </div>

                                <div class="filter__item-menu filter__item-menu--range dropdown-menu"
                                     aria-labelledby="filter-year">
                                    <div id="filter__years"></div>
                                </div>
                            </div>
                            <!-- end filter item -->
                        </div>

                        <!-- filter btn -->
                        <button class="filter__btn" type="button">apply filter</button>
                        <!-- end filter btn -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end filter -->

    <!-- catalog -->
    <div class="catalog">
        <div class="container">
            <div class="row">
                <!-- card -->
                @forelse($movies as $movie)
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-3">
                        <div class="card">
                            <div class="card__cover">
                                @if($movie->images->count() > 0)
                                    <img src="{{asset('storage/'. $movie->images->first()->full)}}" alt="" >
                                    <a href="{{route('movie.show', $movie->slug)}}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                @else
                                    <img src="https://via.placeholder.com/176" alt="">
                                    <a href="{{route('movie.show', $movie->slug)}}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                @endif
                            </div>
                            <div class="card__content">
                                <h3 class="card__title"><a href="#">{{$movie->title}}</a></h3>
                                <span class="card__category">
                            @foreach($movie->genres as $genre)
                                        <a href="{{route('genre.show',$genre->slug)}}">{{$genre->name}}</a>
                                    @endforeach
                        </span>
                                <span class="card__rate"><i class="icon ion-ios-star"></i>{{
                                                $movie->reviews->where('status',1)->count() >0 ?
                                                round($movie->reviews->sum('rating')
                                                / $movie->reviews->count(),2) : 0
                                            }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2 class="section__title">No Movies Available</h2>
            @endforelse
            <!-- end card -->


                <!-- paginator -->
                <div class="col-12">
                    {{$movies->links()}}
                </div>
                <!-- end paginator -->
            </div>
        </div>
    </div>
    <!-- end catalog -->
@endsection


@section('expected_premiere')
    @include('frontend.expected_premeire')
@endsection


@push('footer')
    @include('frontend.footer')
@endpush
