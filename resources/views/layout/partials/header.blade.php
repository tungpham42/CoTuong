<header class="site-header shadow-lg fixed-top">
  <div class="container mx-auto">
    <div class="row align-items-center">
      <a class="navbar-brand mr-auto my-0" href="{{ url('/') }}"><img src="{{ URL::to('/') }}/img/app-icons/logo.png" class="xiangqi-logo" alt="xiangqi logo"><span>Cờ tướng</span><span id="header-status"></span></a>
      <div class="menu-toggle open" title="Trình đơn"></div>
      <nav class="navbar py-0">
        <ul class="nav navbar-nav">
          <li class="pt-4">
            <a class="home" href="{{ url('/') }}">Trang chủ</a>
          </li>
          <li class="pt-4">
            <a class="room" href="{{ url('/danh-sach-phong') }}">Danh sách phòng</a>
          </li>
          <li class="pt-4">
            <a class="about" href="{{ url('/gioi-thieu') }}">Giới thiệu</a>
          </li>
          <li class="pt-4">
            <a class="lang" href="{{ url($langUrl) }}">English</a>
          </li>
          <li class="pt-4">
            <a target="_blank" class="buy" href="https://www.codester.com/items/24223/xiangqi-game-with-ai-and-room-hosting?ref=tungpham"><i class="fal fa-usd-circle"></i> MUA</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</header>