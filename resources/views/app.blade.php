<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <title>Laravel</title>

    </head>
    <body>
<div class="container">
  <div class="row">
      @section('contents')
        @show
  </div>
</div>
          @stack('scripts')
    </body>
</html>
