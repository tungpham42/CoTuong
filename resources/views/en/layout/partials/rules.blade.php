<div class="container-fluid about px-0 font-weight-bold">
  <div class="container p-5 lead">
    <h2 class="text-center my-4">Guideline</h2>
    <div class="row font-weight-bold">
      <p>There are 3 options: Play with friend, Play with AI and Play in room</p>
      <ol>
        <li><u>Play with friend:</u> Users play directly on the front page.</li>
        <li><u>Play with AI:</u> Users press on the button <a target="_blank" href="{{ URL::to('/en') }}">"PLAY WITH AI"</a> on the front page and practice with AI. There are 4 levels: <a target="_blank" href="{{ url('/newbie') }}">Newbie</a>, <a target="_blank" href="{{ url('/easy') }}">Easy</a>, <a target="_blank" href="{{ url('/normal') }}">Normal</a>, and <a target="_blank" href="{{ url('/hard') }}">Hard</a>.</li>
        <li><u>Play in room:</u> Users press on the button "HOST A ROOM", host a new room with random Room code, and create a password for you and your friend, also capable of Inviting friend to play by sending the link. Users can also access the page <a target="_blank" href="{{ URL::to('/rooms') }}">"Rooms"</a> to enter a hosted room. Users can choose Red Side or Black Side, Red moves first.</li>
      </ol>
    </div>
  </div>
</div>