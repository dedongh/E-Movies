@extends('dashboard')
@section('title'){{$pageTitle}} | {{$subTitle}} @endsection
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Attributes</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{route('admin.attributes.view')}}">All Attributes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add attributes value</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{route('admin.attributes.add', $attribute->id)}}" class="btn btn-sm btn-neutral">New</a>
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
                        <h3 class="mb-0">Edit Attributes Value</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{route('admin.attributes.view')}}" class="btn btn-sm btn-primary">Attributes</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('backend.partials.flash')
                <form action="{{route('admin.attributes.update_value')}}" method="post" role="form">
                    @csrf
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Value <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="input-username"
                                           class="form-control @error('value') is-invalid @enderror"
                                           placeholder="Value" name="value" value="{{old('value',$attribute->value)}}">
                                    @error('value') {{$message}} @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Price</label>
                                    <input type="text" id="input-email" name="price" class="form-control"
                                           placeholder="Price" value="{{old('price',$attribute->price)}}">
                                    <input type="hidden" name="attribute_id" value="{{ $attribute->attribute_id }}">
                                    <input type="hidden" name="id" value="{{ $attribute->id }}">
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



