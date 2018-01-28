<?php 

$db = new db($con);

// Fetch the binary tracked events
$sql = "SELECT * FROM tracked_events ORDER BY active DESC";
$db->tracked_events = $db->query( $sql );

?>

<hr>

  <table class="table table-striped">

    <thead>
      <tr>
        <th>Event Name</th>
        <th>Delay</th>
        <th>Type</th>
        <th>Date Added</th>
        <th>Status</th>
        <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>

      <?php 

        foreach ($db->tracked_events as $event) {

          $event['status'] = ($event['active'] == 1 ? "Active" : "Inactive");
          $event['status_color'] = ($event['active'] == 1 ? "success" : "danger");
          $edit_url = "?view=true&id=" . $event['id'];
          $disable_url = "?edit=true&fields=status&value=disabled&id=" . $event['id'];

          echo '<tr>';
          echo '<td><span class="lead">' . $event['name'] . '</span></td>';

          echo '<td>' . $event['reset'] . '</td>';
          echo '<td>' . $event['type'] . '</td>';
          echo '<td>' . $event['date_added'] . '</td>';
          echo '<td><a href="' . $edit_url . '"><button class="btn btn-md btn-' . $event['status_color'] . '">' . $event['status'] . '</button></a></td>';
          echo '<td><a href="' . $edit_url . '"><button class="btn btn-md btn-default btn-block">Edit</button></a></td>';
          echo '</tr>';
        }


      
      ?>

    </tbody>

  </table>

  <?php

      //   echo "<pre>";
      // var_dump($db->tracked_events);

  ?>