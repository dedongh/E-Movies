@extends('dashboard')
@section('title'){{$pageTitle}} | {{$subTitle}} @endsection
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Movie Attributes</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{route('admin.movies.view')}}">All Movies</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add movie attributes</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{route('admin.movies')}}" class="btn btn-sm btn-neutral">New</a>
                        <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Add Movie Attributes</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{route('admin.movies.view')}}" class="btn btn-sm btn-primary">Movies</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('backend.partials.flash')
                    <div class="pl-lg-4">

                        <movie-attributes :movieid ="{{$movie->id}}"></movie-attributes>
                       {{-- <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-pay">Frontend Type<span
                                            class="text-danger">*</span></label>
                                    <select name="frontend_type"
                                            class="form-control @error('frontend_type') is-invalid @enderror"
                                            id="input-last-pay">
                                        <option value="0">Select a frontend type</option>
                                    </select>
                                    @error('frontend_type') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>--}}
                       {{-- <div class="col-6 text-right">
                            <button class="btn btn-icon btn-primary" type="submit">
                                <span class="btn-inner--icon"><i class="ni ni-like-2"></i></span>
                                <span class="btn-inner--text">Save</span>
                            </button>
                        </div>--}}
                    </div>
                    <hr class="my-4"/>
            </div>
        </div>
    </div>

@endsection



