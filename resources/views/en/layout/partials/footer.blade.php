<footer>
  <div class="container">
    <div class="row p-5">
      <div class="col-12 col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-3">
        <p>Contact email</p>
        <a class="w-100" href="mailto:tung.42@gmail.com">tung.42@gmail.com</a>
        <p class="mt-3"><i class="fal fa-copyright"></i> Copyright <a target="_blank" href="https://tungpham42.info/">Tung Pham</a></p>
      </div>
      <div class="col-12 col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-3">
        <ul class="list-unstyled">
          <li>
            <a class="home" href="{{ url('/en') }}">Home</a>
          </li>
          <li>
            <a class="room" href="{{ url('/rooms') }}">Rooms</a>
          </li>
          <li>
            <a class="about" href="{{ url('/about-us') }}">About Us</a>
          </li>
          <li>
            <a class="contact" href="{{ url('/contact-us') }}">Contact Us</a>
          </li>
          <li>
            <a class="blog" href="{{ url('/blog') }}">Blog</a>
          </li>
          <li>
            <a class="lang" href="{{ $langUrl }}">Tiếng Việt</a>
          </li>
        </ul>
      </div>
      <div class="col-12 col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-3">
        <p>Find us on social media</p>
        <a class="w-100 mr-2 display-4" target="_blank" href="https://www.facebook.com/ChessRoomPage/"><i class="fab fa-facebook-square rounded"></i></a>
        <a class="w-100 mr-2 display-4" target="_blank" href="https://www.linkedin.com/company/chessroom/"><i class="fab fa-linkedin rounded"></i></a>
      </div>
      <div class="col-12 col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-3">
        <p>Verified with HTML5</p>
        <a title="Valid HTML 5" class="w-100 mr-2 display-4" target="_blank" href="https://validator.w3.org/check?uri=referer">
          <i class="fab fa-html5"></i>
        </a>
      </div>
    </div>
  </div>
</footer>
<div class="modal fade" id="AdBlockModal" tabindex="-1" role="dialog" aria-label="AdBlock" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content shadow-lg">
      <div class="modal-header">
        <h5 class="modal-title">AdBlock detected</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Sure, ad-blocking software does a great job at blocking ads, but it also blocks some useful and important features of our website. For the best possible site experience please take a moment to disable your AdBlocker.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
//  alert('AdBlock is not enabled');
}
// Function called if AdBlock is detected
function adBlockDetected() {
  $('#AdBlockModal').modal();
}

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
//  debug: true,
//  checkOnLoad: false,
//  resetOnEnd: false
//});
</script>
<a href="#0" class="cd-top js-cd-top rounded">Top</a>
<script src="{{ URL::to('/') }}/js/to-top.js"></script>