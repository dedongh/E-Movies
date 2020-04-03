@php
    use App\Model\Movies;
   function criteria($criteria){
       return Movies::where($criteria,1)
       ->where('status',1)
                   ->get();
   }

   $now = \Carbon\Carbon::now()->format('Y');

   //$new_items = criteria('new_item');
   $new_items = Movies::where('status',1)
                    ->orderByRaw('id DESC')
                    ->get();
   $coming_soon = criteria('coming_soon');
   $features = criteria('featured');
   $now_showing = criteria('now_showing');
   $this_year = Movies::where('year', $now)
                   ->where('status',1)
                   ->get();
@endphp

@extends('home')
@prepend('header')
    @include('frontend.header')
@endprepend
@section('title'){{config('settings.site_name')}} | {{config('settings.site_title')}} @endsection
@section('new_items_season')

    <section class="home">
        <!-- home bg -->
        <div class="owl-carousel home__bg">
            <div class="item home__cover" data-bg="{{asset('frontend/img/home/home__bg.jpg')}}"></div>
            <div class="item home__cover" data-bg="{{asset('frontend/img/home/home__bg2.jpg')}}"></div>
            <div class="item home__cover" data-bg="{{asset('frontend/img/home/home__bg3.jpg')}}"></div>
            <div class="item home__cover" data-bg="{{asset('frontend/img/home/home__bg4.jpg')}}"></div>
        </div>
        <!-- end home bg -->

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="home__title"><b>NEW ITEMS</b> OF THIS SEASON </h1>

                    <button class="home__nav home__nav--prev" type="button">
                        <i class="icon ion-ios-arrow-round-back"></i>
                    </button>
                    <button class="home__nav home__nav--next" type="button">
                        <i class="icon ion-ios-arrow-round-forward"></i>
                    </button>
                </div>

                <div class="col-12">
                    <div class="owl-carousel home__carousel">
                        @foreach($new_items as $new_item)
                            <div class="item">
                                <!-- card -->
                                <div class="card card--big">
                                    <div class="card__cover">
                                        @if($new_item->images->count() > 0)
                                            <img src="{{asset('storage/'.$new_item->images->first()->full)}}" alt="">
                                            <a href="{{route('movie.show', $new_item->slug)}}" class="card__play">
                                                <i class="icon ion-ios-play"></i>
                                            </a>
                                        @else
                                            <img src="https://via.placeholder.com/176" alt="">
                                            <a href="{{route('movie.show', $new_item->slug)}}" class="card__play">
                                                <i class="icon ion-ios-play"></i>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="card__content">
                                        <h3 class="card__title"><a href="#">{{$new_item->title}}</a></h3>
                                        <span class="card__category">
										 @foreach($new_item->genres as $genre)
                                                <a href="{{route('genre.show',$genre->slug)}}">{{$genre->name}}</a>
                                            @endforeach
									</span>
                                        <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('new_items')
    <section class="content">
        <div class="content__head">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- content title -->
                        <h2 class="content__title">Also showing</h2>
                        <!-- end content title -->

                        <!-- content tabs nav -->
                        <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab"
                                   aria-controls="tab-1"
                                   aria-selected="true">Showing Now</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2"
                                   aria-selected="false">Featured</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3"
                                   aria-selected="false">Coming Soon</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4"
                                   aria-selected="false">{{ \Carbon\Carbon::now()->format('Y')}}</a>
                            </li>
                        </ul>
                        <!-- end content tabs nav -->

                        <!-- content mobile tabs nav -->
                        <div class="content__mobile-tabs" id="content__mobile-tabs">
                            <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="button" value="New items">
                                <span></span>
                            </div>

                            <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab"
                                                            href="#tab-1" role="tab" aria-controls="tab-1"
                                                            aria-selected="true">Showing Now</a></li>

                                    <li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2"
                                                            role="tab" aria-controls="tab-2"
                                                            aria-selected="false">Featured</a></li>

                                    <li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3"
                                                            role="tab" aria-controls="tab-3" aria-selected="false">Coming Soon</a></li>

                                    <li class="nav-item"><a class="nav-link" id="4-tab" data-toggle="tab" href="#tab-4"
                                                            role="tab" aria-controls="tab-4"
                                                            aria-selected="false">{{ \Carbon\Carbon::now()->format('Y')}}</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end content mobile tabs nav -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- content tabs -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                    <div class="row">
                        @forelse($now_showing as $featured)
                        <!-- card -->
                        <div class="col-6 col-sm-12 col-lg-6">
                            <div class="card card--list">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="card__cover">
                                            @if($featured->images->count() > 0)
                                                <img src="{{asset('storage/'. $featured->images->first()->full)}}" alt="" >
                                                <a href="{{route('movie.show', $featured->slug)}}" class="card__play">
                                                    <i class="icon ion-ios-play"></i>
                                                </a>
                                            @else
                                                <img src="https://via.placeholder.com/176" alt="">
                                                <a href="{{route('movie.show', $featured->slug)}}" class="card__play">
                                                    <i class="icon ion-ios-play"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-8">
                                        <div class="card__content">
                                            <h3 class="card__title"><a href="#">{{$featured->title}}</a></h3>
                                            <span class="card__category">
												 @foreach($featured->genres as $genre)
                                                    <a href="{{route('genre.show',$genre->slug)}}">{{$genre->name}}</a>
                                                @endforeach
											</span>

                                            <div class="card__wrap">
                                                <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>

                                                <ul class="card__list">
                                                    <li>HD</li>
                                                    <li>16+</li>
                                                </ul>
                                            </div>

                                            <div class="card__description">
                                                <p>{{$featured->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                            @empty
                                <h2 class="section__title">No Movies Available</h2>
                            @endforelse

                    </div>
                </div>

                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
                    <div class="row">

                        @forelse($features as $featured)
                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    @if($featured->images->count() > 0)
                                        <img src="{{asset('storage/'. $featured->images->first()->full)}}" alt="" >
                                        <a href="{{route('movie.show', $featured->slug)}}" class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                    @else
                                        <img src="https://via.placeholder.com/176" alt="">
                                        <a href="{{route('movie.show', $featured->slug)}}" class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                    @endif
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="#">{{$featured->title}}</a></h3>
                                    <span class="card__category">
										 @foreach($featured->genres as $genre)
                                            <a href="{{route('genre.show',$genre->slug)}}">{{$genre->name}}</a>
                                        @endforeach
									</span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                            @empty
                                <h2 class="section__title">No Movies Available</h2>
                            @endforelse


                    </div>
                </div>

                <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
                    <div class="row">

                    @forelse($coming_soon as $featured)
                        <!-- card -->
                            <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                                <div class="card">
                                    <div class="card__cover">
                                        @if($featured->images->count() > 0)
                                            <img src="{{asset('storage/'. $featured->images->first()->full)}}" alt="" >
                                            <a href="{{route('movie.show', $featured->slug)}}" class="card__play">
                                                <i class="icon ion-ios-play"></i>
                                            </a>
                                        @else
                                            <img src="https://via.placeholder.com/176" alt="">
                                            <a href="{{route('movie.show', $featured->slug)}}" class="card__play">
                                                <i class="icon ion-ios-play"></i>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="card__content">
                                        <h3 class="card__title"><a href="#">{{$featured->title}}</a></h3>
                                        <span class="card__category">
										 @foreach($featured->genres as $genre)
                                                <a href="{{route('genre.show',$genre->slug)}}">{{$genre->name}}</a>
                                            @endforeach
									</span>
                                        <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        @empty
                            <h2 class="section__title">No Movies Available</h2>
                        @endforelse
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="4-tab">
                    <div class="row">
                    @forelse($this_year as $featured)
                        <!-- card -->
                            <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                                <div class="card">
                                    <div class="card__cover">
                                        @if($featured->images->count() > 0)
                                            <img src="{{asset('storage/'. $featured->images->first()->full)}}" alt="" >
                                            <a href="{{route('movie.show', $featured->slug)}}" class="card__play">
                                                <i class="icon ion-ios-play"></i>
                                            </a>
                                        @else
                                            <img src="https://via.placeholder.com/176" alt="">
                                            <a href="{{route('movie.show', $featured->slug)}}" class="card__play">
                                                <i class="icon ion-ios-play"></i>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="card__content">
                                        <h3 class="card__title"><a href="#">{{$featured->title}}</a></h3>
                                        <span class="card__category">
										 @foreach($featured->genres as $genre)
                                                <a href="{{route('genre.show',$genre->slug)}}">{{$genre->name}}</a>
                                            @endforeach
									</span>
                                        <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        @empty
                            <h2 class="section__title">No Movies Available</h2>
                        @endforelse

                    </div>
                </div>
            </div>
            <!-- end content tabs -->
        </div>
    </section>
@endsection

@section('expected_premiere')
    @include('frontend.expected_premeire')
@endsection

@section('our_partners')
    <section class="section">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12">
                    <h2 class="section__title section__title--no-margin">Our Partners</h2>
                </div>
                <!-- end section title -->

                <!-- section text -->
                <div class="col-12">
                    <p class="section__text section__text--last-with-margin">It is a long <b>established</b> fact that a
                        reader will be distracted by the readable content of a page when looking at its layout. The
                        point of
                        using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
                        using.
                    </p>
                </div>
                <!-- end section text -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/themeforest-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/audiojungle-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/codecanyon-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/photodune-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/activeden-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/3docean-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->
            </div>
        </div>
    </section>
@endsection

@push('footer')
    @include('frontend.footer')
@endpush
