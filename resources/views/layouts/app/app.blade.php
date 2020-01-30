<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  @stack('prepend-style')
  @include('modules.app.style')
  @stack('append-style')

  <title>
    @yield('title')
  </title>
</head>

<body>
  @include('modules.app.navbar')



  @yield('header')

  @yield('content')
  



  @include('modules.app.footer')



  @include('modules.app.script')
  @stack('append-script')
  

</body>

</html>