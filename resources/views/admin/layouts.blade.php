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
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Bootstrap Datatables Buttons css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css">
    <!-- Custom CSS -->
    <link href="{{ asset('backend/css/style.min.css') }}" rel="stylesheet">
    @stack('css')
    <style>
        .sidebar-nav ul .sidebar-item .first-level .sidebar-link{
            margin-left: 40px;
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
<!--Custom JavaScript -->
<script src="{{ asset('backend/js/custom.min.js')}}"></script>
@stack('scripts')
<script>
    //Datatables Buttons
    $(document).ready(function() {
        let table = $('#data_table').DataTable( {
            lengthChange: false,
            pageLength: 10,
            buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print', 'colvis' ]
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
</script>
</body>
</html>
