<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <header>
    <div class="text-center bg-dark p-5 text-white">
      <h1>
        {{config('app.name')}}
      </h1>
    </div>
  </header>
  <main class="">

    <div class="container">
      @yield('content')

    </div>

  </main>
  <footer class="bg-dark text-center text-white p-5">
    <h2 class="p-0 m-0">DLF Footer</h2>

  </footer>
</body>
</html>
