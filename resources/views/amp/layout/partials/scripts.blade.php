<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js" integrity="sha256-U1mGlmAJ9EtQbmI39+qR12ar8kk5Zm2zskTIUmwCS88=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blockadblock/3.2.1/blockadblock.min.js" integrity="sha256-3zU5Lr4nIt3K/BgGOQMduajtZcPV9elIM/23RDXRp3o=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha256-tSRROoGfGWTveRpDHFiWVz+UXt+xKNe90wwGn25lpw8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" integrity="sha256-0rguYS0qgS6L4qVzANq4kjxPLtvnp5nn2nB5G1lWRv4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js" integrity="sha256-sfG8c9ILUB8EXQ5muswfjZsKICbRIJUG/kBogvvV5sY=" crossorigin="anonymous"></script>
<script src="https://cotuong.r.worldssl.net/js/scripts.js"></script>
<script src="https://cotuong.r.worldssl.net/js/manipulation.js"></script>
<script src="https://cotuong.r.worldssl.net/js/xiangqiboard.js?v=6"></script>
<script src="https://cotuong.r.worldssl.net/js/xiangqi.js?v=33"></script>
<script>
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
var locale = {
  OK: 'Đồng ý',
  CONFIRM: 'Chấp nhận',
  CANCEL: 'Hủy'
};
bootbox.addLocale('vi', locale);

$('#tao-phong').on('click', function() {
  bootbox.prompt({
    title: "Mời tạo mật khẩu cho Phòng:",
    required: true,
    locale: 'vi',
    centerVertical: true,
    buttons: {
      confirm: {
        className: 'btn-success'
      }
    },
    callback: function(password){
      $.ajax({
        type: "POST",
        url: '{{ URL::to('/') }}/createRoom',
        data: {
          'ma-phong': $('#tao-phong').attr('data-phong'),
          'FEN': 'rnbakabnr/9/1c5c1/p1p1p1p1p/9/9/P1P1P1P1P/1C5C1/9/RNBAKABNR r - - 0 1',
          'pass': password
        },
        dataType: 'text'
      }).done(function() {
        $('#AdSenseModal').modal('show');
      });
    }
  });
});
$('#copy-url-red').on('click', function() {
  copyToClipboard('#url-red');
  selectText('#url-red')
});
$('#copy-url-black').on('click', function() {
  copyToClipboard('#url-black');
  selectText('#url-black')
});
const nuocCo = document.getElementById("nuoc-co");
const hetTran = document.getElementById("het-tran");

$(function () {
  if (!Modernizr.touch) {
    $('[data-toggle="tooltip"]').tooltip();
    document.addEventListener('contextmenu', function(e) {
      e.preventDefault();
    });
  }
});

var is_iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
if (is_iOS) {
  document.addEventListener('touchstart touchend touchcancel touchmove', event => {
    event.preventDefault();
  }, {passive: false});
}
window.onload = () => {
  'use strict';
  if ('serviceWorker' in navigator) {
    console.log("Will the service worker register?");
    navigator.serviceWorker
    .register('{{ URL::to('/') }}/serviceWorker.js')
    .then(function(reg) {
      console.log("Yes, it did.");
    }).catch(function(err) {
      console.log("No it didn't. This happened:", err)
    });
  }
}
</script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e65ab6b19fb59d9"></script>