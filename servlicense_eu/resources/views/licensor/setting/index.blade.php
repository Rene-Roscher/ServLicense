@extends('layouts.app')

@section('breadcrumbs')
    Dashboard
@endsection

@section('content')
    <div class="content">
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Einstellungen
        </h2>
        <div class="row">
            <div class="col-md-5 col-sm-2">
                <div class="ownedbox" id="2factorBox">
                    <h4 class="title">2-Faktor Authentifizierung <span class="title right text-muted">Status: <span class="status-pill @if($has2FactorActivated = auth()->user()->has2FactorActivated()) green @else red @endif"></span></span></h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6" style="text-align: center">
                            <img src="{{ $qrcode }}" alt="servlicense" draggable="false">
                        </div>
                        <div class="col-md-6" style="float: left">

                            <div id="information">
                                @if(!$has2FactorActivated)
                                    <h6>Wie funktioniert 2-Faktor Authentifizierung?</h6>
                                    <span class="text-muted">1. Installiere Dir dazu eine App wie <a target="_blank" href="https://authy.com">Authy</a> oder <a target="_blank" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=de">Google-Authenticator</a></span><br>
                                    <span class="text-muted">2. Scanne den von dir Linken QR-Code</span><br>
                                    <span class="text-muted">3. Gebe den generierten Code von der App in das untere Input-Feld ein.</span><br>
                                @else
                                    <h6>Infomation:</h6>
                                    <span class="text-muted">Aktiviert am: {{ date('d.m.Y H:i', strtotime(auth()->user()->payload->{'2factor'}->activated_at)) }}</span><br>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <br>
                            @if(!$has2FactorActivated)
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="number" min="6" max="6" class="form-control" id="2factorCode" name="2factorCode" onkeypress="if (event.keyCode == 13) { check2Factor($('#checkAndSafeBtn')) }" placeholder="Generierten Code eingeben">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-primary" id="checkAndSafeBtn" onclick="check2Factor(this)">Überprüfen & Speichern</button>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <button type="button" class="btn btn-outline-danger" style="float: left;" onclick="deactivate2Factor(this)">Zurücksetzen</button>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function check2Factor(btn) {
            $(btn).html('<i class="fa fa-spinner fa-spin"></i> Überprüfen...');
            $(btn).attr('disabled', 'disabled');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '{{ route('ajax.licensor.activate2factor.check') }}',
                data: {
                    code: $("#2factorCode").first().val(),
                },
                complete: function (data) {
                    data = data.responseJSON;
                    if (data.success) {
                        $( "#2factorBox" ).parent().load(window.location.href + " #2factorBox" );
                        Swal.fire({
                            title: 'Erfolgreich',
                            text: 'Sie haben 2-Faktor erfolgreich eingerichtet. Ihr Konto ist nun optimal gesichert!',
                            type: 'success',
                        })
                    } else {
                        $(btn).html('Überprüfen & Speichern');
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
        function deactivate2Factor(btn) {
            $(btn).html('<i class="fa fa-spinner fa-spin"></i> Zurücksetzen...');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '{{ route('ajax.licensor.deactivate2factor.check') }}',
                complete: function (data) {
                    data = data.responseJSON;
                    if (data.success) {
                        $( "#2factorBox" ).parent().load(window.location.href + " #2factorBox" );
                        Swal.fire({
                            title: 'Erfolgreich',
                            text: 'Sie haben 2-Faktor erfolgreich deaktiviert.',
                            type: 'success',
                        })
                    } else {
                        Swal.fire({
                            title: 'Fehlerhaft',
                            text: 'Sie konnten 2-Faktor nicht deaktiviert, da es schon deaktiviert ist.',
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
