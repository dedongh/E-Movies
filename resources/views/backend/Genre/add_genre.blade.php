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
                                <li class="breadcrumb-item"><a href="{{route('admin.genre.view')}}">All Genres</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add genres</li>
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
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Add New Genre</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{route('admin.genre')}}" class="btn btn-sm btn-primary">Genres</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('backend.partials.flash')
                <form action="{{route('admin.genre.store')}}" method="post" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="input-username"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Name" name="name" value="{{old('name')}}">
                                    @error('name') {{$message}} @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Description</label>
                                    <textarea id="input-email" name="description" class="form-control"
                                              placeholder="description">{{old('description')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-pay">Parent Genre<span
                                            class="text-danger">*</span></label>
                                    <select name="parent_id"
                                            class="form-control @error('parent_id') is-invalid @enderror"
                                            id="input-last-pay">
                                        <option value="0">Select a parent genre</option>

                                        @foreach($genres as $genre)
                                            <option value="{{ $genre->id }}"> {{ $genre->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('parent_id') {{ $message }} @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input class="custom-control-input" name="featured" id="customCheck1"
                                               type="checkbox">
                                        <label class="custom-control-label" for="customCheck1">Featured Genre</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input class="custom-control-input" name="menu" id="customCheck2"
                                               type="checkbox">
                                        <label class="custom-control-label" for="customCheck2">Show in Menu</label>
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
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image"
                                               id="customFileLang" lang="en">
                                        <label class="custom-file-label"
                                               for="customFileLang">Select genre cover</label>
                                        @error('image'){{$message}}@enderror
                                    </div>
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



