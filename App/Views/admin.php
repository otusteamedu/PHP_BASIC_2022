<?php require_once 'header.php';?>

<div><a href="/Auth/logout?action=exit"><input type="submit" value="Log out" id="logout"></a></div>

<h1>Hello, <?php echo $name; ?>!</h1>

<h4><a href="/Event/index">Go to events</a></h4>

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
      <th width="20%">Topic</th>
      <th width="20%">Participants</th>
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
    echo "<td>{$event['usernames']}</td>";
    echo '</tr>';
  }
}?>
  </tbody>
</table>
<h5>Add new event</h5>
<form method="POST" action="/Event/addEvent">
  <div>
    <label for="event-type">Event type:</label><br>
    <input type="text" name="event-type" required><br>
    <label for="event-topic">Event topic:</label><br>
    <input type="text" name="event-topic" required><br>
    <label for="event-date">Event date:</label><br>
    <input type="date" name="event-date" required><br>
    <label for="event-time">Event time:</label><br>
    <input type="time" name="event-time" required><br>
  </div>
  <input type="submit" value="Send">
</form>

</body>

</html>