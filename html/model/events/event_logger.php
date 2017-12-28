<?php 

class event_logger extends db {

  /* 
   * @param $event string
   * @param $value string
   *
   * Log a tracked event in the database
   *
   */

  public function log_event ( $event, $value ) {

    // Create a new event in the event_log table
    $sql = "INSERT INTO  `event_log` (`table_name`) VALUES ( '" . $event . "')";
    
    $this->query( $sql );

    // Fetch the most recent ID
    $sql = "SELECT event_id FROM `event_log` ORDER BY event_id DESC LIMIT 1";
    
    $event_ids = $this->query( $sql );

    // Select the most recently entered ID
    $event_id = $event_ids[0]["event_id"];

    //Create a new event in the tracked_events table
    $sql = "INSERT INTO  `" . $event . "` (`id`, `date`, `value`, `active`) 
    VALUES ( " . $event_id . ", CURRENT_TIMESTAMP(), '" . $value . "', 1)";
    
    $this->query( $sql );

    #echo "Execute failed: (" . $this->con->errno . ") " . $this->con->error;

  }

  /* 
   * @param $current_name string
   * @param $field_to_update string
   * @param $value string
   *
   * Update an existing event by providing the current name and the column / value to update
   *
   */




}
