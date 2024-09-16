<head>
    <title>Laravel 10 Task List App</title>
    <h1>@yield('title')</h1>

    @yield('styles')
  </head>

  <body>

    <div>
      @if (session()->has('success'))
        <div>{{ session('success') }}</div>
      @endif

      @yield('content')
    </div>
  </body>
