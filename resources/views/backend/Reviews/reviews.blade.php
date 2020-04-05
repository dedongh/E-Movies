@extends('dashboard')
@section('title'){{$pageTitle}} | {{$subTitle}} @endsection
@section('content')
    <!-- Header -->
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Alternative</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                                <li class="breadcrumb-item active" aria-current="page">E-Movies</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" class="btn btn-sm btn-neutral">New</a>
                        <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0 text-white">Notifications</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse($reviews as $review)
                                <div class="col-xl-6 col-md-6">
                                    <div class="timeline timeline-one-side" data-timeline-content="axis"
                                         data-timeline-axis-style="dashed">
                                        <div class="timeline-block">
                                            {{-- <span class="timeline-step badge-success">
                                               <i class="ni ni-bell-55"></i>
                                             </span>--}}
                                            <div class="col-auto timeline-step">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder" src="{{asset('backend/img/bitmoji.png')}}"
                                                     class="avatar rounded-circle">
                                            </div>
                                            <div class="timeline-content">
                                                <small class="text-light font-weight-bold">
                                                    {{$review->created_at->diffForHumans()}} by {{\App\User::find($review->user_id)->full_name}}</small>
                                                <h5 class="text-white mt-3 mb-0">New review on <b><i>{{$review->movies->title}}</i></b></h5>
                                                <h3 class="text-white mt-3 mb-0">{{$review->title}}</h3>
                                                <p class="text-light text-sm mt-1 mb-0">{{$review->review}}</p>
                                                <div class="mt-3">
                                                    @if($review->status == 0)
                                                        <a href="{{route('admin.reviews.approve', $review->id)}}" class="badge badge-pill badge-success">Approve</a>
                                                    @else
                                                        <a href="{{route('admin.reviews.unapprove', $review->id)}}" class="badge badge-pill badge-success">Unapprove</a>
                                                    @endif
                                                    <a href="{{route('admin.reviews.delete', $review->id)}}" class="badge badge-pill badge-danger">Delete</a>
                                                    <a href="#" class="badge badge-pill badge-secondary">Spam</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h3 class="mb-0 text-white">No Notifications</h3>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
