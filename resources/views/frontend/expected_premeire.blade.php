<section class="section section--bg" data-bg="{{asset('frontend/img/section/section.jpg')}}">
    <div class="container">
        <div class="row">
            <!-- section title -->
            <div class="col-12">
                <h2 class="section__title">Expected premiere</h2>
            </div>
            <!-- end section title -->


            @foreach($premieres as $premiere)
                <!-- card -->
            <div class="col-6 col-sm-4 col-lg-3 col-xl-3">
                <div class="card">
                    <div class="card__cover">
                        @if($premiere->images->count() > 0)
                        <img src="{{asset('storage/'.$premiere->images->first()->full)}}" alt="">
                        <a href="{{route('movie.show', $premiere->slug)}}" class="card__play">
                            <i class="icon ion-ios-play"></i>
                        </a>
                            @else
                            <img src="https://via.placeholder.com/176" alt="">
                            <a href="{{route('movie.show', $premiere->slug)}}" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
                        @endif
                    </div>
                    <div class="card__content">
                        <h3 class="card__title"><a href="#">{{$premiere->title}}</a></h3>
                        <span class="card__category">
								 @foreach($premiere->genres as $genre)
                                <a href="{{route('genre.show',$genre->slug)}}">{{$genre->name}}</a>
                            @endforeach
							</span>
                        <span class="card__rate"><i class="icon ion-ios-star"></i> {{
                                                $premiere->reviews->where('status',1)->count() >0 ?
                                                round($premiere->reviews->sum('rating')
                                                / $premiere->reviews->count(),2) : 0
                                            }}</span>
                    </div>
                </div>
            </div>
            <!-- end card -->

            @endforeach


            <!-- section btn -->
            <div class="col-12">
                <a href="{{route('movie.all')}}" class="section__btn">Show more</a>
            </div>
            <!-- end section btn -->
        </div>
    </div>
</section>
