@extends('layouts.auth')

@section('content')
    <!-- Page Content -->
    <div class="bg-image" style="background-image: url('{{ asset('media/photos/photo23@2x.jpg') }}');">
        <div class="row no-gutters bg-primary-op">
            <!-- Main Section -->
            <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                <div class="p-3 w-100">
                    <!-- Header -->
                    <div class="mb-3 text-center">
                        <a class="link-fx font-w700 font-size-h1" href="{{ url('/') }}">
                            <span class="text-dark">Serv</span><span class="text-primary">License</span>
                        </a>
                        <p class="text-uppercase font-w700 font-size-sm text-muted">Register</p>
                    </div>

                    <div class="row no-gutters justify-content-center">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="py-3">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg form-control-alt" name="name" placeholder="Benutzername" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg form-control-alt" name="email" placeholder="E-Mail" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-lg form-control-alt" name="password" placeholder="Passwort" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-lg form-control-alt" name="password_confirmation" placeholder="Passwort wiederholen" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-hero-lg btn-hero-primary">
                                    <i class="fa fa-fw fa-plus mr-1"></i> Regestrieren
                                </button>
                                <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                    <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="{{ route('login') }}">
                                        <i class="fa fa-sign-in-alt text-muted mr-1"></i> Bereits ein Konto?
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
