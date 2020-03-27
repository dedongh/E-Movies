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
                                <li class="breadcrumb-item active" aria-current="page">Add movie images</li>
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
                        <h3 class="mb-0">Add Movie Images</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{route('admin.movies.view')}}" class="btn btn-sm btn-primary">Movies</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @include('backend.partials.flash')
                        <form action="" class="dropzone" id="dropzone"
                              style="border: 2px dashed rgba(0,0,0,0.3)">
                            <input type="hidden" name="movies_id" value="{{ $movie->id }}">
                            @csrf
                        </form>
                    </div>
                </div>

                <div class="pl-lg-4 m-4">
                    <div class="col-6 text-right">
                        <button class="btn btn-icon btn-primary" type="button" id="uploadButton">
                            <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
                            <span class="btn-inner--text">Upload Images</span>
                        </button>
                    </div>
                    <p class="text-dark"> the images are uploaded in parallel two at a time per each button click</p>
                </div>
                @if($movie->images)
                    <hr class="my-4"/>
                    <div class="row">
                        @foreach($movie->images as $image)
                            <div class="col-md-3">
                                <div class="card-body">
                                    <img src="{{asset('storage/'.$image->full) }}"
                                         id="brandLogo" class="img-fluid" style="width: 80px; height: auto;">
                                    <a class="card-link float-right text-danger"
                                       href="{{route('admin.movies.images.delete',$image->id)}}">
                                        <i class="fa fa-fw fa-lg fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        $(document).ready(function () {
            let myDropzone = new Dropzone("#dropzone", {
                paramName: "image",
                addRemoveLinks: true,
                maxFilesize: 4,
                parallelUploads: 2,
                uploadMultiple: false,
                url: "{{ route('admin.movies.images.upload') }}",
                autoProcessQueue: false,
            });
            myDropzone.on("queuecomplete", function (file) {
                window.location.reload();
                showNotification('Completed', 'All movie images uploaded', 'success', 'fa-check');
            });
            $('#uploadButton').click(function(){
                if (myDropzone.files.length === 0) {
                    showNotification('Error', 'Please select files to upload.', 'danger', 'fa-close');
                } else {
                    myDropzone.processQueue();
                }
            });
            function showNotification(title, message, type, icon)
            {
                $.notify({
                    title: title + ' : ',
                    message: message,
                    icon: 'fa ' + icon
                },{
                    type: type,
                    allow_dismiss: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                });
            }
        })
    </script>

@endpush



