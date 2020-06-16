<header class="site-header shadow-lg fixed-top">
  <div class="container mx-auto">
    <div class="row align-items-center">
      <a class="navbar-brand mr-auto my-0" href="{{ url('/') }}"><img src="{{ URL::to('/') }}/img/app-icons/logo.png" class="xiangqi-logo" alt="xiangqi logo"><span>Cờ tướng</span></a>
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
            <a class="contact" href="{{ url('/lien-he') }}">Liên hệ</a>
          </li>
          <li class="pt-4">
            <a class="lang" href="{{ url($langUrl) }}">English</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</header>