<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Monitoring Evaluasi Model Social Listening Tools</title>
    <meta name="description" content="Monitoring Social Listening Tools">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- style -->
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
</head>

<body>
    <!-- sidebar -->
    @include('includes.sidebar')

    <div id="right-panel" class="right-panel">

    <!-- navbar -->
    @include('includes.navbar')


        <div class="content">
            <!-- content -->
            @yield('content')
        </div>

        <div class="clearfix"></div>
    </div>


    <!-- script -->
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')

</body>
</html>
