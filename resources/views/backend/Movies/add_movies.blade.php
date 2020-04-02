@extends('dashboard')
@section('title'){{$pageTitle}} | {{$subTitle}} @endsection
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Movies</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{route('admin.movies.view')}}">All Movies</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Movies</li>
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
                        <h3 class="mb-0">Add New Movie</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{route('admin.movies.view')}}" class="btn btn-sm btn-primary">Movies</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('backend.partials.flash')
                <form action="{{route('admin.movies.store')}}" method="post" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="input-username"
                                           class="form-control form-control-sm @error('name') is-invalid @enderror"
                                           placeholder="Title" name="title" value="{{old('title')}}">
                                    @error('title') {{$message}} @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Description<span
                                            class="text-danger">*</span></label>
                                    <textarea id="input-email" name="description" class="form-control"
                                              placeholder="description">{{old('description')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="genres">Genres<span
                                            class="text-danger">*</span></label>
                                    <select name="genres[]"
                                            class="form-control @error('genres') is-invalid @enderror"
                                            id="genres" multiple>
                                        @foreach($genres as $genre)
                                            <option value="{{ $genre->id }}"> {{ $genre->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('genres') {{ $message }} @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input" name="featured" id="customCheck1"
                                                       type="checkbox">
                                                <label class="custom-control-label" for="customCheck1">Featured Movie</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input" name="premiere" id="customCheck6"
                                                       type="checkbox">
                                                <label class="custom-control-label" for="customCheck6">Show in premiere</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input" name="new_item" id="customCheck2"
                                                       type="checkbox">
                                                <label class="custom-control-label" for="customCheck2">Just Released</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input" name="status" id="customCheck3"
                                                       type="checkbox">
                                                <label class="custom-control-label" for="customCheck3">Publish</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input" name="coming_soon" id="customCheck5"
                                                       type="checkbox">
                                                <label class="custom-control-label" for="customCheck5">Coming Soon</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input" name="now_showing" id="customCheck51"
                                                       type="checkbox">
                                                <label class="custom-control-label" for="customCheck51">Now Showing</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Release Date <span
                                            class="text-danger">*</span></label>
                                    <input type="month" id="input-username"
                                           class="form-control form-control-sm @error('release_date') is-invalid @enderror"
                                           name="release_date" value="{{old('release_date')}}">
                                    @error('release_date') {{$message}} @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Ticket Price <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="input-username"
                                           class="form-control form-control-sm @error('price') is-invalid @enderror"
                                           placeholder="Price" name="ticket_price" value="{{old('ticket_price')}}">
                                    @error('ticket_price') {{$message}} @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Duration <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="input-username"
                                           class="form-control form-control-sm @error('running_time') is-invalid @enderror"
                                           placeholder="Duration" name="running_time" value="{{old('running_time')}}">
                                    @error('running_time') {{$message}} @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Start showing from</label>
                                    <input type="date" id="input-username"
                                           class="form-control form-control-sm @error('start_show_date') is-invalid @enderror"
                                           name="start_show_date" value="{{old('start_show_date')}}">
                                    @error('start_show_date') {{$message}} @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">End showing at</label>
                                    <input type="date" id="input-username"
                                           class="form-control form-control-sm @error('end_show_date') is-invalid @enderror"
                                           name="end_show_date" value="{{old('end_show_date')}}">
                                    @error('end_show_date') {{$message}} @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-icon btn-primary" type="submit">
                                <span class="btn-inner--icon"><i class="ni ni-like-2"></i></span>
                                <span class="btn-inner--text">Save</span>
                            </button>
                        </div>
                    </div>
                    <hr class="my-4"/>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $('#genres').select2();
        });
    </script>
@endpush


