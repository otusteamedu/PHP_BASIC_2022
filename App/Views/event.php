<?php require_once 'header.php';?>
<div>
  <h4 class="upper"><a href="/Personal/index">Return to personal page</a></h4>
</div>

<br>
<nav><?php echo $pagination; ?></nav>
<?php
if (isset($error)): ?>
<h2 style="color: red"><?php echo $error; ?></h2>
<?php endif;
if (isset($message)): ?>
<h2><?php echo $message; ?></h2>
<?php endif;?>
<table class="table table-striped table-condensed table-bordered table-rounded">
  <thead>
    <tr class="text-center">
      <th width="20%">Date</th>
      <th width="20%">Time</th>
      <th width="20%">Type</th>
      <th width="25%">Topic</th>
      <th width="15%">Subscription</th>
    </tr>
  </thead>
  <tbody>
    <?php

if (isset($events)) {
  foreach ($events as $event) {
    $date = date('d M Y', strtotime($event['date']));
    $time = date('G.i', strtotime($event['time']));
    echo "<tr><td>{$date}</td>";
    echo "<td>{$time}</td>";
    echo "<td>{$event['type']}</td>";
    echo "<td>{$event['topic']}</td>";
    echo '</tr>';
  }
}?>
  </tbody>
</table>

</body>

</html>