<div class="container_message {{ session('message')['class'] }}">
  <span id="close_message"></span>
  <div class="content">
    <header class="cont_title">
      <p>{{ session('message')['title'] }}</p>
    </header>
    <div class="message_description">
      <p>{{ session('message')['content'] }}</p>
    </div>
  </div>
</div>