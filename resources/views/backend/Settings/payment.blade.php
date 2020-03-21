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
                                <h3 class="mb-0">Payment settings</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" class="btn btn-sm btn-primary">Settings</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('backend.partials.flash')
                        <form action="{{route('admin.settings.update')}}" method="post" role="form">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">Flutterwave Payment</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Flutterwave Payment
                                                Method</label>
                                            <select name="flutterwave_payment_method" class="form-control" id="input-username">
                                                <option
                                                    value="1" {{ (config('settings.flutterwave_payment_method')) == 1 ? 'selected' : '' }}>
                                                    Enabled
                                                </option>
                                                <option
                                                    value="0" {{ (config('settings.flutterwave_payment_method')) == 0 ? 'selected' : '' }}>
                                                    Disabled
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Flutterwave Key</label>
                                            <input type="email" id="input-email" name="flutterwave_client_id"
                                                   class="form-control"
                                                   placeholder="client ID"
                                                   value="{{config('settings.flutterwave_client_id')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Flutterwave Secret
                                                Key</label>
                                            <input type="text" id="input-first-name" class="form-control"
                                                   placeholder="secret key" name="flutterwave_secret_id"
                                                   value="{{config('settings.flutterwave_secret_id')}}">
                                        </div>
                                    </div>


                                </div>

                            </div>

                            <h6 class="heading-small text-muted mb-4">MoMo Payment</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Momo Payment Method</label>
                                            <select name="momo_payment_method" class="form-control" id="input-username">
                                                <option
                                                    value="1" {{ (config('settings.momo_payment_method')) == 1 ? 'selected' : '' }}>
                                                    Enabled
                                                </option>
                                                <option
                                                    value="0" {{ (config('settings.momo_payment_method')) == 0 ? 'selected' : '' }}>
                                                    Disabled
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-momo">MoMo API Key</label>
                                            <input type="text" id="input-momo" name="momo_client_id"
                                                   class="form-control"
                                                   placeholder="client ID"
                                                   value="{{config('settings.momo_client_id')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-momo">MoMo API Secret
                                                Key</label>
                                            <input type="text" id="input-first-momo" class="form-control"
                                                   placeholder="secret key" name="momo_secret_id"
                                                   value="{{config('settings.momo_secret_id')}}">
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-icon btn-primary" type="submit">
                                    <span class="btn-inner--icon"><i class="ni ni-like-2"></i></span>
                                    <span class="btn-inner--text">Update</span>
                                </button>
                            </div>
                            <hr class="my-4"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

