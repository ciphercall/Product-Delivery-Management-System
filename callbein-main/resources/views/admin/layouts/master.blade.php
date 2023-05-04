<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="{{ asset('admin/assets/img/logo/mcllogo.jpg') }}" rel="icon" />
        <!-- <link href="{{ asset('admin/assets') }}/img/logo/logo.png" rel="icon" /> -->
        <title>BEINCALL - Dashboard</title>
        <link href="{{ asset('admin/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/ruang-admin.min.css') }}" rel="stylesheet" />
        {{-- <link href="{{ asset('admin/assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> --}}
        <link href="https://cdn.datatables.net/v/dt/dt-1.10.16/sl-1.2.5/datatables.min.css" rel="stylesheet">
        <link href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet">
    </head>

    <body id="page-top">
        <div id="wrapper">
            <!-- Sidebar -->
            @include('admin.layouts.sidebar.sidebar')
            <!-- Sidebar -->
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <!-- TopBar -->
                    @include('admin.layouts.header.topbar')
                    <!-- Topbar -->

                    <!-- Container Fluid-->
                    @yield('main-content')
                    <!---Container Fluid-->

                </div>
                <!-- Footer -->
                @include('admin.layouts.footer.footer')
                <!-- Footer -->
            </div>
        </div>

        <!-- Scroll to top -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <script src="{{ asset('admin/assets/vendor/jquery/jquery.min.js') }}"></script>
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
        <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/ruang-admin.min.js') }}"></script>
        {{-- <script src="{{ asset('admin/assets/vendor/chart.js/Chart.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('admin/assets/js/demo/chart-area-demo.js') }}"></script> --}}
         <!-- Page level plugins -->
        {{-- <script src="{{ asset('admin/assets/vendor/datatables/jquery.dataTables.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('admin/assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script> --}}
        <script src="https://cdn.datatables.net/v/dt/dt-1.10.16/sl-1.2.5/datatables.min.js"></script>
        <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>

        <!-- Page level custom scripts -->
        <script>
            $(document).ready(function () {
            $('#dataTable').DataTable({
                "order": [],
                "lengthMenu": [[10, 25, 50,100,500, -1], [10, 25, 50,100,500, 'All']],
                "pagingType" : 'simple',
            });

            // ID From dataTable
            $('#dataTable1').DataTable({
                "order": [],
            }); // ID From dataTable
            $('#dataTable2').DataTable({
                "order": [],
            }); // ID From dataTable
            $('#dataTable3').DataTable({
                "order": [],
            }); // ID From dataTable
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
            });
        </script>
        @yield('main-script')
    </body>
</html>
