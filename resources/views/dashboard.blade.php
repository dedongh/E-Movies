<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Creative Tim">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('backend/img/favicon.png')}}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('backend/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('backend/css/all.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('backend/css/dataTables.bootstrap4.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('backend/css/buttons.bootstrap4.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('backend/css/select.bootstrap4.min.css')}}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/select2.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('backend/css/quill.core.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('backend/css/argon.css?v=1.1.0')}}" type="text/css">

</head>

<body>
<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="#">
                <img src="{{asset('backend/img/blue.png')}}" class="navbar-brand-img" alt="...">
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{Route::currentRouteName() == 'admin.dashboard.index' ? 'active' : ''}}"
                           href="{{route('admin.dashboard.index')}}"
                           role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::currentRouteName() == 'admin.movies' ? 'active' : ''}}"
                           href="#navbar-examples" data-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="navbar-examples">
                            <i class="ni ni-ungroup text-orange"></i>
                            <span class="nav-link-text">Movies</span>
                        </a>
                        <div class="collapse" id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('admin.movies')}}" class="nav-link">Add Movie</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.movies.view')}}" class="nav-link">View All Movies</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::currentRouteName() == 'admin.genre' ? 'active' : ''}}"
                           href="#navbar-components" data-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="navbar-components">
                            <i class="ni ni-ui-04 text-info"></i>
                            <span class="nav-link-text">Genres</span>
                        </a>
                        <div class="collapse" id="navbar-components">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('admin.genre')}}" class="nav-link">Add Genre</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.genre.view')}}" class="nav-link">View Genre</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.attributes.add')}}" class="nav-link">Add Attributes</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.attributes.view')}}" class="nav-link">View Attributes</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::currentRouteName() == 'admin.bookings' ? 'active' : ''}}"
                           href="{{route('admin.bookings')}}">
                            <i class="ni ni-book-bookmark text-green"></i>
                            <span class="nav-link-text">Bookings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::currentRouteName() == 'admin.reviews' ? 'active' : ''}}"
                           href="{{route('admin.reviews')}}">
                            <i class="ni ni-badge text-green"></i>
                            <span class="nav-link-text">Reviews</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::currentRouteName() == 'admin.settings' ? 'active' : ''}}"
                           href="#navbar-forms" data-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="navbar-forms">
                            <i class="ni ni-single-copy-04 text-pink"></i>
                            <span class="nav-link-text">Settings</span>
                        </a>
                        <div class="collapse" id="navbar-forms">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('admin.settings')}}" class="nav-link">General</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.settings.site')}}" class="nav-link">Site Logo</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.settings.footer')}}" class="nav-link">Footer & SEO</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.settings.social')}}" class="nav-link">Social Links</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.settings.analytics')}}" class="nav-link">Analytics</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.settings.payments')}}" class="nav-link">Payments</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-light bg-secondary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Search form -->
                <form class="navbar-search navbar-search-dark form-inline mr-sm-3" id="navbar-search-main">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input class="form-control" placeholder="Search" type="text">
                        </div>
                    </div>
                    <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main"
                            aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </form>
                <!-- Navbar links -->
                <ul class="navbar-nav align-items-center ml-md-auto">
                    <li class="nav-item d-xl-none">
                        <!-- Sidenav toggler -->
                        <div class="pr-3 sidenav-toggler sidenav-toggler-light" data-action="sidenav-pin"
                             data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-sm-none">
                        <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                            <i class="ni ni-zoom-split-in"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <i class="ni ni-bell-55"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                            <!-- Dropdown header -->
                            <div class="px-3 py-3">
                                <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong>
                                    notifications.</h6>
                            </div>
                            <!-- List group -->
                            <div class="list-group list-group-flush">
                                <a href="#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder" src="{{asset('backend/img/bitmoji.png')}}"
                                                 class="avatar rounded-circle">
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-0 text-sm">John Snow</h4>
                                                </div>
                                                <div class="text-right text-muted">
                                                    <small>2 hrs ago</small>
                                                </div>
                                            </div>
                                            <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- View all -->
                            <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View
                                all</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <i class="ni ni-ungroup"></i>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default dropdown-menu-right">
                            <div class="row shortcuts px-4">
                                <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                                    <small>Calendar</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                                    <small>Email</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                                    <small>Payments</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                                    <small>Reports</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                                    <small>Maps</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                                    <small>Shop</small>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{asset('backend/img/bitmoji.png')}}">
                  </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">John Snow</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>My profile</span>
                            </a>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-settings-gear-65"></i>
                                <span>Settings</span>
                            </a>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-calendar-grid-58"></i>
                                <span>Activity</span>
                            </a>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-support-16"></i>
                                <span>Support</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('admin.logout')}}" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        @yield('content')

</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="{{asset('backend/js/jquery.min.js')}}"></script>
<script src="{{asset('backend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/js/js.cookie.js')}}"></script>
<script src="{{asset('backend/js/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('backend/js/jquery-scrollLock.min.js')}}"></script>


<script src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('backend/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/js/jszip.min.js')}}"></script>
<script src="{{asset('backend/js/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/js/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('backend/js/select2.min.js')}}"></script>
<script src="{{asset('backend/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('backend/js/nouislider.min.js')}}"></script>
<script src="{{asset('backend/js/quill.min.js')}}"></script>
<script src="{{asset('backend/js/dropzone.min.js')}}"></script>
<script src="{{asset('backend/js/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('backend/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('backend/js/select2.min.js')}}"></script>


<!-- Argon JS -->
<script src="{{asset('backend/js/argon.js?v=1.1.0')}}"></script>

@stack('scripts')

</body>

</html>
