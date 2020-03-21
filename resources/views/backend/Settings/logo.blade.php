@extends('dashboard')
@section('title'){{$pageTitle}} | {{$subTitle}} @endsection
@section('content')
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center"
         style="min-height: 500px; background-image: url({{asset('backend/img/ek_logo.jpg')}}); background-size: contain; background-position: center top;background-repeat: no-repeat;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white">Hello username</h1>
                    <p class="text-white mt-0 mb-5">This is your settings page. You can edit info of your website</p>
                    <a href="#settings" class="btn btn-neutral">Edit settings</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1" id="settings">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card bg-gradient-info border-0">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total
                                            traffic</h5>
                                        <span class="h2 font-weight-bold mb-0 text-white">350,897</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                            <i class="ni ni-active-40"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-white mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap text-light">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card bg-gradient-danger border-0">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white">
                                            Performance</h5>
                                        <span class="h2 font-weight-bold mb-0 text-white">49,65%</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                            <i class="ni ni-spaceship"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-white mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap text-light">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Change site logo</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" class="btn btn-sm btn-primary">Settings</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('backend.partials.flash')
                        <form action="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data" role="form">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">Site settings</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            @if (config('settings.site_logo') != null)
                                                <img src="{{asset('storage/'.config('settings.site_logo')) }}"
                                                     id="logoImg" style="width: 80px; height: auto;">
                                            @else
                                                <img src="https://via.placeholder.com/80x80?text=Placeholder+Image"
                                                     id="logoImg" style="width: 80px; height: auto;">
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="site_logo"
                                                       id="customFileLang" lang="en"
                                                       onchange="loadFile(event,'logoImg')">
                                                <label class="custom-file-label" for="customFileLang">Select site
                                                    logo</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        @if (config('settings.site_logo') != null)
                                            <img src="{{ asset('storage/'.config('settings.site_favicon')) }}"
                                                 id="faviconImg" style="width: 80px; height: auto;">
                                        @else
                                            <img src="https://via.placeholder.com/80x80?text=Placeholder+Image"
                                                 id="faviconImg" style="width: 80px; height: auto;">
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="site_favicon"
                                                   id="customFileLang" lang="en"
                                                   onchange="loadFile(event,'faviconImg')">
                                            <label class="custom-file-label" for="customFileLang">Select site
                                                favicon</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-icon btn-primary" type="submit">
                                        <span class="btn-inner--icon"><i class="ni ni-like-2"></i></span>
                                        <span class="btn-inner--text">Update</span>
                                    </button>
                                </div>
                            </div>
                            <hr class="my-4"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        loadFile = function(event, id) {
            var output = document.getElementById(id);
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush
