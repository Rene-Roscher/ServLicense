<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>{{ env('APP_NAME') }}</title>

    <meta name="description" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/ion-rangeslider/css/ion.rangeSlider.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">


    <link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/dropzone/dist/min/dropzone.min.css') }}">

    <link rel="stylesheet" id="css-main" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" id="css-theme" href="{{ mix('css/dashmix.css') }}">
    <link rel="stylesheet" id="css-theme" href="{{ asset('css/iziToast.css') }}">
    <link rel="stylesheet" id="css-theme" href="{{ asset('css/themes/xwork.css') }}">
    <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
</head>
<body>

{{--    {{ PHP }}--}}
@php($user = auth()->user())

{{--    {{ END PHP }}--}}

<!-- Page Container -->
<div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-dark side-trans-enabled sidebar-dark main-content-narrow">
    <!-- Side Overlay-->
    <aside id="side-overlay">
        <!-- Side Header -->
        <div class="bg-image" style="background-image: url('{{ asset('media/various/bg_side_overlay_header.jpg') }}');">
            <div class="bg-dark">
                <div class="content-header">
                    <!-- User Avatar -->
                    <a class="img-link mr-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar48" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
                    </a>
                    <!-- END User Avatar -->

                    <!-- User Info -->
                    <div class="ml-2">
                        <a class="text-white font-w600" href="javascript:void(0)">{{ $user->name }}</a>
                        <div class="text-white-75 font-size-sm font-italic">{{ 1 }}</div>
                    </div>
                    <!-- END User Info -->

                    <!-- Close Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="ml-auto text-white" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                        <i class="fa fa-times-circle"></i>
                    </a>
                    <!-- END Close Side Overlay -->
                </div>
            </div>
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="content-side">
            <div class="block block-transparent pull-x pull-t">
{{--                <form action="" method="POST" onsubmit="return false;">--}}
                    <div class="block mb-0">
                        <div class="block-content block-content-sm block-content-full bg-body">
                            <span class="text-uppercase font-size-sm font-w700">Personal</span>
                        </div>
                        <form action="{{ 0 }}" method="POST">
                            @csrf
                            <div class="block-content block-content-full">
                                <div class="form-group">
                                    <label for="name">Benutzername</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-Mail</label>
                                    <input type="email" class="form-control" readonly id="email" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="col-9">
                                    <button type="submit" class="btn btn-block btn-hero-primary">
                                        <i class="fa fa-fw fa-save mr-1"></i> Speichern
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="block-content block-content-sm block-content-full bg-body">
                            <span class="text-uppercase font-size-sm font-w700">Passwort aktualisieren</span>
                        </div>
                        <div class="block-content block-content-full">
                            <form action="{{ 0 }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="old_password">Aktuelles Passwort</label>
                                    <input type="password" class="form-control" id="old_password" name="old_password">
                                </div>
                                <div class="form-group">
                                    <label for="new_password">Neues Passwort</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password">
                                </div>
                                <div class="form-group">
                                    <label for="new_password_confirmation">Neues Passwort bestätigen</label>
                                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                                </div>
                                <div class="col-9">
                                    <button type="submit" class="btn btn-block btn-hero-danger">
                                        <i class="fa fa-fw fa-save mr-1"></i> Ändern
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
{{--                </form>--}}
            </div>
        </div>
        <!-- END Side Content -->
    </aside>
    <!-- END Side Overlay -->

    <!-- Sidebar -->
    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header (mini Sidebar mode) -->
        <div class="smini-visible-block">
            <div class="content-header bg-black-10">
                <!-- Logo -->
                <a class="link-fx font-size-lg text-white" href="{{ url('/dashboard') }}">
                    <span class="text-white-75">{{env('APP_NAME')}}</span>
                </a>
                <!-- END Logo -->
            </div>
        </div>
        <!-- END Side Header (mini Sidebar mode) -->

        <!-- Side Header (normal Sidebar mode) -->
        <div class="smini-hidden">
            <div class="content-header justify-content-lg-center bg-black-10">
                <!-- Logo -->
                <a class="link-fx font-size-lg text-white" href="{{ url('/dashboard') }}">
                    {{env('APP_NAME')}}
                </a>
                <!-- END Logo -->

                <!-- Options -->
                <div class="d-lg-none">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                        <i class="fa fa-times-circle"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Options -->
            </div>
        </div>
        <!-- END Side Header (normal Sidebar mode) -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{ url('/dashboard') }}">
                        <i class="nav-main-link-icon fa fa-rocket"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                    <a class="nav-main-link" href="{{ url('licensor/support') }}">
                        <i class="nav-main-link-icon fa fa-piggy-bank"></i>
                        <span class="nav-main-link-name">Support</span>
                    </a>
                    <a class="nav-main-link" href="{{ url('licensor/support') }}">
                        <i class="nav-main-link-icon fa fa-shopping-bag"></i>
                        <span class="nav-main-link-name">Shop ansehen</span>
                    </a>
                </li>
                <li class="nav-main-heading">Lizenzverwaltung</li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ url('licensor/support') }}">
                        <i class="nav-main-link-icon fa fa-ticket-alt"></i>
                        <span class="nav-main-link-name">Aktive Lizenzen</span>
                    </a>
                    <a class="nav-main-link" href="{{ url('licensor/support') }}">
                        <i class="nav-main-link-icon fa fa-lock"></i>
                        <span class="nav-main-link-name">Gesperrte Lizenzen</span>
                    </a>
                    <a class="nav-main-link" href="{{ url('licensor/support') }}">
                        <i class="nav-main-link-icon fa fa-share-square"></i>
                        <span class="nav-main-link-name">Aktivitäten-Log</span>
                    </a>
                </li>
                <li class="nav-main-heading">Produkte</li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ url('licensor/licenses') }}">
                        <i class="nav-main-link-icon fa fa-business-time"></i>
                        <span class="nav-main-link-name">Aktive Produkte</span>
                    </a>
                    <a class="nav-main-link" href="{{ url('licensor/licenses') }}">
                        <i class="nav-main-link-icon fa fa-toolbox"></i>
                        <span class="nav-main-link-name">Produkt anlegen</span>
                    </a>
                </li>
                <li class="nav-main-heading">Unterbenutzer</li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ url('licensor/licenses') }}">
                        <i class="nav-main-link-icon fa fa-users-cog"></i>
                        <span class="nav-main-link-name">Aktive Benutzer</span>
                    </a>
                    <a class="nav-main-link" href="{{ url('licensor/licenses') }}">
                        <i class="nav-main-link-icon fa fa-user-secret"></i>
                        <span class="nav-main-link-name">Gesperrte Benutzer</span>
                    </a>
                    <a class="nav-main-link" href="{{ url('licensor/licenses') }}">
                        <i class="nav-main-link-icon fa fa-user-alt"></i>
                        <span class="nav-main-link-name">Benutzer anlegen</span>
                    </a>
                </li>
                <li class="nav-main-heading">Buchhaltung</li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ url('licensor/licenses') }}">
                        <i class="nav-main-link-icon fa fa-money-check-alt"></i>
                        <span class="nav-main-link-name">Umsätze</span>
                    </a>
                    <a class="nav-main-link" href="{{ url('licensor/licenses') }}">
                        <i class="nav-main-link-icon fa fa-shield-alt"></i>
                        <span class="nav-main-link-name">Bestellungen</span>
                    </a>
                </li>
                <li class="nav-main-heading">2-Factor Auth</li>
                <a class="nav-main-link" href="{{ url('licensor/licenses') }}">
                    <i class="nav-main-link-icon fa fa-cogs"></i>
                    <span class="nav-main-link-name">Einstellungen</span>
                </a>
                <li class="nav-main-heading">Einstellung</li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ url('licensor/licenses') }}">
                        <i class="nav-main-link-icon fa fa-cogs"></i>
                        <span class="nav-main-link-name">Branding</span>
                    </a>
                    <a class="nav-main-link" href="{{ url('licensor/licenses') }}">
                        <i class="nav-main-link-icon fa fa-mail-bulk"></i>
                        <span class="nav-main-link-name">Mail-Server</span>
                    </a>
                    <a class="nav-main-link" href="{{ url('licensor/licenses') }}">
                        <i class="nav-main-link-icon fa fa-code"></i>
                        <span class="nav-main-link-name">Mail Vorlagen</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div>
                <!-- Toggle Sidebar -->
                <button type="button" class="btn btn-dual mr-1" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <!-- END Toggle Sidebar -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div>
                <!-- User Dropdown -->
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-user d-sm-none"></i>
                        <span class="d-none d-sm-inline-block">{{ $user->name }}</span>
                        <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                        <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                            K-{{ $user->id }}
                        </div>
                        <div class="p-2">
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fa fa-ticket-alt mr-1"></i> Tickets
                            </a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                <i class="fa fa-cogs mr-1"></i> Einstellungen
                            </a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Ausloggen
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END User Dropdown -->

                <!-- Toggle Side Overlay -->
                <button type="button" class="btn btn-dual" data-toggle="layout" data-action="side_overlay_toggle">
                    <i class="far fa-fw fa-list-alt"></i>
                </button>
                <!-- END Toggle Side Overlay -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Loader -->
        <div id="page-header-loader" class="overlay-header bg-primary-darker">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">@yield('breadcrumbs')</h1>
                </div>
            </div>
        </div>
        <section id="errors-container"></section>
        @yield('content')
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="bg-body-light">
        <div class="content py-0">
            <div class="row font-size-sm">
                <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                    Entwickelt von <a class="font-w600" href="https://twitter.com/InFeCtedEv_" target="_blank">Rene Roscher</a>
                </div>
                <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                    <a class="font-w600" target="_blank">{{env('APP_NAME')}}</a> &copy; <span data-toggle="year-copy">{{ date('Y') }}</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<div id="ajaxModal" class="modal fadeIn" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        </div>
    </div>
</div>

<script src="{{ mix('js/dashmix.app.js') }}"></script>

<script src="{{ mix('js/laravel.app.js') }}"></script>
<script src="{{ asset('css/iziToast.min.js') }}"></script>
@if (count($errors) > 0)
    <script>
        iziToast.error({
            title: 'Fehler',
            message: '@foreach ($errors->all() as $error) {{ $error }} @endforeach'
        });
    </script>
@endif

@if (\Illuminate\Support\Facades\Session::has('success'))
    <script>
        iziToast.success({
            title: 'Erfolgreich',
            message: '{!! \Illuminate\Support\Facades\Session::get('success') !!}'
        });
    </script>
@endif

<script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('js/plugins/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js') }}"></script>

<script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>

<script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
{{--<script src="{{ asset('js/pages/be_comp_chat.min.js') }}"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });
    function resendVerificationMail(btn) {
        $(btn).html('<i class="fa fa-spinner fa-spin"></i> Versenden...');
        $(btn).attr('disabled', 'disabled');
        $.ajax({
            type: 'GET',
            url: '{{ route('verification.resend') }}',
            complete: function (data) {
                $("#unverifedAlert").fadeOut();
                setTimeout(function () {
                    $("#resendedAlert").fadeIn();
                }, 600)
            },
            error: function (data) {
            }
        });
    }
    function loadPaymentModal() {
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: 'paymentModal',
            success: function(data) {
                $('.modal').empty().append(data.payload).fadeIn().modal();
            },
        });
    }
</script>

@yield('scripts')
</body>
</html>
