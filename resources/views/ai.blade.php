@extends('layout.gamelayout')
@section('aboveContent')
<h3 class="text-center my-2">Đang chơi với máy</h3>
@endsection
@section('belowContent')
<p class="w-100 text-center mt-4">
  <a class="w-25 btn btn-dark btn-lg" href="{{ url('/') }}"><i class="fad fa-user"></i> Chơi với nhau</a>
  <a id="reset" class="w-25 btn btn-danger btn-lg"><i class="fad fa-redo-alt"></i> Chơi lại</a>
</p>
<script>
let board = null;
let game = new Xiangqi();

function removeGreySquares () {
  $('#ban-co .square-2b8ce').removeClass('highlight');
}

function greySquare (square) {
  let $square = $('#ban-co .square-' + square);

  $square.addClass('highlight');
}

function onDragStart (source, piece, position, orientation) {
  // do not pick up pieces if the game is over
  if (game.game_over()) return false;

  // only pick up pieces for Red
  if (piece.search(/^b/) !== -1) return false;
}

function makeRandomMove () {
  let possibleMoves = game.moves();

  // game over
  if (possibleMoves.length === 0) return;

  let randomIdx = Math.floor(Math.random() * possibleMoves.length);
  game.move(possibleMoves[randomIdx]);
  board.position(game.fen());
  updateStatus();
}

function onDrop (source, target) {
  // see if the move is legal
  let move = game.move({
    from: source,
    to: target,
    promotion: 'q' // NOTE: always promote to a queen for example simplicity
  });

  // illegal move
  if (move === null) return 'snapback';
  updateStatus();
  // make random legal move for black
  window.setTimeout(makeRandomMove, 250);
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
// update the board position after the piece snap
// for castling, en passant, pawn promotion
function onSnapEnd () {
  board.position(game.fen());
  nuocCo.play();
  updateStatus();
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
}
let config = {
  draggable: true,
  position: 'start',
  onDragStart: onDragStart,
  onDrop: onDrop,
  onMouseoutSquare: onMouseoutSquare,
  onMouseoverSquare: onMouseoverSquare,
  onSnapEnd: onSnapEnd,
  //pieceTheme: '/static/img/xiangqipieces/traditional/{piece}.svg'
};
board = Xiangqiboard('ban-co', config);
updateStatus();
$(document).ready(function() {
  $('#FEN').val(game.fen());
});
$('#reset').on('click', function() {
  board.position('rnbakabnr/9/1c5c1/p1p1p1p1p/9/9/P1P1P1P1P/1C5C1/9/RNBAKABNR');
  game.load('rnbakabnr/9/1c5c1/p1p1p1p1p/9/9/P1P1P1P1P/1C5C1/9/RNBAKABNR r - - 0 1');
  $('#game-status').removeClass('black').addClass('red');
  updateStatus();
  $('#game-over').removeClass('d-inline-block').addClass('d-none');
});
</script>
@endsection