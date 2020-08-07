<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Bootstrap Datatables Buttons css -->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css">
    <!-- jQuery UI theme -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/select2.min.css') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('backend/css/style.min.css') }}" rel="stylesheet">
    @stack('css')
    <style>
        /*datatable style*/
        .sidebar-nav ul .sidebar-item .first-level .sidebar-link{
            margin-left: 40px;
        }
        .custom_datatable table thead th {
            border-bottom: 1px solid #dee2e6;
        }
        table.dataTable.no-footer {
             border-bottom:  1px solid #dee2e6 !important;
        }
        .custom_datatable .dt-buttons.btn-group{
            position: absolute !important;
            left: 55% !important;
            width: 100% !important;
        }
        .custom_datatable .dt-buttons.btn-group .btn.btn-secondary{
            font-size: 0.76563rem;
            color: #fff;
            text-align: center !important;
            padding: 4px 15px;
            border: 1px solid #fff;
            background: #6b09a9;
            font-family: "Nunito Sans", sans-serif;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button{
            margin: 0 !important;
            padding: 0 !important;
            border: none !important;
        }
        .paginate_button:hover{
            background: none !important;
            border: none !important;
        }

        /*badge button style*/
        button.btn-badge{
            border: none;
            cursor: pointer;
        }
    /*    Select2 style*/
        .select2-container--default.select2-container--focus .select2-selection--multiple{
            height: auto;
        }

        .select2-container{
            vertical-align: initial;
        }
    </style>
</head>

<body>
<div id="main-wrapper">
    @include('admin.partial.header')
    @include('admin.partial.sidebar')
    @yield('content')
    @include('admin.partial.footer')
</div>
<script src="{{ asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('backend/plugins/popper.js/popper.min.js') }}"></script>
<script src="{{ asset('backend/plugins/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/js/perfect-scrollbar.jquery.min.js') }}"></script>
{{--<!--Wave Effects -->--}}
<script src="{{ asset('backend/js/waves.js')}}"></script>
{{--<!--Menu sidebar -->--}}
<script src="{{ asset('backend/js/sidebarmenu.js')}}"></script>
<!-- Datatables buttons js -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script src="{{ asset('backend/plugins/select2/select2.min.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('backend/js/custom.min.js')}}"></script>
@stack('scripts')
<script>
    //Datatables Buttons
    $(document).ready(function() {
        let table = $('#data_table').DataTable( {
            lengthChange: true,
            lengthMenu:[[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print' ]
        } );

        table.buttons().container()
            .appendTo( '#data_table_wrapper .col-md-6:eq(0)' );
    } );

    // Multiple Select
    $(document).ready(function () {
        $('#select_all').on('click', function () {
            $('.all_check').prop('checked', this.checked);
        });
    });

    // Multiple Items Select2 Plugin Code
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Please Select An Item",
            searchable: true,
        });
    });

    // Select2 Select all
    // $(document).ready(function () {
    //     $('.select-all').click(function () {
    //         let $select2 = $(this).parent().siblings('.select2');
    //         $select2.find('option').prop('selected', 'selected');
    //         $select2.trigger('change');
    //     });
    //
    //     // Select2 deselect all
    //     $('.deselect-all').click(function () {
    //         let $select2 = $(this).parent().siblings('.select-multiple');
    //         $select2.find('option').prop('selected', '');
    //         $select2.trigger('change');
    //     });
    // });
    $( function() {
        $( "#from_date" ).datepicker({ dateFormat:('yy-mm-dd')});
        $( "#to_date" ).datepicker({ dateFormat:('yy-mm-dd')});
    } );

</script>
</body>
</html>
