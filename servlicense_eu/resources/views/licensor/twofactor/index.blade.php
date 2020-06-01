@extends('layouts.auth')

@section('content')
    <!-- Page Content -->
    <div class="bg-image" style="background-image: url('{{ asset('media/twofactor/sec.jpg') }}');">
        <div class="row no-gutters bg-primary-op">
            <!-- Main Section -->
            <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                <div class="p-3 w-100">
                    <!-- Header -->
                    <div class="mb-3 text-center">
                        <a class="link-fx font-w700 font-size-h1" href="{{ url('/') }}">
                            <span class="text-dark">Serv</span><span class="text-primary">License</span>
                        </a>
                        <p class="text-uppercase font-w700 font-size-sm text-muted">2-Faktor Authentifizierung</p>
                    </div>
                    <!-- END Header -->

                    <div class="row no-gutters justify-content-center">
                        <div class="col-sm-8 col-xl-6">
                            <div>
                                @csrf
                                <div class="py-3">
                                    <div class="form-group">
                                        <input type="number" minlength="6" maxlength="6" onkeypress="if (event.keyCode == 13) { check2Factor($('#checkAndSafeBtn')) }" class="form-control form-control-lg form-control-alt" id="2factorCode" name="2factorCode" placeholder="Code">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button id="submitBtn" onclick="check2Factor()" class="btn btn-block btn-hero-lg btn-hero-primary">
                                        <i class="fa fa-fw fa-check-circle mr-1"></i> Bestätigen
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function check2Factor() {
            var btn = $("#submitBtn");
            $(btn).html('<i class="fa fa-spinner fa-spin"></i> Überprüfen...');
            $(btn).attr('disabled', 'disabled');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '{{ route('licensor.twofactor.auth') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    code: $("#2factorCode").first().val(),
                },
                complete: function (data) {
                    data = data.responseJSON;
                    if (data.success) {
                        window.location.href = '/licensor';
                    } else {
                        $(btn).html('<i class="fa fa-fw fa-check-circle mr-1"></i> Bestätigen');
                        $(btn).attr('disabled', null);
                        Swal.fire({
                            title: 'Fehlerhaft',
                            text: data.errors.code,
                            type: 'error',
                        })
                    }
                },
                error: function (data) {

                }
            });
        }
    </script>
@endsection
