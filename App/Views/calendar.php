<?php require_once 'header.php';?>

<div class="container">

  <!-- Message alert -->
  <?php
if (isset($_GET['action-msg'])) {
  echo '<div class="alert alert-primary" id="msg-alert" role="alert">';
  echo $_GET['action-msg'];
  echo '</div>';
}?>
  <h5 class="upper btn"><a href="/Personal/index" id="personal">Personal page</a></h5>
  <h5 class="upper btn"><a href="/Event/index" id="list-view">List view</a></h5>
  <!-- Calendar -->
  <table class="table table-dark align-middle calendar-nav">
    <thead>
      <tr>
        <th width='15%'><a href="<?php echo $data['prev']; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a></th>
        <th width='70%'><a href="#"><?php echo $data['navData']; ?></a></th>
        <th width='15%'><a href="<?php echo $data['next']; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a></th>
      </tr>
    </thead>
  </table>

  <table class="table table-dark align-middle table-bordered calendar-body">
    <thead>
      <tr>
        <th width='14%'>Mon</th>
        <th width='14%'>Tue</th>
        <th width='14%'>Wed</th>
        <th width='14%'>Thu</th>
        <th width='14%'>Fri</th>
        <th width='14%'>Sat</th>
        <th width='14%'>Sun</th>
      </tr>
    </thead>
    <tbody>
      <?php
for ($i = 0; $i < $data['weeks']; $i++) {
  echo '<tr>';
  for ($j = 0; $j < 7; $j++) {

    $cell = $data['cells'][$i * 7 + $j];
    $cellDate = $data['links'][$i * 7 + $j];

    if (isset($_GET['month']) && isset($_GET['year'])) {
      $link = "/Event/calendar/?month={$_GET['month']}&year={$_GET['year']}&date={$cellDate}";
    } else {
      $link = "/Event/calendar/?date={$cellDate}";
    }

    $class = 'empty-day';
    if (date('Y-m-d') == date('Y-m-d', strtotime($cellDate))) {
      $class = 'this-day';
    }?>
      <td class="<?php echo $class; ?>" id="<?php echo $cellDate; ?>"><a class='single-day'
          href="<?php echo $link; ?>"><?php echo $cell; ?></a>
      </td>
      <?php }
  echo '</tr>';
}
?>
    </tbody>
  </table>

  <!-- Table -->
  <table class="table table-striped table-condensed table-bordered table-rounded">
    <thead>
      <tr class="text-center">
        <th width="20%">Date</th>
        <th width="20%">Time</th>
        <th width="30%">Event</th>
        <th width="30%">Subscription</th>
      </tr>
    </thead>
    <tbody>
      <?php

if (!empty($events)) {
  foreach ($events as $event) {
    $id = $event['id'];

    // Modal button (join event)
    $join = "<button type='button' id='join-event' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#joinEventModal{$id}' onclick='storeUrl()'>Join</button>";
    // Modal button (cancel event)
    $cancel = "<button type='button' id='cancel-event' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#cancelEventModal{$id}' onclick='storeUrl()'>Cancel</button>";

    $date = date('d F Y', strtotime($event['date']));
    $time = date('G.i', strtotime($event['time']));

    if (date('Y-m-d') < $event['date']) {
      if ($event['usernames']) {
        $users = explode(",", $event['usernames']);
        in_array($user, $users) ? $button = $cancel : $button = $join;
      } else {
        $button = $join;
      }
    } else {
      $button = "Subscription closed";
    }
    // table content
    echo "<tr><td>{$date}</td>";
    echo "<td>{$time}</td>";
    echo "<td>{$event['name']}</td>";
    echo "<td>{$button}</td></tr>";
    ?>
      <!-- Modal (join event) -->
      <div class="modal fade" id="joinEventModal<?php echo $id; ?>" tabindex="-1" aria-labelledby="joinEventModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header custom-modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom-modal-body">
              <form method="POST" action="/Event/join">
                <div>
                  <input type="hidden" id="event-id" name="event-id" value="<?php echo $id; ?>">
                  <input type="hidden" name="username" value="<?php echo $user; ?>">
                  <input type="hidden" name="view" value="calendar">
                  <p><b>Event:</b> <?php echo $event['name']; ?> </p>
                  <p><b>Date:</b> <?php echo $date; ?></p>
                  <p><b>Time:</b> <?php echo $time; ?></p>
                </div>
                <button type="submit" id="submit-join-event" class="btn btn-primary">Confirm joining</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end of Modal -->
      <!-- Modal (cancel event) -->
      <div class="modal fade" id="cancelEventModal<?php echo $id; ?>" tabindex="-1"
        aria-labelledby="cancelEventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header custom-modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom-modal-body">
              <form method="POST" action="/Event/cancel">
                <div>
                  <input type="hidden" id="event-id" name="event-id" value="<?php echo $id; ?>">
                  <input type="hidden" name="username" value="<?php echo $user; ?>">
                  <input type="hidden" name="view" value="calendar">
                  <p><b>Event:</b> <?php echo $event['name']; ?> </p>
                  <p><b>Date:</b> <?php echo $date; ?></p>
                  <p><b>Time:</b> <?php echo $time; ?></p>
                </div>
                <button type="submit" id="submit-cancel-event" class="btn btn-primary">Confirm cancellation</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end of Modal -->
      <?php
}
} else if (isset($_GET['date'])) {
  echo "<tr><td>" . date('d F Y', strtotime($_GET['date'])) . "</td>";
  echo "<td colspan='3'>No events on this day</td></tr>";
} else {
  echo "<tr><td>" . date('d-F-Y') . "</td>";
  echo "<td colspan='3'>No events on this day</td></tr>";
}

?>
    </tbody>
  </table>
</div>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/alert.js"></script>
</body>

</html>
