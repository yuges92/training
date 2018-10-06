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
  {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
  {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> --}}
  <!-- Styles -->
  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


  @stack('css')
</head>
<body>
  <div class="loaderDiv">

    <div class="loader">
    </div>

  </div>

  <main class="main-body">
    @yield('body')
  </main>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
  <script>
  if(document.getElementById('textareaEditor')){
    CKEDITOR.replace( 'textareaEditor' );

  }
  </script>
  @stack('js')
</body>
</html>
