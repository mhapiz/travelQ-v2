<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('frontend/assets/libraries/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Courgette|Nunito:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('frontend/assets/libraries/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ url('frontend/assets/image/icons/travelqlogo.png') }}" type="image/x-icon">


    <title>
      @yield('title')
    </title>
</head>

<body>
    @yield('content')

</body>

</html>
