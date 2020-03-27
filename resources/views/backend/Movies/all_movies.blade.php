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
                                <li class="breadcrumb-item"><a href="#">All Movies</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View all movies</li>
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
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">All Movies</h3>
                        <p class="text-sm mb-0">
                            This table shows all movies available in our DB
                        </p>
                        @include('backend.partials.flash')
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-dark table-responsive table-flush" id="datatable-buttons">
                            <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Genres</th>
                                <th>Release Date</th>
                                <th>Price</th>
                                <th>Duration</th>
                                <th>Start Show Date</th>
                                <th>End Show Date</th>
                                <th>Featured</th>
                                <th>Premiere</th>
                                <th>Coming Soon</th>
                                <th>Published</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Genres</th>
                                <th>Release Date</th>
                                <th>Price</th>
                                <th>Duration</th>
                                <th>Start Show Date</th>
                                <th>End Show Date</th>
                                <th>Featured</th>
                                <th>Premiere</th>
                                <th>Coming Soon</th>
                                <th>Published</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($movies as $movie)
                                <tr>
                                    <td>{{$movie->id}}</td>
                                    <td>{{$movie->title}}</td>
                                    <td>{{$movie->slug}}</td>
                                    <td>
                                        @foreach($movie->genres as $genre)
                                            <span class="badge badge-md badge-info">{{$genre->name}}</span>
                                        @endforeach
                                    </td>
                                    <td>{{$movie->release_date}}</td>
                                    <td>{{$movie->ticket_price}}</td>
                                    <td>{{$movie->running_time}}</td>
                                    <td>{{$movie->start_show_date}}</td>
                                    <td>{{$movie->end_show_date}}</td>
                                    <td>
                                        @if($movie->featured == 1)
                                            <span class="badge badge-md badge-success">Yes</span>
                                        @else
                                            <span class="badge badge-danger">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($movie->premiere == 1)
                                            <span class="badge badge-md badge-success">Yes</span>
                                        @else
                                            <span class="badge badge-danger">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($movie->coming_soon == 1)
                                            <span class="badge badge-md badge-success">Yes</span>
                                        @else
                                            <span class="badge badge-danger">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($movie->status == 1)
                                            <span class="badge badge-md badge-success">Yes</span>
                                        @else
                                            <span class="badge badge-danger">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{route('admin.movies.images', $movie->id)}}">Add Images</a>
                                                <a class="dropdown-item" href="{{route('admin.movies.attributes', $movie->id)}}">Add Attributes</a>
                                            </div>
                                        </div>
                                        <a href="{{route('admin.movies.edit', $movie->id)}}"
                                           class="btn btn-sm btn-neutral"><i class="fa fa-edit"></i></a>

                                        <a href="{{route('admin.movies.delete', $movie->id)}}"
                                           class="btn btn-sm btn-neutral"><i class="ni ni-fat-remove"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



