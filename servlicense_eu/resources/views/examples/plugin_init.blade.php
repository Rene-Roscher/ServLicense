@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code (DataTables Plugin) -->
    <!--
        The following JS code was taken from the assets/_es6/pages/be_tables_datatables.js file, found in the HTML version.
        In the same way, you can use any custom JS code you need to init the examples showcased in the HTML version.

        If you are not planning on using the custom JS code in your main JS file and let Laravel Mix handle it (and you would
        like to use the JS code as showcased in this page), you will have to compile the code to ES5 first to make sure it runs
        correctly on all popular browsers. Feel free to check out the online compiler at https://babeljs.io/repl if you would
        like to use it this way.
    -->
    <script>
        jQuery(function(){
            // Override a few default classes
            jQuery.extend(jQuery.fn.dataTable.ext.classes, {
                sWrapper: "dataTables_wrapper dt-bootstrap4",
                sFilterInput:  "form-control",
                sLengthSelect: "form-control"
            });

            // Override a few defaults
            jQuery.extend(true, jQuery.fn.dataTable.defaults, {
                language: {
                    lengthMenu: "_MENU_",
                    search: "_INPUT_",
                    searchPlaceholder: "Search..",
                    info: "Page <strong>_PAGE_</strong> of <strong>_PAGES_</strong>",
                    paginate: {
                        first: '<i class="fa fa-angle-double-left"></i>',
                        previous: '<i class="fa fa-angle-left"></i>',
                        next: '<i class="fa fa-angle-right"></i>',
                        last: '<i class="fa fa-angle-double-right"></i>'
                    }
                }
            });

            // Init full DataTable
            jQuery('.js-dataTable-full').dataTable({
                pageLength: 5,
                lengthMenu: [[5, 10, 20], [5, 10, 20]],
                autoWidth: false
            });

            // Init DataTable with Buttons
            jQuery('.js-dataTable-buttons').dataTable({
                pageLength: 5,
                lengthMenu: [[5, 10, 20], [5, 10, 20]],
                autoWidth: false,
                buttons: [
                    { extend: 'copy', className: 'btn btn-sm btn-primary' },
                    { extend: 'csv', className: 'btn btn-sm btn-primary' },
                    { extend: 'print', className: 'btn btn-sm btn-primary' }
                ],
                dom: "<'row'<'col-sm-12'<'text-center bg-body-light py-2 mb-2'B>>>" +
                    "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"
            });
        });
    </script>
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">DataTables Example</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Examples</li>
                        <li class="breadcrumb-item active" aria-current="page">Plugin</li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Info -->
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Plugin Example</h3>
            </div>
            <div class="block-content">
                <p>
                    This page showcases how easily you can add a plugin’s JS/CSS assets and init it using custom JS code.
                </p>
            </div>
        </div>
        <!-- END Info -->

        <!-- Dynamic Table Full -->
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Dynamic Table <small>Full</small></h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized at the top of this page -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                            <th style="width: 15%;">Registered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i < 21; $i++)
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.php">John Doe</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client{{ $i }}<em class="text-muted">@example.com</em>
                            </td>
                            <td>
                                <em class="text-muted">{{ rand(2, 10) }} days ago</em>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->

        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Dynamic Table <small>Export Buttons</small></h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized at the top of this page -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                            <th style="width: 15%;">Registered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i < 21; $i++)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.php">John Smith</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client{{ $i }}<em class="text-muted">@example.com</em>
                            </td>
                            <td>
                                <em class="text-muted">{{ rand(2, 10) }} days ago</em>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
    <!-- END Page Content -->
@endsection
