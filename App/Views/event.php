<?php require_once 'header.php';?>
<div class="container">
  <div>
    <h5 class="upper"><a href="/Personal/index">Return to personal page</a></h5>
  </div>
  <br>
  <!-- Pagination -->
  <nav><?php require_once 'pagination.php';?></nav>

  <!-- Table -->
  <table class="table table-striped table-condensed table-bordered table-rounded">
    <thead>
      <tr class="text-center">
        <th width="10%">ID</th>
        <th width="20%">Date</th>
        <th width="20%">Time</th>
        <th width="30%">Event</th>
        <th width="20%">Subscription</th>
      </tr>
    </thead>
    <tbody>
      <?php

if (isset($events)) {

  foreach ($events as $event) {
    $join = "<a href=" . "/Event/join?action=join&event_id={$event['id']}&user={$user}" . "><input type='submit' value='join' class='btn' id='join'></a>";
    $cancel = "<a href=" . "/Event/cancel?action=cancel&event_id={$event['id']}&user={$user}" . "><input type='submit' value='cancel' class='btn' id='cancel'></a>";
    $date = date('d M Y', strtotime($event['date']));
    $time = date('G.i', strtotime($event['time']));
    if (date('Y-m-d') <= $event['date']) {
      if ($event['usernames']) {
        $users = explode(",", $event['usernames']);
        in_array($user, $users) ? $link = $cancel : $link = $join;
      } else {
        $link = $join;
      }
    } else {
      $link = "Subscription closed";
    }
    echo "<tr><td>{$event['id']}</td>";
    echo "<td>{$date}</td>";
    echo "<td>{$time}</td>";
    echo "<td>{$event['name']}</td>";
    echo "<td>{$link}</td>";
    echo '</tr>';
  }
}?>
    </tbody>
  </table>
</div>
</body>

</html>
