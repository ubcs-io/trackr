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

    // Create a new event in the tracked_events table
    $sql = "INSERT INTO  `" . $event . "` (`date`, `value`, `active`) 
    VALUES ( CURRENT_TIMESTAMP(), '" . $value . "', 1)";
    
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
