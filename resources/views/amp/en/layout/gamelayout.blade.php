<!DOCTYPE html>
<html amp lang="en">
  <head>
    @include('amp.en.layout.partials.head')
  </head>
  <body class="{{ $bodyClass }}">
    @include('amp.en.layout.partials.header')
    <main>
      <div class="container-fluid game px-0" itemscope itemtype="http://schema.org/Game">
        <div class="container {{ url()->current() == URL::to('/amp/set-up/') ? 'px-3 pb-0 pt-3' : 'p-3' }}">
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
          @if ( url()->current() == URL::to('/amp/set-up/') )
          <p class="w-100 text-center">
            <a style="color: white" id="capture" class="btn btn-danger btn-lg" href="javascript:void(0);"><i class="fal fa-camera"></i> Capture the board</a>
          </p>
          @endif
          <div id="ban-co" class="w-50 mx-auto"></div>
          <p class="w-100 text-center my-3">
            <span class="d-inline-block rounded" id="game-status"></span>
          </p>
          <p class="w-100 text-center mt-2">
            <span class="rounded d-none" id="game-over" data-toggle="tooltip" data-placement="top" data-original-title="Press 'Host a Room' to play with real person"><i class="fad fa-flag-checkered"></i> GAME OVER</span>
          </p>
          <p class="w-100 text-center my-4">
            <a style="color: white" id="tao-phong" data-phong="<?php echo md5(time()); ?>" data-url="{{ URL::to('/amp') }}/room/<?php echo md5(time()); ?>" class="btn btn-success btn-lg{{ $roomCode == '' ? ' pulse': '' }}"><i class="fad fa-plus-circle"></i> Host a room</a>
          </p>
          @yield('aboveContent')
          <div class="row">
            <input type="hidden" name="FEN" id="FEN" />
            <input type="hidden" name="piecesUrl" id="piecesUrl" value="{{ URL::to('/') }}" />
            @include('amp.en.layout.partials.scripts')
            @yield('belowContent')
            @if (url()->current() != URL::to('/amp/set-up/'))
            <p class="w-100 text-center mt-2">
              <a style="color: white" id="share-board" class="mx-auto btn btn-success btn-lg pulse py-2"><i class="fad fa-share"></i> Share board</a>
            </p>
            <script>
            $('#share-board').on('click', function(){
              window.location.href = "{{ URL::to('/amp/share/') }}/" + game.fen();
            });
            </script>
            @endif
          </div>
        </div>
      </div>
      @include('amp.en.layout.partials.rules')
      @include('amp.en.layout.partials.adsense')
      @include('amp.en.layout.partials.fb')
    </main>
    @include('amp.en.layout.partials.footer')
  </body>
</html>