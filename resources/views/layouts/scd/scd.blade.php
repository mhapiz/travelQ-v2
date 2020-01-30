<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  @stack('prepend-style')
  @include('modules.scd.style')
  @stack('append-style')
  
  <title>
    @yield('title')
  </title>
</head>

<body>
  @include('modules.scd.navbar')

  @yield('content')


  @include('modules.scd.footer')


  @stack('prepend-script')
  @include('modules.scd.script')
  @stack('append-script')

  
  <script src="assets/libraries/gijgo/js/gijgo.min.js"></script>
  <script>
    $('.datepicker').datepicker({
      uiLibrary: 'bootstrap4',
      icon: {
        rightIcon: '<img src="frontend/img/icons/calendar.png">'
      }
    })
  </script>

</body>

</html>