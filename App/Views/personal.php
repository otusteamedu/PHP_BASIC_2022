<?php require_once 'header.php';?>
<div class="container">
  <div class="upper btn"><a href="/Auth/logout?action=exit"><input type="submit" value="Log out" id="logout"></a></div>

  <h3>Hello, <?php echo $name; ?>!</h3>
  <!-- Message alert -->
  <?php
if (isset($_GET['action-msg'])) {
  echo '<div class="alert alert-primary alert-dismissible fade show" id="msg-alert" role="alert">';
  echo $_GET['action-msg'];
  echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}?>
  <h5><a href="/Event/index">Go to events</a></h5>
  <br>
  <h4>My events</h4>
  <br>
  <!-- Pagination -->
  <nav><?php require_once 'pagination.php';?></nav>

  <!-- Table -->
  <table class="table table-striped table-condensed table-bordered table-rounded">
    <thead>
      <tr class="text-center">
        <th width="25%">ID</th>
        <th width="25%">Date</th>
        <th width="25%">Time</th>
        <th width="25%">Event</th>
      </tr>
    </thead>
    <tbody>
      <?php

if (isset($events)) {
  foreach ($events as $event) {
    $date = date('d M Y', strtotime($event['date']));
    $time = date('G.i', strtotime($event['time']));
    echo "<tr><td>{$event['id']}</td>";
    echo "<td>{$date}</td>";
    echo "<td>{$time}</td>";
    echo "<td>{$event['name']}</td>";
    echo '</tr>';
  }
}?>
    </tbody>
  </table>
</div>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/alert.js"></script>
</body>

</html>
