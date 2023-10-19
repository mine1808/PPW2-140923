<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="{{ C:\xampp\htdocs\PPW2-140923-210923\resources\css\bootstrap-datepicker.css }}">
    <script src="{{ C:\xampp\htdocs\PPW2-140923-210923\resources\js\bootstrap-datepicker.js }}"></script>
    </head>
    <body>
        @include('layouts.header')
        @yield('content')

        <script type="text/javascript">
            $('.date').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: 'true'
            });
        </script>
    </body>
</html>