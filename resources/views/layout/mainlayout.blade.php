<!DOCTYPE html>
<html lang="vi">
  <head>
    @include('layout.partials.head')
  </head>
  <body class="{{ $bodyClass }}">
    @include('layout.partials.header')
    <main>
      @yield('aboveContent')
      @include('layout.partials.scripts')
      @yield('belowContent')
      @include('layout.partials.adsense')
      @include('layout.partials.fb')
    </main>
    @include('layout.partials.footer')
  </body>
</html>