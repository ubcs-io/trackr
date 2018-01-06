<?php 

class recent_events extends db {



  /* 
   * 
   * return boolean
   *
   * Fetch the last 5 events
   *
   */

  public function fetch_recent_5 (  ) {

    // Find the five most recent events from the event_log table
    $sql = "SELECT * FROM event_log ORDER BY event_id DESC limit 5";

    $this->top_five = $this->query( $sql );

    // Fetch the details for each of those events
    foreach ($this->top_five as $event) {

      $sql = "SELECT * FROM `" . $event['table_name'] . "` WHERE id = " . $event['event_id'];

      $event_details = $this->query( $sql );

      // Add the table they came from to the array
      $event_details[0]['table_name'] = $event['table_name'];

      // Set it as the events property
      $this->events[] = $event_details[0];

    }

  }





}
