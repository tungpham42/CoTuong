@extends('amp.layout.gamelayout')
@section('aboveContent')
<h3 class="text-center my-2">Đang xếp bàn cờ thế</h3>
@endsection
@section('belowContent')
<p class="w-100 text-center mt-4">
  <a style="color: white" class="w-25 btn btn-dark btn-lg" href="{{ url('/amp') }}"><i class="fad fa-desktop"></i> Chơi với máy</a>
  <a style="color: white" id="clear" class="w-25 btn btn-danger btn-lg"><i class="fad fa-redo-alt"></i> Xếp lại</a>
</p>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js" integrity="sha512-OqcrADJLG261FZjar4Z6c4CfLqd861A3yPNMb+vRQ2JwzFT49WT4lozrh3bcKxHxtDTgNiqgYbEUStzvZQRfgQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.svg.min.js" integrity="sha512-cX+p7MRIKvgo59Ap3QDj2ymdc7XFFCEJ71X+nWPT+3UxNylm/ztqgDJTbko2atIo4jiozj0dUpYb+xfv1bCl8g==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.2/dist/FileSaver.min.js" integrity="sha256-u/J1Urdrk3nCYFefpoeTMgI5viU1ujCDu2fXXoSJjhg=" crossorigin="anonymous"></script>
<script>
const board = Xiangqiboard('ban-co', {
  draggable: true,
  dropOffBoard: 'trash',
  sparePieces: true,
  showNotation: true
});
$('#clear').on('click', board.clear);
$("#capture").on('click', function() {
  html2canvas(document.getElementsByClassName("board-1ef78")[0], {
    windowWidth: document.getElementsByClassName("board-1ef78")[0].scrollWidth,
    windowHeight: document.getElementsByClassName("board-1ef78")[0].scrollHeight,
    allowTaint: true,
    useCORS: true,
    onrendered: function(canvas) {
      var context = canvas.getContext('2d');

      // Draw the Watermark
      context.font = '25px cursive';
      context.globalCompositeOperation = 'multiply';
      context.fillStyle = '#444422';
      context.textAlign = 'center';
      context.textBaseline = 'middle';
      context.fillText('COTUONG.TOP', canvas.width / 2, canvas.height / 2);

      canvas.toBlob(function(blob) {
        saveAs(blob, "ban-co-{{ date('Y-m-d h:i:s A') }}.jpg"); 
      });
    }
  });
});
</script>
@endsection