@extends('layouts.app')

@section('breadcrumbs')
    Buchhaltung
@endsection

@section('content')
    <div class="content">
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
                        13,48 €
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <a class="element-box el-tablo" href="#">
                    <div class="label">
                        Transaktionen
                    </div>
                    <div class="value" id="volumeDisplay">
                        7
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <a class="element-box el-tablo" href="#">
                    <div class="label">
                        Erfolgreiche Transaktionen
                    </div>
                    <div class="value" id="state">
                        874
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <a class="element-box el-tablo" href="#">
                    <div class="label">
                        Offene Transaktionen
                    </div>
                    <div class="value" id="volumeDisplay">
                        7
                    </div>
                </a>
            </div>

        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="ownedbox">
                    <h4 class="title">Transaktionen <span class="title right" style="box-sizing: border-box;flex: 0 0 auto;padding-left: 1.25rem;"><button class="btn btn-sm btn-outline-primary" onclick="loadPaymentModal();">Aufladen</button></span></h4>
                    <hr>
                    <table class="table" id="transactions-table">
                        <thead>
                        <tr>
                            <th scope="col">
                                <a href="#" class="text-muted">#</a>
                            </th>
                            <th scope="col">
                                <a href="#" class="text-muted">Betrag</a>
                            </th>
                            <th scope="col">
                                <a href="#" class="text-muted">Beschreibung</a>
                            </th>
                            <th scope="col">
                                <a href="#" class="text-muted">Status</a>
                            </th>
                            <th scope="col">
                                <a href="#" class="text-muted">Art</a>
                            </th>
                            <th scope="col">
                                <a href="#" class="text-muted">Erstelldatum</a>
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
            table = $('#transactions-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: '{{ route('ajax.licensor.transactions.load') }}',
                language: {
                    url: "{{ url('datatables/language.json') }}",
                },
                columns: [
                    {data: 'id'},
                    {data: 'amount'},
                    {data: 'description'},
                    {data: 'state'},
                    {data: 'type'},
                    {data: 'created_at'},
                ]
            });
        });
    </script>
@endsection
