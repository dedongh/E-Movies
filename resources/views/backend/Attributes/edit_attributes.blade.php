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
                                <li class="breadcrumb-item active" aria-current="page">Edit attributes</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{route('admin.attributes.add')}}" class="btn btn-sm btn-neutral">New</a>
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
                        <h3 class="mb-0">Edit Attributes</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{route('admin.attributes.view')}}" class="btn btn-sm btn-primary">Attributes</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('backend.partials.flash')
                <form action="{{route('admin.attributes.update')}}" method="post" role="form">
                    @csrf
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="input-username"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Name" name="name" value="{{old('name', $attribute->name)}}">
                                    @error('name') {{$message}} @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Code<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="input-email" name="code" class="form-control"
                                           placeholder="code" value="{{old('code', $attribute->code)}}">
                                    <input type="hidden" name="id" value="{{ $attribute->id }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-pay">Frontend Type<span
                                            class="text-danger">*</span></label>
                                    @php $types = ['select' => 'Select Box', 'radio' => 'Radio Button',
                                        'text' => 'Text Field', 'text_area' => 'Text Area', 'li'=>'li','div'=>'div']; @endphp
                                    <select name="frontend_type"
                                            class="form-control @error('frontend_type') is-invalid @enderror"
                                            id="input-last-pay">
                                        <option value="0">Select a parent genre</option>

                                        @foreach($types as $key => $value)
                                            @if($attribute->frontend_type == $key)
                                            <option value="{{ $key }}" selected> {{ $value }} </option>
                                            @else
                                            <option value="{{ $key }}" > {{ $value }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('frontend_type') {{ $message }} @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input class="custom-control-input"  {{ $attribute->is_filterable == 1 ? 'checked' : '' }} name="is_filterable" id="customCheck1"
                                               type="checkbox">
                                        <label class="custom-control-label" for="customCheck1">Filterable</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input class="custom-control-input"  {{ $attribute->is_required == 1 ? 'checked' : '' }} name="is_required" id="customCheck2"
                                               type="checkbox">
                                        <label class="custom-control-label" for="customCheck2">Required</label>
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
                    </div>
                    <hr class="my-4"/>
                </form>
            </div>
        </div>
    </div>

@endsection



