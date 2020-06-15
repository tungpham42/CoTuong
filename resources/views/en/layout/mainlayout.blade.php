<!DOCTYPE html>
<html lang="en">
  <head>
    @include('en.layout.partials.head')
  </head>
  <body class="{{ $bodyClass }}">
    @include('en.layout.partials.header')
    <main>
      @yield('aboveContent')
      @include('en.layout.partials.scripts')
      @yield('belowContent')
      @include('en.layout.partials.adsense')
      @include('en.layout.partials.fb')
    </main>
    @include('en.layout.partials.footer')
  </body>
</html>