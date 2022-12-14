<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Dashboard Admin</title>

    <!-- Fontfaces CSS-->
    <link href="/css/font-face.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/css/theme.css" rel="stylesheet" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->

        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        @include('partials.sidebar')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('partials.header')
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data table</h3>
                                @if (session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                <div class="table-data__tool">
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small"
                                            onclick="location.href='/admin/add/mahasiswa'">
                                            <i class="zmdi zmdi-plus"></i>add item</button>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th>nama</th>
                                                <th>sks</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $mk)
                                                <tr class="tr-shadow">
                                                    <td>{{ ($data->currentPage() - 1) * 20 + $key + 1 }}</td>
                                                    <td>{{ $mk->name }}</td>
                                                    <td>{{ $mk->sks }}</td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <button class="item add" data-toggle="tooltip"
                                                                data-placement="top" title="Tambah"
                                                                value="{{ $mk->id }}">
                                                                <i class="zmdi zmdi-plus-circle"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="spacer"></tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div class='d-flex justify-content-center'>
                                        Halaman : {{ $data->currentPage() }} / {{ $data->lastPage() }} |
                                        Total Data : {{ $data->total() }}
                                    </div>
                                    <div class='d-flex justify-content-center'>
                                        {{ $data->links('pagination::bootstrap-4') }}
                                    </div>
                                    <p id="results"></p>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/vendor/slick/slick.min.js"></script>
    <script src="/vendor/wow/wow.min.js"></script>
    <script src="/vendor/animsition/animsition.min.js"></script>
    <script src="/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="/js/main.js"></script>

    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(700, 0).slideUp(700, function() {
                $(this).remove();
            });
        }, 1000);
    </script>

    {{-- <script>
        var items = [];
        var toggle = false;
        $(".table-data-feature button.add").on("click", function() {
            toggle = !toggle;
            if (toggle === true) {
                items.push(this.value);
                $(this).find($("i")).toggleClass('zmdi zmdi-plus-circle zmdi zmdi-minus-circle');
                // $(this).toggleClass('item add item minus');
            }else{
                items.splice(items.indexOf(this.value), 1);
                $(this).find($("i")).toggleClass('zmdi zmdi-minus-circle zmdi zmdi-plus-circle');
            }

            console.log(items);
            // $("#results").text(items);
        });
    </script> --}}
    <script>
        var items = [];
        $(".table-data-feature button.add").on("click", function() {
            items.push(this.value);
            $(this).find($("i")).toggleClass('zmdi zmdi-plus-circle zmdi zmdi-minus-circle');
            $(this).toggleClass('item add item minus').attr('title', 'Batal');

            console.log(items);
            // $("#results").text(items);
        });
        
    </script>
    <script>
        $(".table-data-feature button.minus").on("click", function() {
            console.log(this.value);
            items.splice(items.indexOf(this.value), 1);
            $(this).find($("i")).toggleClass('zmdi zmdi-minus-circle zmdi zmdi-plus-circle');
            $(this).toggleClass('item minus item add');

            console.log(items);
            // $("#results").text(items);
        });
    </script>
</body>

</html>
<!-- end document-->
