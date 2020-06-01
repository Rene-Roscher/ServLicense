@extends('layouts.app')

@section('breadcrumbs')
    Dashboard
@endsection

@section('content')
    <div class="content">
        @if(session()->has('verified') && session()->remove('verified'))
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="alert block block-rounded block-bordered" role="alert">
                <strong>Sie haben Ihr Konto erfolgreich bestätigt.</strong>
                <ul class="">
                    <li>
                        Sie können nun Produkte & Lizenzen anlegen.
                    </li>
                    <li>
                        Bei Fragen, steht ihnen unser Support gerne zu Verfügung.
                    </li>
                </ul>
                <br>
                <a href="#" class="btn btn-sm btn-outline-primary">
                    Produkte erstellen & erste Erfahrung sammeln :)
                </a>
            </div>
        @elseif (!auth()->user()->hasVerifiedEmail())
            <div class="alert block block-rounded block-bordered" role="alert" id="resendedAlert" style="display: none">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>
                    Ein neuer Bestätigungslink wurde Ihnen an Ihre E-Mail-Adresse gesendet.
                </strong>
            </div>

            <div class="alert block block-rounded block-bordered" id="unverifedAlert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Konto bestätigung ausstehend!</strong><br>
                <small>
                    <ul class="pl-4 mb-0">
                        <li>
                            Bitte überprüfen Sie Ihr E-Mail-Postfach, ob Sie dort eine bestätigungs E-Mail bekommen
                            haben.
                        </li>
                    </ul>
                </small>
                <br>
                <button onclick="resendVerificationMail(this);" class="btn btn-sm btn-outline-primary">
                    Bestätigung erneut senden
                </button>
            </div>
        @endif
            <h2 class="content-heading">
                <i class="fa fa-angle-right text-muted mr-1"></i> Übersicht
            </h2>
            <div class="row">
                <div class="col-sm-3">
                    <a class="element-box el-tablo" href="#">
                        <div class="label">
                            Guthaben
                        </div>
                        <div class="value">
                            {{ auth()->user()->money }} €
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a class="element-box el-tablo" href="#">
                        <div class="label">
                            Lizenzen
                        </div>
                        <div class="value" id="volumeDisplay">
                            7
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a class="element-box el-tablo" href="#">
                        <div class="label">
                            Produkte
                        </div>
                        <div class="value" id="state">
                            0
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a class="element-box el-tablo" href="#">
                        <div class="label">
                            Offene Tickets
                        </div>
                        <div class="value" id="volumeDisplay">
                            7
                        </div>
                    </a>
                </div>

            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="ownedbox">
                        <h4 class="title">Aktuelles</h4>
                        <hr>
                        <div id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="block block-rounded mb-1">
                                <div class="block-header block-header-default" role="tab" id="accordion_h1">
                                    <a class="font-w600" data-toggle="collapse" data-parent="#accordion" href="#accordion_q1" aria-expanded="true" aria-controls="accordion_q1">1.1 Accordion Title</a>
                                </div>
                                <div id="accordion_q1" class="collapse show" role="tabpanel" aria-labelledby="accordion_h1" data-parent="#accordion">
                                    <div class="block-content">
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="block block-rounded mb-1">
                                <div class="block-header block-header-default" role="tab" id="accordion_h2">
                                    <a class="font-w600" data-toggle="collapse" data-parent="#accordion" href="#accordion_q2" aria-expanded="true" aria-controls="accordion_q2">1.2 Accordion Title</a>
                                </div>
                                <div id="accordion_q2" class="collapse" role="tabpanel" aria-labelledby="accordion_h2" data-parent="#accordion">
                                    <div class="block-content">
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="ownedbox">
                        <h4 class="title">Aktuelle Sitzungen</h4>
                        <hr>
                        <table class="table" id="sessions-table">
                            <thead>
                            <tr>
                                <th scope="col">
                                    <a href="#" class="text-muted">IPv4</a>
                                </th>
                                <th scope="col">
                                    <a href="#" class="text-muted">Letzte Aktivität</a>
                                </th>
                                <th scope="col">
                                    <a href="#" class="text-muted">Aktionen</a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

    </div>



@endsection

@section('scripts')
    <script>
        var table = null;
        $(document).ready(function () {
            table = $('#sessions-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: '{{ route('ajax.licensor.sessions.load') }}',
                language: {
                    url: "{{ url('datatables/language.json') }}",
                },
                columns: [
                    {data: 'ip_address'},
                    {data: 'last_activity'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
            table.on( 'click', 'button', function () {
                $.ajax({
                    type: 'DELETE',
                    url: 'licensor/session/' + $(this).attr('data-sessionId') + '/destroy',
                });
                setTimeout(function () {
                    table.row($(this).parents('tr')).remove().draw(false);
                }, 500)
            });
        });
    </script>
@endsection
