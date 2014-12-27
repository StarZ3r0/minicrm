<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')
    <meta name="author" content="Lakatos Tibor">
    <link rel="shortcut icon" href="/favicon.ico">
    <title>
      @section('title') 
        MiniCRM próbafeladat
      @show
    </title>
    
    @if (App::environment('local'))
    {{ HTML::style('/assets/vendor/bootstrap/dist/css/bootstrap.min.css') }}
    {{ HTML::style('/assets/vendor/bootstrap/dist/css/bootstrap-theme.min.css') }}
    {{ HTML::style('/assets/vendor/fontawesome/css/font-awesome.min.css') }}
    {{ HTML::style('/assets/vendor/raty/lib/jquery.raty.min.css') }}
    {{ HTML::style('/assets/css/default.css') }}
    @else
    {{ HTML::style('/assets/dist/css/all.min.css') }}
    @endif


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/assets/vendor/html5shiv/dist/html5shiv.min.js"></script>
      <script src="/assets/vendor/respond/dest/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    @include('includes.navbar')
    <div class="container">
        @yield('content')
        <hr>
        <footer>
            <p>&copy; Lakatos Tibor {{ date('Y') }}</p>
        </footer>
    </div>
    
    @if (App::environment('local'))
    {{ HTML::script('/assets/vendor/jquery/dist/jquery.min.js') }}
    {{ HTML::script('/assets/vendor/bootstrap/dist/js/bootstrap.min.js') }}
    {{ HTML::script('/assets/js/parsley-config.js') }}
    {{ HTML::script('/assets/vendor/parsleyjs/dist/parsley.min.js') }}
    {{ HTML::script('/assets/js/parsley-i18n-hu.js') }}
    {{ HTML::script('/assets/vendor/bootbox/bootbox.js') }}
    {{ HTML::script('/assets/vendor/raty/lib/jquery.raty.js') }}
    {{ HTML::script('/assets/js/default.js') }}
    @else
    {{ HTML::script('/assets/dist/js/all.min.js') }}
    @endif

  </body>
</html>

