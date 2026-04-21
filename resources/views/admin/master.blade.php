<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">
    <title>Blank | Dasher - Responsive Bootstrap 5 Admin Dashboard</title>

    @include('admin.componens.icons')


    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="../assets/images/favicon/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />
    <!-- Color modes -->

    @include('admin.componens.js-head')


    @include('admin.componens.css')

</head>

<body class="d-flex flex-column min-vh-100">

    @include('admin.partial.side-navbar')
    <!-- Main Content -->
    <div id="content" class="position-relative h-100 flex-grow-1">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page header -->
                    <div class="mb-5">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.partial.top-navbar')


    @include('admin.componens.js')

    <footer class="footer mt-auto">
        <div class="container">
            <div class="row align-item-center flex-row-reverse">
                <div class="col-md-12 col-sm-12 text-center">
                    <p class="text-center">© All rights reserved by <a href="https://codescandy.com"
                            target="_blank">CodesCandy</a>.
                        Distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>.</p>
                </div>
            </div>
        </div>
    </footer>




</body>

</html>


</body>

</html>
