<footer>
  <div class="container">
    <div class="row p-5">
      <div class="col-12 col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-3">
        <p>Email liên hệ</p>
        <a class="w-100" href="mailto:tung.42@gmail.com">tung.42@gmail.com</a>
        <p class="mt-3"><i class="fal fa-copyright"></i> Bản quyền <a target="_blank" href="https://tungpham42.info/">Phạm Tùng</a></p>
      </div>
      <div class="col-12 col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-3">
        <ul class="list-unstyled">
          <li>
            <a class="home" href="{{ url('/') }}">Trang chủ</a>
          </li>
          <li>
            <a class="room" href="{{ url('/danh-sach-phong') }}">Danh sách phòng</a>
          </li>
          <li>
            <a class="about" href="{{ url('/gioi-thieu') }}">Giới thiệu</a>
          </li>
          <li>
            <a class="lang" href="{{ url($langUrl) }}">English</a>
          </li>
          <li>
            <a target="_blank" class="buy" href="https://www.codester.com/items/24223/xiangqi-game-with-ai-and-room-hosting?ref=tungpham"><i class="fal fa-usd-circle"></i> MUA</a>
          </li>
        </ul>
      </div>
      <div class="col-12 col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-3">
        <p>Chúng tôi trên mạng xã hội</p>
        <a class="w-100 mr-2 display-4" target="_blank" href="https://www.facebook.com/CoTuongPage/"><i class="fab fa-facebook-square rounded"></i></a>
        <a class="w-100 mr-2 display-4" target="_blank" href="https://www.linkedin.com/company/cotuong/"><i class="fab fa-linkedin rounded"></i></a>
      </div>
      <div class="col-12 col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-3">
        <p>Đã xác thực HTML5</p>
        <a title="Valid HTML 5" class="w-100 mr-2 display-4" target="_blank" href="https://validator.w3.org/check?uri=referer">
          <i class="fab fa-html5"></i>
        </a>
      </div>
    </div>
  </div>
</footer>
<div class="modal fade" id="AdBlockModal" tabindex="-1" role="dialog" aria-label="AdBlock" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow-lg">
      <div class="modal-header">
        <h5 class="modal-title">Phát hiện AdBlock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Chắc chắn, phần mềm chặn quảng cáo thực hiện công việc tuyệt vời trong việc chặn quảng cáo, nhưng nó cũng chặn một số tính năng hữu ích và quan trọng của trang web của chúng tôi. Để có trải nghiệm trang web tốt nhất có thể, vui lòng dành chút thời gian để tắt AdBlocker của bạn.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="AdSenseModal" tabindex="-1" role="dialog" aria-label="AdSense" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow-lg">
      <div class="modal-header">
        <h5 class="modal-title">Quảng cáo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <a target="_blank" href="https://nhanhoa.com/may-chu/may-chu-ao-vps.html?aff=5305"><img src="https://nhanhoa.com/uploads/aff/vps/300x250.png" title="Đăng ký Cloud VPS"></a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
<script>
$('.menu-toggle').on('click', function(){
  if ($(this).hasClass('open')) {
    $(this).removeClass('open').removeClass('close').addClass('close');
  } else if ($(this).hasClass('close')) {
    $(this).removeClass('close').removeClass('open').addClass('open');
  }
});
// Function called if AdBlock is not detected
function adBlockNotDetected() {
//	alert('AdBlock is not enabled');
}
// Function called if AdBlock is detected
function adBlockDetected() {
	$('#AdBlockModal').modal();
}
$('#AdSenseModal').on('hide.bs.modal', function(e) {
  window.location.href = $('#tao-phong').attr('data-url');
})
// Recommended audit because AdBlock lock the file 'blockadblock.js' 
// If the file is not called, the variable does not exist 'blockAdBlock'
// This means that AdBlock is present
if(typeof blockAdBlock === 'undefined') {
	adBlockDetected();
} else {
	blockAdBlock.onDetected(adBlockDetected);
	blockAdBlock.onNotDetected(adBlockNotDetected);
	// and|or
	blockAdBlock.on(true, adBlockDetected);
	blockAdBlock.on(false, adBlockNotDetected);
	// and|or
	blockAdBlock.on(true, adBlockDetected).onNotDetected(adBlockNotDetected);
}

// Change the options
//blockAdBlock.setOption('checkOnLoad', false);
// and|or
//blockAdBlock.setOption({
//	debug: true,
//	checkOnLoad: false,
//	resetOnEnd: false
//});
</script>
<a href="#0" class="cd-top js-cd-top rounded">Top</a>
<script src="{{ URL::to('/') }}/js/to-top.js"></script>