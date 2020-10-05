<div class="container-fluid about px-0 font-weight-bold">
  <div class="container p-3 lead">
    <h2 class="text-center my-4">Guideline</h2>
    <div class="row font-weight-bold">
      <p>There are 4 options: Play with friend, Play with AI, Play in room, and Set up the board</p>
      <ol>
        <li><u>Play with friend:</u> Players press on the button <a target="_blank" href="{{ URL::to('/amp/play-with-friend') }}">"PLAY WITH FRIEND"</a> on the front page and practice with friend.</li>
        <li><u>Play with AI:</u> Players play directly on the front page. There are 4 levels: <a target="_blank" href="{{ url('/amp/newbie') }}">Newbie</a>, <a target="_blank" href="{{ url('/amp/easy') }}">Easy</a>, <a target="_blank" href="{{ url('/amp/normal') }}">Normal</a>, and <a target="_blank" href="{{ url('/amp/hard') }}">Hard</a>.</li>
        <li><u>Play in room:</u> Players press on the button "HOST A ROOM", host a new room with random Room code, and create a password for you and your friend, also capable of Inviting friend to play by sending the link. Players can also access the page <a target="_blank" href="{{ URL::to('/amp/rooms') }}">"Rooms"</a> to enter a hosted room. Players can choose Red Side or Black Side, Red moves first.</li>
        <li><u>Set up the board:</u> Players press on the link <a target="_blank" href="{{ url('/amp/set-up') }}">"Set Up"</a>. In this option, players can arrange the chess pieces and press "CAPTURE THE BOARD" to challenge friends.</li>
      </ol>
    </div>
  </div>
</div>