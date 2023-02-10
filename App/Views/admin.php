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
  <!-- Pagination -->
  <nav><?php require_once 'pagination.php';?></nav>

  <!-- Table -->
  <div id='events-table'>
    <table class="table table-striped table-condensed table-bordered table-rounded">
      <thead>
        <tr class="text-center">
          <th width="10%">ID</th>
          <th width="15%">Date</th>
          <th width="15%">Time</th>
          <th width="20%">Event</th>
          <th width="20%">Participants</th>
          <th width="20%">Edit/Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
if (isset($events)) {
  foreach ($events as $event) {
    $id = $event['id'];

    // Modal button (delete event)
    $delete = "<button type='button' id='delete-event' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteEventModal{$id}'>Delete</button>";
    // Modal button (edit event)
    $edit = "<button type='button' id='edit-event' class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#editEventModal{$id}'>Edit</button>";

    $date = date('d F Y', strtotime($event['date']));
    $time = date('G.i', strtotime($event['time']));

    date('d M Y') <= $date ? $value = $edit : $value = $delete;
    // table content
    echo "<tr><td>{$event['id']}</td>";
    echo "<td>{$date}</td>";
    echo "<td>{$time}</td>";
    echo "<td>{$event['name']}</td>";
    echo "<td>{$event['usernames']}</td>";
    echo "<td>{$value}</td></tr>";
    ?>
        <!-- Modal (edit event) -->
        <div class="modal fade" id="editEventModal<?php echo $id; ?>" tabindex="-1"
          aria-labelledby="editEventModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header custom-modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body custom-modal-body">
                <form method="POST" action="/Event/editEvent">
                  <div>
                    <input type="hidden" id="event-id" name="event-id" value="<?php echo $id; ?>">
                    <input type="hidden" name="event-prev"
                      value="<?php echo $event['name'], ",", $event['date'], ",", $event['time']; ?>">
                    <label for="event-name-new" class="form-label">Event name:</label><br>
                    <input required type="text" id="event-name-new" class="form-control" name="event-name-new"
                      value="<?php echo $event['name'];?>"><br>
                    <label for="event-date-new" class="form-label">Event date:</label><br>
                    <input required type="date" id="event-date-new" class="form-control" name="event-date-new"
                      value="<?php echo $event['date']; ?>"><br>
                    <label for="event-time-new" class="form-label">Event time:</label><br>
                    <input required type="time" id="event-time-new" class="form-control" name="event-time-new"
                      value="<?php echo $event['time']; ?>"><br>
                  </div>
                  <input type="submit" id="submit-edit-event" class="btn btn-primary" value="Edit event">
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- end of Modal -->
        <!-- Modal (delete event) -->
        <div class="modal fade" id="deleteEventModal<?php echo $id; ?>" tabindex="-1"
          aria-labelledby="deleteEventModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header custom-modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body custom-modal-body">
                <form method="POST" action="/Event/deleteEvent">
                  <div>
                    <input type="hidden" id="event-id" name="event-id" value="<?php echo $id; ?>">
                    <p>Are you sure?</p>
                  </div>
                  <input type="submit" id="submit-delete-event" class="btn btn-danger" value="Delete event">
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
  <!-- Modal button (add event)-->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
    Add event
  </button>
  <!-- Modal (add event) -->
  <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header custom-modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body custom-modal-body">
          <form method="POST" action="/Event/addEvent">
            <div>
              <label for="event-name" class="form-label">Event name:</label><br>
              <input type="text" class="form-control" name="event-name" required><br>
              <label for="event-date" class="form-label">Event date:</label><br>
              <input type="date" class="form-control" name="event-date" required><br>
              <label for="event-time" class="form-label">Event time:</label><br>
              <input type="time" class="form-control" name="event-time" required><br>
            </div>
            <input type="submit" class="btn btn-primary" value="Add event" id="new-event">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end of Modal -->
</div>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/alert.js"></script>
</body>

</html>
