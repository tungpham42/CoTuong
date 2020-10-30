<!DOCTYPE html>
<html lang="vi">
  <head>
    @include('layout.partials.head')
  </head>
  <body class="{{ $bodyClass }}">
    @include('layout.partials.header')
    <main>
      <div class="container-fluid game px-0" itemscope itemtype="http://schema.org/Game">
        <div class="container {{ isset($board) ? 'px-3 pb-0 pt-3' : 'p-3' }}">
          <audio id="nuoc-co">
            <source src="https://cotuong.r.worldssl.net/sound/nuocCo.mp3" type="audio/mpeg">
            <source src="https://cotuong.r.worldssl.net/sound/nuocCo.wav" type="audio/wav">
            Your browser does not support the audio element.
          </audio>
          <audio id="het-tran">
            <source src="https://cotuong.r.worldssl.net/sound/hetTran.mp3" type="audio/mpeg">
            <source src="https://cotuong.r.worldssl.net/sound/hetTran.wav" type="audio/wav">
            Your browser does not support the audio element.
          </audio>
          @if ( isset($board) )
          <p class="w-100 text-center">
            <a id="capture" class="btn btn-danger btn-lg" href="javascript:void(0);"><i class="fal fa-camera"></i> Chụp bàn cờ thế</a>
          </p>
          @endif
          <div id="ban-co" class="w-50 mx-auto"></div>
          <p class="w-100 text-center my-3">
            <span class="d-inline-block rounded" id="game-status"></span>
          </p>
          <p class="w-100 text-center mt-2">
            <span class="rounded d-none" id="game-over" data-toggle="tooltip" data-placement="top" data-original-title="Ấn 'Tạo phòng mới' để chơi ván khác nhé"><i class="fad fa-flag-checkered"></i> HẾT TRẬN</span>
          </p>
          <p class="w-100 text-center my-4">
            <a id="tao-phong" data-phong="<?php echo md5(time()); ?>" data-url="{{ URL::to('/') }}/phong/<?php echo md5(time()); ?>" class="btn btn-success btn-lg{{ $roomCode == '' ? ' pulse': '' }}"><i class="fad fa-plus-circle"></i> Tạo phòng mới</a>
          </p>
          @yield('aboveContent')
          <div class="row">
            <input type="hidden" name="FEN" id="FEN" />
            <input type="hidden" name="piecesUrl" id="piecesUrl" value="{{ URL::to('/') }}" />
            @include('layout.partials.scripts')
            @yield('belowContent')
            @if ( !isset($board) )
            <p class="w-100 text-center mt-2">
              <a id="share-board" class="mx-auto btn btn-success btn-lg pulse py-2" href="{{ URL::to('/chia-se/') }}"><i class="fad fa-share"></i> Chia sẻ bàn cờ</a>
            </p>
            <script>
            $('#share-board').on('click', function(){
              $(this).attr('href', $(this).attr('href') + '/' + game.fen());
            });
            </script>
            @endif
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