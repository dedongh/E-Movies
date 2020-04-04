@extends('home')
@section('title'){{config('settings.site_name')}} | {{$movie->title}} @endsection
@prepend('header')
    @include('frontend.header')
@endprepend

@section('movie_details')
    <!-- details -->
    <section class="section details">
        <!-- details background -->
        <div class="details__bg" data-bg="{{asset('frontend/img/home/home__bg.jpg')}}"></div>
        <!-- end details background -->

        <!-- details content -->
        <div class="container">
            <div class="row">
                <!-- title -->
                <div class="col-12">
                    <h1 class="details__title">{{$movie->title}}</h1>
                </div>
                <!-- end title -->

                <!-- content -->
                <div class="col-12 col-xl-6">
                    <div class="card card--details">
                        <div class="row">
                            <!-- card cover -->
                            <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
                                <div class="card__cover">
                                    @if($movie->images->count() > 0)
                                        <img src="{{asset('storage/'.$movie->images->first()->full)}}" alt="">
                                    @else
                                        <img src="https://via.placeholder.com/176" alt="">
                                    @endif
                                </div>
                            </div>
                            <!-- end card cover -->

                            <!-- card content -->
                            <div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
                                <div class="card__content">
                                    <div class="card__wrap">

                                        <span class="card__rate"><i class="icon ion-ios-star"></i>
                                           {{
                                                $movie->reviews->where('status',1)->count() >0 ?
                                                round($movie->reviews->sum('rating')
                                                / $movie->reviews->count(),2) : 0
                                            }}
                                        </span>

                                        <ul class="card__list">
                                            <li>HD</li>
                                            <li>16+</li>
                                        </ul>
                                    </div>

                                    <ul class="card__meta">
                                        <li><span>Genre:</span>
                                            @foreach($movie->genres as $genre)
                                                <a href="{{route('genre.show',$genre->slug)}}">{{$genre->name}}</a>
                                            @endforeach
                                        </li>
                                        <li><span>Release Date:</span> {{
                                           \Carbon\Carbon::parse($movie->release_date)->format('F Y')

                                            }}
                                        </li>
                                        <li><span>Running time:</span> {{$movie->running_time}}</li>
                                        <li><span>Price:</span> <a
                                                href="#">{{config('settings.currency_symbol').$movie->ticket_price}}</a>
                                        </li>
                                    </ul>

                                    <div class="card__description card__description--details">
                                        {{$movie->description}}
                                    </div>
                                </div>
                            </div>
                            <!-- end card content -->
                        </div>
                    </div>
                </div>
                <!-- end content -->

                <!-- player -->
                <div class="col-12 col-xl-6">
                    <video controls crossorigin playsinline
                           poster="../../../cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" id="player">
                        <!-- Video files -->
                        <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4"
                                type="video/mp4" size="576">
                        <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4"
                                type="video/mp4" size="720">
                        <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4"
                                type="video/mp4" size="1080">
                        <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1440p.mp4"
                                type="video/mp4" size="1440">

                        <!-- Caption files -->
                        <track kind="captions" label="English" srclang="en"
                               src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
                               default>
                        <track kind="captions" label="Français" srclang="fr"
                               src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt">

                        <!-- Fallback for browsers that don't support the <video> element -->
                        <a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" download>Download</a>
                    </video>
                </div>
                <!-- end player -->

                <!-- showing times-->

                @foreach($attributes as $attribute)
                    @php

                        if ($movie->attributes->count() > 0) {
                            $attributeCheck = in_array($attribute->id, $movie->attributes->pluck('attribute_id')->toArray());
                        } else {
                            $attributeCheck = [];
                        }
                    @endphp
                    @if($attributeCheck)
                        <div class="col-12 col-xl-6">
                            <span class="details__devices-title"><h1>Showing Times</h1></span>
                            <dl class="d-inline">
                                @foreach($movie->attributes as $attributeValue)
                                    <dt class="details__devices-title">{{ $attributeValue->day }} :</dt>
                                    <dd>
                                                <span class="details__devices-title">
                                                    {{
                                            \Carbon\Carbon::createFromFormat('H:i',$attributeValue->time)->format('g:i A')
                                    }}
                                                </span>
                                    </dd>

                                @endforeach
                            </dl>
                        </div>
                    @else
                        <span class="details__devices-title"><h1>Not showing at the moment</h1></span>
                    @endif
                @endforeach


                <div class="col-12">
                    <div class="details__wrap">
                        <!-- availables -->
                        <div class="details__devices">
                            <span class="details__devices-title">Available on devices:</span>
                            <ul class="details__devices-list">
                                <li><i class="icon ion-logo-apple"></i><span>IOS</span></li>
                                <li><i class="icon ion-logo-android"></i><span>Android</span></li>
                                <li><i class="icon ion-logo-windows"></i><span>Windows</span></li>
                                <li><i class="icon ion-md-tv"></i><span>Smart TV</span></li>
                            </ul>
                        </div>
                        <!-- end availables -->

                        <!-- share -->
                        <div class="details__share">
                            <span class="details__share-title">Share with friends:</span>

                            <ul class="details__share-list">
                                <li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
                                <li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
                                <li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
                                <li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
                            </ul>
                        </div>
                        <!-- end share -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end details content -->
    </section>
    <!-- end details -->
    <!-- content -->
    <section class="content">
        <div class="content__head">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- content title -->
                        <h2 class="content__title">Discover</h2>
                        <!-- end content title -->

                        <!-- content tabs nav -->
                        <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                            {{--<li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Comments</a>
                            </li>--}}

                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-2" role="tab"
                                   aria-controls="tab-2" aria-selected="false">Reviews</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3"
                                   aria-selected="false">Photos</a>
                            </li>
                        </ul>
                        <!-- end content tabs nav -->

                        <!-- content mobile tabs nav -->
                        <div class="content__mobile-tabs" id="content__mobile-tabs">
                            <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="button" value="Comments">
                                <span></span>
                            </div>

                            <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    {{--<li class="nav-item">
                                        <a class="nav-link active" id="1-tab" data-toggle="tab"
                                           href="#tab-1" role="tab" aria-controls="tab-1"
                                           aria-selected="true">Comments</a></li>--}}

                                    <li class="nav-item"><a class="nav-link active" id="2-tab" data-toggle="tab"
                                                            href="#tab-2" role="tab" aria-controls="tab-2"
                                                            aria-selected="false">Reviews</a></li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab"
                                           aria-controls="tab-3" aria-selected="false">Photos</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end content mobile tabs nav -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 col-xl-8">
                    <!-- content tabs -->
                    <div class="tab-content" id="myTabContent">
                        {{-- <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                             <div class="row">
                                 <!-- comments -->
                                 <div class="col-12">
                                     <div class="comments">
                                         <ul class="comments__list">
                                             <li class="comments__item">
                                                 <div class="comments__autor">
                                                     <img class="comments__avatar" src="img/user.png" alt="">
                                                     <span class="comments__name">John Doe</span>
                                                     <span class="comments__time">30.08.2018, 17:53</span>
                                                 </div>
                                                 <p class="comments__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                                 <div class="comments__actions">
                                                     <div class="comments__rate">
                                                         <button type="button"><i class="icon ion-md-thumbs-up"></i>12</button>

                                                         <button type="button">7<i class="icon ion-md-thumbs-down"></i></button>
                                                     </div>

                                                     <button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
                                                     <button type="button"><i class="icon ion-ios-quote"></i>Quote</button>
                                                 </div>
                                             </li>

                                             <li class="comments__item comments__item--answer">
                                                 <div class="comments__autor">
                                                     <img class="comments__avatar" src="img/user.png" alt="">
                                                     <span class="comments__name">John Doe</span>
                                                     <span class="comments__time">24.08.2018, 16:41</span>
                                                 </div>
                                                 <p class="comments__text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                 <div class="comments__actions">
                                                     <div class="comments__rate">
                                                         <button type="button"><i class="icon ion-md-thumbs-up"></i>8</button>

                                                         <button type="button">3<i class="icon ion-md-thumbs-down"></i></button>
                                                     </div>

                                                     <button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
                                                     <button type="button"><i class="icon ion-ios-quote"></i>Quote</button>
                                                 </div>
                                             </li>

                                             <li class="comments__item comments__item--quote">
                                                 <div class="comments__autor">
                                                     <img class="comments__avatar" src="img/user.png" alt="">
                                                     <span class="comments__name">John Doe</span>
                                                     <span class="comments__time">11.08.2018, 11:11</span>
                                                 </div>
                                                 <p class="comments__text"><span>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</span>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                 <div class="comments__actions">
                                                     <div class="comments__rate">
                                                         <button type="button"><i class="icon ion-md-thumbs-up"></i>11</button>

                                                         <button type="button">1<i class="icon ion-md-thumbs-down"></i></button>
                                                     </div>

                                                     <button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
                                                     <button type="button"><i class="icon ion-ios-quote"></i>Quote</button>
                                                 </div>
                                             </li>

                                             <li class="comments__item">
                                                 <div class="comments__autor">
                                                     <img class="comments__avatar" src="img/user.png" alt="">
                                                     <span class="comments__name">John Doe</span>
                                                     <span class="comments__time">07.08.2018, 14:33</span>
                                                 </div>
                                                 <p class="comments__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                                 <div class="comments__actions">
                                                     <div class="comments__rate">
                                                         <button type="button"><i class="icon ion-md-thumbs-up"></i>99</button>

                                                         <button type="button">35<i class="icon ion-md-thumbs-down"></i></button>
                                                     </div>

                                                     <button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
                                                     <button type="button"><i class="icon ion-ios-quote"></i>Quote</button>
                                                 </div>
                                             </li>

                                             <li class="comments__item">
                                                 <div class="comments__autor">
                                                     <img class="comments__avatar" src="img/user.png" alt="">
                                                     <span class="comments__name">John Doe</span>
                                                     <span class="comments__time">02.08.2018, 15:24</span>
                                                 </div>
                                                 <p class="comments__text">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                                 <div class="comments__actions">
                                                     <div class="comments__rate">
                                                         <button type="button"><i class="icon ion-md-thumbs-up"></i>74</button>

                                                         <button type="button">13<i class="icon ion-md-thumbs-down"></i></button>
                                                     </div>

                                                     <button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
                                                     <button type="button"><i class="icon ion-ios-quote"></i>Quote</button>
                                                 </div>
                                             </li>
                                         </ul>

                                         <form action="#" class="form">
                                             <textarea id="text" name="text" class="form__textarea" placeholder="Add comment"></textarea>
                                             <button type="button" class="form__btn">Send</button>
                                         </form>
                                     </div>
                                 </div>
                                 <!-- end comments -->
                             </div>
                         </div>--}}

                        <div class="tab-pane fade show active" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
                            <div class="row">

                            @forelse($movie->reviews->where('status',1) as $review)
                                <!-- reviews -->
                                    <div class="col-12">
                                        <div class="reviews">
                                            <ul class="reviews__list">
                                                <li class="reviews__item">
                                                    <div class="reviews__autor">
                                                        <img class="reviews__avatar"
                                                             src="{{asset('backend/img/bitmoji.png')}}" alt="">
                                                        <span
                                                            class="reviews__name">{{$review->title}}</span>

                                                        <span class="reviews__time">{{$review->created_at->diffForHumans()}} by

                                                            {{\App\User::find($review->user_id)->full_name}}</span>

                                                        <span class="reviews__rating"><i
                                                                class="icon ion-ios-star"></i>
                                                        {{$review->rating}}
                                                        </span>
                                                    </div>
                                                    <p class="reviews__text">{{$review->review}}</p>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                    <!-- end reviews -->
                                @empty
                                    <h2 class="section__title">No reviews Available</h2>
                                @endforelse
                            </div>
                            @guest
                                <h2 class="section__title">Login to review the movie</h2>

                            @else
                                <div class="row">
                                    <style>
                                        .alert {
                                            position: relative;
                                            margin-bottom: 1rem;
                                            padding: .75rem 1.25rem;
                                            border: 1px solid transparent;
                                            border-radius: .25rem
                                        }

                                        .alert-success {
                                            color: #155724;
                                            border-color: #c3e6cb;
                                            background-color: #d4edda
                                        }

                                        .alert-dismissible {
                                            padding-right: 4rem
                                        }

                                        .alert-dismissible .close {
                                            position: absolute;
                                            top: 0;
                                            right: 0;
                                            padding: .75rem 1.25rem;
                                            color: inherit
                                        }
                                    </style>

                                    <div class="col-12">
                                        @include('backend.partials.flash')
                                        <form action="{{route('review.add')}}" method="post" class="form">
                                            @csrf
                                            <input type="text" name="title" class="form__input" placeholder="Title"
                                                   required>
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="movies_id" value="{{$movie->id}}">
                                            <textarea class="form__textarea" name="review" placeholder="Review"
                                                      required></textarea>
                                            <div class="form__slider">
                                                <div class="form__slider-rating" id="slider__rating"></div>
                                                <div class="form__slider-value" id="form__slider-value"></div>
                                                <input type="hidden" id="rating" name="rating" value="">
                                            </div>
                                            <button type="submit" class="form__btn">Send</button>
                                        </form>
                                    </div>

                                </div>
                            @endguest
                        </div>

                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
                            <!-- project gallery -->
                            <div class="gallery" itemscope>
                                <div class="row">
                                @forelse($movie->images as $image)
                                    <!-- gallery item -->
                                        <figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
                                            <a href="{{asset('storage/'.$image->full)}}" itemprop="contentUrl"
                                               data-size="1920x1280">
                                                <img src="{{asset('storage/'.$image->full)}}" itemprop="thumbnail"
                                                     alt="Image description"/>
                                            </a>
                                            <figcaption itemprop="caption description">Some image caption 1</figcaption>
                                        </figure>
                                        <!-- end gallery item -->
                                    @empty
                                        <h2 class="section__title">No Preview Images Available</h2>
                                    @endforelse

                                </div>
                            </div>
                            <!-- end project gallery -->
                        </div>
                    </div>
                    <!-- end content tabs -->
                </div>

                <!-- sidebar -->
                <div class="col-12 col-lg-4 col-xl-4">
                    <div class="row">
                        <!-- section title -->
                        <div class="col-12">
                            <h2 class="section__title section__title--sidebar">You may also like...</h2>
                        </div>
                        <!-- end section title -->
                        @php
                            use App\Model\Movies;
                            $random_movies = Movies::all()->where('status', 1)->random(6)

                        @endphp
                        @forelse($random_movies as $movie)
                            <div class="col-6 col-sm-4 col-lg-6 ">
                                <div class="card">
                                    <div class="card__cover">
                                        @if($movie->images->count() > 0)
                                            <img src="{{asset('storage/'. $movie->images->first()->full)}}" alt="">
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
                                        <span class="card__rate"><i class="icon ion-ios-star"></i>
                                           {{
                                                $movie->reviews->where('status',1)->count() >0 ?
                                                round($movie->reviews->sum('rating')
                                                / $movie->reviews->count(),2) : 0
                                            }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h2 class="section__title">No Movies Available</h2>
                        @endforelse

                    </div>
                </div>
                <!-- end sidebar -->
            </div>
        </div>
    </section>
    <!-- end content -->
@endsection

@push('footer')
    @include('frontend.footer')
@endpush


