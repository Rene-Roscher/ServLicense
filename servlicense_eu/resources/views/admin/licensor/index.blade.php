@extends('layouts.app')

@section('breadcrumbs')
    Lizenzgeber - Übersicht
@endsection

@section('content')
    <div class="content">
        <div class="ownedbox">
            <h4 class="title">Auflistung der Lizenzgeber</h4>
            <hr>
            <div style="margin: 2em">
                <table class="table" id="sessions-table">
                    <thead>
                    <tr>
                        <th scope="col">
                            <a href="#" class="text-muted">#</a>
                        </th>
                        <th scope="col">
                            <a href="#" class="text-muted">Name</a>
                        </th>
                        <th scope="col">
                            <a href="#" class="text-muted">E-Mail</a>
                        </th>
                        <th scope="col">
                            <a href="#" class="text-muted">Rolle</a>
                        </th>
                        <th scope="col">
                            <a href="#" class="text-muted">Registrierungsdatum</a>
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
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#sessions-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: '{{ route('admin.ajax.licensor.load') }}',
                language: {
                    url: "{{ url('datatables/language.json') }}",
                },
                columns: [

                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'role'},
                    {data: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}

                ]
            });
        });
    </script>
@endsection
