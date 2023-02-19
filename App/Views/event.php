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
  <h5 class="upper btn"><a href="/Event/calendar" id="calendar-view">Calendar view</a></h5>
  <!-- Pagination -->
  <nav id='paginator'><?php require_once 'pagination.php';?></nav>

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
if (isset($events)) {
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
                  <input type="hidden" name="view" value="list">
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
                  <input type="hidden" name="view" value="list">
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
}?>
    </tbody>
  </table>
</div>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/alert.js"></script>
</body>

</html>
