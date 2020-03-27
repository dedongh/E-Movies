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
                                <li class="breadcrumb-item"><a href="#">All Attributes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View all attributes</li>
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
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">All Attributes</h3>
                        <p class="text-sm mb-0">
                            This table shows all attributes available in our DB
                        </p>
                        @include('backend.partials.flash')
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-dark table-flush" id="datatable-buttons">
                            <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Frontend Type</th>
                                <th>Filterable</th>
                                <th>Required</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Frontend Type</th>
                                <th>Filterable</th>
                                <th>Required</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($attributes as $attribute)
                                    <tr>
                                        <td>{{$attribute->id}}</td>
                                        <td>{{$attribute->code}}</td>
                                        <td>{{$attribute->name}}</td>
                                        <td>{{$attribute->frontend_type}}</td>

                                        <td>
                                            @if($attribute->is_filterable == 1)
                                                <span class="badge badge-md badge-success">Yes</span>
                                            @else
                                                <span class="badge badge-danger">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($attribute->is_required == 1)
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
                                                    <a class="dropdown-item" href="{{route('admin.attributes.value.view', $attribute->id)}}">View Values</a>
                                                    <a class="dropdown-item" href="{{route('admin.attributes.value.add', $attribute->id)}}">Add Values</a>
                                                </div>
                                            </div>

                                            <a href="{{route('admin.attributes.edit', $attribute->id)}}" class="btn btn-sm btn-neutral"><i class="fa fa-edit"></i></a>

                                            <a href="{{route('admin.attributes.delete', $attribute->id)}}" class="btn btn-sm btn-neutral"><i class="ni ni-fat-remove"></i></a>
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



