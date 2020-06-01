@extends('layouts.app')

@section('breadcrumbs')
    Administration
@endsection

@section('content')
    <div class="content">
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Statistiken
        </h2>
        <div class="row">
            @foreach(\App\Helper\Helpers::getModels(app_path("Models/"), "App\\Models\\") as $item => $value)
                <div class="col-sm-2">
                    <a class="element-box el-tablo" href="#">
                        <div class="label">
                            @php($reflection = new ReflectionClass($value))
                            {{ $reflection->getShortName().'S' }}
                        </div>
                        <div class="value">
                            {{ $value::all()->count() }}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Heutige Statistiken
        </h2>
        <div class="row">
            <div class="col-sm-3">
                <a class="element-box el-tablo" href="#">
                    <div class="label">
                        Registrierungen
                    </div>
                    <div class="value">
                        {{ \App\Models\User::all()->where('created_at', '>=', \Carbon\Carbon::now()->startOfDay())->count() }}
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <a class="element-box el-tablo" href="#">
                    <div class="label">
                        Lizenzerstellungen
                    </div>
                    <div class="value">
                        121
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <a class="element-box el-tablo" href="#">
                    <div class="label">
                        Produkterstellungen
                    </div>
                    <div class="value">
                        53
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <a class="element-box el-tablo" href="#">
                    <div class="label">
                        Umsatz
                    </div>
                    <div class="value">
                        2351€
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <a class="element-box el-tablo" href="#">
                    <div class="label">
                        Ticket-erstellungen
                    </div>
                    <div class="value">
                        4
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <a class="element-box el-tablo" href="#">
                    <div class="label">
                        Ticket-Antworten
                    </div>
                    <div class="value">
                        311
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <a class="element-box el-tablo" href="#">
                    <div class="label">
                        Ticket-Schließungen
                    </div>
                    <div class="value">
                        31
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <a class="element-box el-tablo" href="#">
                    <div class="label">
                        Kontoschließungen
                    </div>
                    <div class="value">
                        31
                    </div>
                </a>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#sessions-table').DataTable({--}}
{{--                serverSide: true,--}}
{{--                processing: true,--}}
{{--                ajax: '{{ route('licensor.ajax.sessions.load') }}',--}}
{{--                columns: [--}}
{{--                    {data: 'id'},--}}
{{--                    {data: 'ip_address'},--}}
{{--                    {data: 'last_activity'},--}}

{{--                ]--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endsection
