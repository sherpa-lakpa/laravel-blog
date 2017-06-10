<!DOCTYPE html>
<html lang="en">

<head>
    @include('admins.partial._head')
</head>

<body>

    <div id="wrapper">

        @include('admins.partial._nav')

        @include('admins.partial._message')

        <div id="page-wrapper">

            <div class="container-fluid">
            
                @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    @include('admins.partial._javascripts')

    @yield('scripts')
</body>

</html>
