<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>pendataan</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
    <!-- Nepcha Analytics (nepcha.com) -->
    <script defer data-site="cjm.garment.co.id" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="hold-transition sidebar-mini bg-gray-300">
    @include('pro.partials.aside')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    @include('component.message')
                    <div class="card-header">
                        <h2 class="ms-3 py-3 text-dark">Data Produksi</h2>
                    </div>
                    <div class="container-lg">
                        <table border="1" id="example1" class="table border">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Foto</th>
                                    <th>Sales Order</th>
                                    <th>Brand</th>
                                    <th>Article</th>
                                    <th>Total</th>
                                    <th>Output</th>
                                    <th>Remain</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($data as $i)
                                        <td>
                                            <img style="max-width: 100px;max-height:100px"
                                                src="{{ url('foto') . '/' . $i->foto }}">
                                        </td>
                                        <td>
                                            {{ $i->so }}
                                        </td>
                                        <td>
                                            {{ $i->brand }}
                                        </td>
                                        <td>
                                            {{ $i->artikel }}
                                        </td>
                                        <td>
                                            {{ $i->total }}
                                        </td>
                                        <td>
                                            {{ $i->output }}
                                        </td>
                                        <td>
                                            {{ $i->total - $i->output }}
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <!-- DataTables  & Plugins -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/jszip/jszip.min.js"></script>
    <script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <!-- AdminLTE App -->
    <!-- Page specific script -->
    <script>
        $(document).ready(function() {
            var trigger = $('.hamburger'),
                overlay = $('.overlay'),
                isClosed = false;

            trigger.click(function() {
                hamburger_cross();
            });

            function hamburger_cross() {

                if (isClosed == true) {
                    overlay.hide();
                    trigger.removeClass('is-open');
                    trigger.addClass('is-closed');
                    isClosed = false;
                } else {
                    overlay.show();
                    trigger.removeClass('is-closed');
                    trigger.addClass('is-open');
                    isClosed = true;
                }
            }

            $('[data-toggle="offcanvas"]').click(function() {
                $('#wrapper').toggleClass('toggled');
            });
        });
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
        });
    </script>
</body>

</html>
