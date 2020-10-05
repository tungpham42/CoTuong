<header class="site-header shadow-lg fixed-top">
  <div class="container mx-auto">
    <div class="row align-items-center">
      <a class="navbar-brand mr-auto my-0" href="{{ url('/en') }}"><img src="{{ URL::to('/') }}/img/app-icons/logo.png" class="xiangqi-logo" alt="xiangqi logo"><h1 class="d-inline" style="font-size: inherit !important;"><strong>Xiangqi</strong></h1><span id="header-status"></span></a>
      <div class="menu-toggle open" title="Trình đơn"></div>
      <nav class="navbar py-0">
        <ul class="nav navbar-nav">
          <li class="pt-4">
            <a class="home" href="{{ url('/en') }}">Home</a>
          </li>
          <li class="pt-4">
            <a class="room" href="{{ url('/rooms') }}">Rooms</a>
          </li>
          <li class="pt-4">
            <a class="setup" href="{{ url('/set-up') }}">Set Up</a>
          </li>
          <li class="pt-4">
            <a class="contact" href="{{ url('/contact-us') }}">Contact Us</a>
          </li>
          <li class="pt-4">
            <a class="blog" href="{{ url('/blog') }}">Blog</a>
          </li>
          <li class="pt-4">
            <a class="lang" href="{{ url($langUrl) }}">Tiếng Việt</a>
          </li>
          <li class="pt-4">
            <a target="_blank" class="buy" href="https://www.codester.com/items/24523/dual-languages-xiangqi-game-with-ai-and-room-host?ref=tungpham"><i class="far fa-shopping-cart"></i></a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</header>