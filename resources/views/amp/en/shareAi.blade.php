@extends('amp.en.layout.gamelayout')
@section('aboveContent')
<h3 class="text-center my-2">Playing with AI</h3>
<h4 class="text-center my-2">Board level: {{ $levelTxt }}</h4>
<div class="dropup mx-auto text-center">
  <button class="btn btn-lg btn-danger dropdown-toggle" type="button" id="levelDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fal fa-trophy"></i> Choose board level
  </button>
  <div class="dropdown-menu" aria-labelledby="levelDropdown">
    <a class="add-fen dropdown-item" href="{{ url('/amp/share-newbie') }}">Newbie</a>
    <a class="add-fen dropdown-item" href="{{ url('/amp/share-easy') }}">Easy</a>
    <a class="add-fen dropdown-item" href="{{ url('/amp/share-normal') }}">Normal</a>
    <a class="add-fen dropdown-item" href="{{ url('/amp/share-hard') }}">Hard</a>
  </div>
</div>
@endsection
@section('belowContent')
<p class="w-100 text-center mt-4">
  <a style="color: white" class="add-fen w-25 btn btn-dark btn-lg" href="{{ url('/amp/share') }}"><i class="fad fa-user"></i> Play with friend</a>
  <a style="color: white" id="reset" class="w-25 btn btn-danger btn-lg"><i class="fad fa-redo-alt"></i> Restart</a>
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
  if (game.in_checkmate() === true || game.in_draw() === true || piece.search(/^b/) !== -1) {
    return false;
  }
}

function minimaxRoot(depth, game, isMaximisingPlayer) {
  var newGameMoves = game.ugly_moves();
  var bestMove = -9999;
  var bestMoveFound;

  for(var i = 0; i < newGameMoves.length; i++) {
    var newGameMove = newGameMoves[i]
    game.ugly_move(newGameMove);
    var value = minimax(depth - 1, game, -10000, 10000, !isMaximisingPlayer);
    game.undo();
    if(value >= bestMove) {
      bestMove = value;
      bestMoveFound = newGameMove;
    }
  }
  return bestMoveFound;
}

function minimax(depth, game, alpha, beta, isMaximisingPlayer) {
  positionCount++;
  if (depth === 0) {
    return -evaluateBoard(game.board());
  }

  var newGameMoves = game.ugly_moves();

  if (isMaximisingPlayer) {
    var bestMove = -9999;
    for (var i = 0; i < newGameMoves.length; i++) {
      game.ugly_move(newGameMoves[i]);
      bestMove = Math.max(bestMove, minimax(depth - 1, game, alpha, beta, !isMaximisingPlayer));
      game.undo();
      alpha = Math.max(alpha, bestMove);
      if (beta <= alpha) {
        return bestMove;
      }
    }
    return bestMove;
  } else {
    var bestMove = 9999;
    for (var i = 0; i < newGameMoves.length; i++) {
      game.ugly_move(newGameMoves[i]);
      bestMove = Math.min(bestMove, minimax(depth - 1, game, alpha, beta, !isMaximisingPlayer));
      game.undo();
      beta = Math.min(beta, bestMove);
      if (beta <= alpha) {
        return bestMove;
      }
    }
    return bestMove;
  }
}

function evaluateBoard(board) {
  var totalEvaluation = 0;
  for (var i = 0; i < 10; i++) {
    for (var j = 0; j < 9; j++) {
      totalEvaluation = totalEvaluation + getPieceValue(board[i][j], i ,j);
    }
  }
  return totalEvaluation;
}

function reverseArray(array) {
  return array.slice().reverse();
}

var pEvalRed =
[
[10.0,  10.0,  10.0,  10.0,  10.0,  10.0,  10.0,  10.0, 10.0],
[10.0,  10.0,  11.0,  15.0,  20.0,  15.0,  11.0,  10.0, 10.0],
[8.0,  10.0,  11.0,  15.0,  15.0,  15.0,  11.0,  10.0, 8.0],
[7.0,  9.0,  10.0,  11.0,  11.0,  11.0,  10.0,  9.0, 7.0],
[6.0,  8.0,  9.0,  10.0,  10.0,  10.0,  9.0,  8.0, 6.0],
[1.0,  2.0,  3.0,  4.0,  4.0,  4.0,  3.0,  2.0, 1.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0]
];

var pEvalBlack = reverseArray(pEvalRed);

var rEvalRed =
[
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[-2.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, -2.0],

];

var rEvalBlack = reverseArray(rEvalRed);

var nEvalRed =
[
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  -2.0,  0.0,  0.0,  0.0,  0.0,  0.0,  -2.0, 0.0],

];

var nEvalBlack = reverseArray(nEvalRed);

var cEvalRed =
[
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],

];

var cEvalBlack = reverseArray(cEvalRed);

var bEvalRed =
[
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  2.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],

];

var bEvalBlack = reverseArray(bEvalRed);

var aEvalRed =
[
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  2.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],

];

var aEvalBlack = reverseArray(aEvalRed);

var kEvalRed =
[
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  2.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  2.0,  0.0,  0.0,  0.0, 0.0],
[0.0,  0.0,  0.0,  0.0,  2.0,  0.0,  0.0,  0.0, 0.0],

];

var kEvalBlack = reverseArray(kEvalRed);

function getPieceValue(piece, x, y) {
  if (piece === null) {
    return 0;
  }
  var getAbsoluteValue = function (piece, isRed, x ,y) {
    if (piece.type === 'p') { //PAWN
      return 15 + ( isRed ? pEvalRed[x][y] : pEvalBlack[x][y] );
    } else if (piece.type === 'r') { //ROOK/CHARIOT
      return 90 +( isRed ? rEvalRed[x][y] : rEvalBlack[x][y] );
    } else if (piece.type === 'c') { //CANNON
      return 45 +( isRed ? cEvalRed[x][y] : cEvalBlack[x][y] );
    } else if (piece.type === 'n') {
      return 40 +( isRed ? nEvalRed[x][y] : nEvalBlack[x][y] );
    } else if (piece.type === 'b') {
      return 20 +( isRed ? bEvalRed[x][y] : bEvalBlack[x][y] );
    } else if (piece.type === 'a') {
      return 20 +( isRed ? aEvalRed[x][y] : aEvalBlack[x][y] );
    } else if (piece.type === 'k') {
      return 900 +( isRed ? kEvalRed[x][y] : kEvalBlack[x][y] );
    }
    throw "Unknown piece type: " + piece.type;
  };

  var absoluteValue = getAbsoluteValue(piece, piece.color === 'r', x ,y);
  return piece.color === 'r' ? absoluteValue : -absoluteValue;
}

function makeBestMove() {
  var bestMove = getBestMove(game);
  game.ugly_move(bestMove);
  board.position(game.fen());
  nuocCo.play();
  updateStatus();
}

var positionCount;
function getBestMove(game) {
  updateStatus();
  positionCount = 0;
  var depth = {{ $level }};
  var bestMove = minimaxRoot(depth, game, true);
  return bestMove;
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
  //window.setTimeout(makeRandomMove, 250);
  window.setTimeout(makeBestMove, 250);
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
}
function updateStatus () {
  var status = ''

  var moveColor = 'Red'
  if (game.turn() === 'b') {
    moveColor = 'Black'
  }

  // checkmate?
  if (game.in_checkmate()) {
    status = moveColor + ' is in checkmate'
  }

  // draw?
  else if (game.in_draw()) {
    status = 'Drawn position'
  }

  // game still on
  else {
    status = moveColor + "'s turn to move"

    // check?
    if (game.in_check()) {
      status += ', ' + moveColor + ' is in check'
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
    hetTran.play();
    $('#header-status').html(': '+status+' - Game over');
    $('#game-over').removeClass('d-none').addClass('d-inline-block');
  }
}
let config = {
  draggable: true,
  position: '{{ $fen }}',
  onDragStart: onDragStart,
  onDrop: onDrop,
  onMouseoutSquare: onMouseoutSquare,
  onMouseoverSquare: onMouseoverSquare,
  onSnapEnd: onSnapEnd,
  //pieceTheme: '/static/img/xiangqipieces/traditional/{piece}.svg'
};
board = Xiangqiboard('ban-co', config);
game.load('{{ $fen }}');
updateStatus();
$(document).ready(function() {
  $('#FEN').val(game.fen());
  if (game.turn() === 'b') {
    makeBestMove();
  }
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