<!DOCTYPE html>
<html lang="vi">
  <head>
    @include('layout.partials.head')
  </head>
  <body class="{{ $bodyClass }}">
    @include('layout.partials.header')
    <main>
    <div class="container-fluid game px-0">
        <div class="container p-5">
          <h2 class="h1-responsivefooter text-center my-4">Cờ tướng cho mọi người</h2>
          <audio id="nuoc-co">
            <source src="{{ URL::to('/') }}/sound/nuocCo.mp3" type="audio/mpeg">
            <source src="{{ URL::to('/') }}/sound/nuocCo.wav" type="audio/wav">
            Your browser does not support the audio element.
          </audio>
          <audio id="het-tran">
            <source src="{{ URL::to('/') }}/sound/hetTran.mp3" type="audio/mpeg">
            <source src="{{ URL::to('/') }}/sound/hetTran.wav" type="audio/wav">
            Your browser does not support the audio element.
          </audio>
          <p class="w-100 text-center my-1">
            <a id="tao-phong" data-phong="<?php echo md5(time()); ?>" data-url="/phong/<?php echo md5(time()); ?>" class="btn btn-success btn-lg{{ $roomCode == '' ? ' pulse': '' }}"><i class="fad fa-plus-circle"></i> Tạo phòng mới</a>
          </p>
          @yield('aboveContent')
          <div class="row">
            <p class="w-100 text-center my-1">
              <span class="d-inline-block rounded" id="game-status"></span>
            </p>
            <p class="w-100 text-center mt-2">
              <span class="rounded d-none" id="game-over" data-toggle="tooltip" data-placement="top" data-original-title="Ấn 'Tạo phòng{{ $roomCode != '' ? ' mới': '' }}' để chơi ván khác nhé"><i class="fad fa-flag-checkered"></i> HẾT TRẬN</span>
            </p>
            <div id="ban-co" class="w-50 mx-auto"></div>
            <input type="hidden" name="FEN" id="FEN" />
            @include('layout.partials.scripts')
            @yield('belowContent')
          </div>
        </div>
      </div>
      @include('layout.partials.rules')
      @include('layout.partials.adsense')
      @include('layout.partials.fb')
    </main>
    @include('layout.partials.footer')
  </body>
</html>