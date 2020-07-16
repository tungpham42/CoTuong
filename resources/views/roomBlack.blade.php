@extends('layout.gamelayout')
@section('aboveContent')
<p id="room-code" class="w-100 text-center mt-2">
  <span class="alert alert-info d-inline-block" role="alert" data-toggle="tooltip" data-placement="bottom" data-original-title="Ghi nhớ mã phòng này nhé"><i class="fad fa-trophy-alt"></i> Mã phòng: {{ $roomCode }}</span>
</p>
@endsection
@section('belowContent')
<p class="w-100 text-center mt-4">
  <a class="w-25 btn btn-danger btn-lg" href="/phong/{{ $roomCode }}/do"><i class="fad fa-chess-clock-alt"></i> Bên ĐỎ</a>
  <a class="w-25 btn btn-dark btn-lg" href="/phong/{{ $roomCode }}/den"><i class="fad fa-chess-clock"></i> Bên ĐEN</a>
</p>
<script>
$(document).ready(function() {
  bootbox.prompt({
    title: "Nhập mật khẩu để vào phòng:",
    required: true,
    centerVertical: true,
    locale: 'vi',
    buttons: {
      confirm: {
        className: 'btn-success'
      }
    },
    callback: function(password){
      if (password && password != "") {
        $.ajax({
          type: "GET",
          url: '/getPass/' + '{{ $roomCode }}',
          dataType: 'text'
        }).done(function(data) {
          if (data != password) {
            bootbox.alert({
              message: "Sai mật khẩu! Bạn sẽ được chuyển hướng về Trang chủ",
              size: 'small',
              centerVertical: true,
              locale: 'vi',
              buttons: {
                ok: {
                  className: 'btn-success'
                }
              },
              callback: function () {
                window.location.href = '{{ url('/') }}';
              }
            });
          }
        });
      } else {
        bootbox.alert({
          message: "Bạn đã ấn Hủy! Bạn sẽ được chuyển hướng về Trang chủ",
          size: 'small',
          centerVertical: true,
          locale: 'vi',
          buttons: {
            ok: {
              className: 'btn-success'
            }
          },
          callback: function () {
            window.location.href = '{{ url('/') }}';
          }
        });
      }
    }
  });
});
let board = null;
let game = new Xiangqi();

function writeTextFile(roomCode) {
  $.ajax({
    type: "POST",
    url: '/updateFEN',
    data: {
      'ma-phong': roomCode,
      'FEN': game.fen()
    },
    dataType: 'text'
  });
  $('#FEN').val(game.fen());
}

function manipulateRoom(roomCode) {
  $.ajax({
    type: "GET",
    url: '/readFEN/' + roomCode,
    dataType: 'text'
  }).done(function(data) {
    if (data != game.fen()) {
      board.position(data, false);
      game.load(data);
      nuocCo.play();
      if (game.game_over()) {
        hetTran.play();
        $('#game-over').removeClass('d-none').addClass('d-inline-block');
      }
    }
    updateStatus()
  });
}
function removeGreySquares () {
  $('#ban-co .square-2b8ce').removeClass('highlight');
}

function greySquare (square) {
  let $square = $('#ban-co .square-' + square);

  $square.addClass('highlight');
}

function onDragStart (source, piece) {
  // do not pick up pieces if the game is over
  if (game.game_over()) return false;

  // or if it's not that side's turn
  if ((game.turn() === 'r' && piece.search(/^b/) !== -1) ||
      (game.turn() === 'b' && piece.search(/^r/) !== -1)) {
    return false;
  }
  
  if ((board.orientation() == 'red' && game.turn() === 'b') || (board.orientation() == 'black' && game.turn() === 'r')) {
    return false;
  }
}

function onDrop (source, target) {
  removeGreySquares();

  // see if the move is legal
  let move = game.move({
    from: source,
    to: target
  });

  // illegal move
  if (move === null) return 'snapback';
  updateStatus()
}

function onMouseoverSquare (square, piece) {
  // get list of possible moves for this square
  let moves = game.moves({
    square: square,
    verbose: true
  });

  // exit if there are no moves available for this square
  if (moves.length === 0) return;

  // highlight the square they moused over
  greySquare(square);

  // highlight the possible squares for this piece
  for (let i = 0; i < moves.length; i++) {
    greySquare(moves[i].to);
  }
}

function onMouseoutSquare (square, piece) {
  removeGreySquares();
}

function onSnapEnd () {
  board.position(game.fen());
  $('#FEN').val(game.fen());
  nuocCo.play();
  writeTextFile('{{ $roomCode }}');
  if (game.game_over()) {
    hetTran.play();
    $('#game-over').removeClass('d-none').addClass('d-inline-block');
  }
}
function updateStatus () {
  var status = ''

  var moveColor = 'Đỏ'
  if (game.turn() === 'b') {
    moveColor = 'Đen'
  }

  // checkmate?
  if (game.in_checkmate()) {
    status = moveColor + ' bị chiếu bí'
  }

  // draw?
  else if (game.in_draw()) {
    status = 'Hòa'
  }

  // game still on
  else {
    status = 'Tới lượt ' + moveColor + ' đi'

    // check?
    if (game.in_check()) {
      status += ', ' + moveColor + ' đang bị chiếu'
    }
  }
  if (game.turn() === 'r') {
    $('#game-status').removeClass('black').addClass('red');
  } else if (game.turn() === 'b') {
    $('#game-status').removeClass('red').addClass('black');
  }
  $('#game-status').html(status);
  $('#header-status').html(': '+status);
  if (game.game_over()) {
    $('#header-status').html(': '+status+' - Hết trận');
  }
}

let config = {
  draggable: true,
  position: 'start',
  onDragStart: onDragStart,
  onDrop: onDrop,
  onMouseoutSquare: onMouseoutSquare,
  onMouseoverSquare: onMouseoverSquare,
  onSnapEnd: onSnapEnd,
  orientation: "black"
  //pieceTheme: '/static/img/xiangqipieces/traditional/{piece}.svg'

};
board = Xiangqiboard('ban-co', config);

updateStatus()

function updateRoom() {
  manipulateRoom('{{ $roomCode }}');
}
setInterval(updateRoom, 1000);
</script>
@endsection