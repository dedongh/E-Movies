@extends('dashboard')
@section('title'){{$pageTitle}} | {{$subTitle}} @endsection
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Genres</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">All Genres</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View all genres</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{route('admin.genre')}}" class="btn btn-sm btn-neutral">New</a>
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
                        <h3 class="mb-0">All Genres</h3>
                        <p class="text-sm mb-0">
                            This table shows all genres available in our DB
                        </p>
                        @include('backend.partials.flash')
                    </div>
                    <div class="table-responsive  py-4">
                        <table class="table table-dark table-flush" id="datatable-buttons">
                            <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Featured</th>
                                <th>Menu</th>
                                <th>Publication Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Featured</th>
                                <th>Menu</th>
                                <th>Publication Status</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($genres as $genre)
                                @if($genre->id != 1)
                            <tr>
                                <td>{{$genre->id}}</td>
                                <td>{{$genre->name}}</td>
                                <td>{{$genre->slug}}</td>
                                <td>{{$genre->description}}</td>
                                <td>
                                    @if($genre->featured == 1)
                                        <span class="badge badge-md badge-success">Yes</span>
                                        @else
                                        <span class="badge badge-danger">No</span>
                                    @endif
                                </td>
                                <td>
                                    @if($genre->menu == 1)
                                        <span class="badge badge-md badge-success">Yes</span>
                                    @else
                                        <span class="badge badge-danger">No</span>
                                    @endif
                                </td>
                                <td>
                                    @if($genre->status == 1)
                                        <span class="badge badge-md badge-success">Yes</span>
                                    @else
                                        <span class="badge badge-danger">No</span>
                                    @endif
                                </td>
                                <td>
                                   {{-- @if($genre->status == 1)
                                        <a href="{{route('admin.genre.unactive', $genre->id)}}" class="btn btn-sm btn-neutral">
                                            <i class="fa fa-thumbs-down"></i>
                                        </a>
                                    @else
                                        <a href="{{route('admin.genre.active', $genre->id)}}" class="btn btn-sm btn-neutral">
                                            <i class="fa fa-thumbs-up"></i>
                                        </a>
                                    @endif--}}

                                    <a href="{{route('admin.genre.edit', $genre->id)}}" class="btn btn-sm btn-neutral"><i class="fa fa-edit"></i></a>

                                    <a href="{{route('admin.genre.delete', $genre->id)}}" class="btn btn-sm btn-neutral"><i class="ni ni-fat-remove"></i></a>
                                </td>
                            </tr>
                            @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



