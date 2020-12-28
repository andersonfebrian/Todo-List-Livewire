<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.meta')
  @livewireStyles
</head>
  <body>

    @yield('content')

    @livewireScripts
    @include('layouts.scripts')
  </body>
</html>