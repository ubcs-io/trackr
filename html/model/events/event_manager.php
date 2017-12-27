<?php 

class event_manager extends db {

  /*
   *
   */

 public function set_event_details ( $id ) {

    $this->id = $id;

    // Fetch the other event values
    $sql = "SELECT * FROM tracked_events WHERE id = '" . $this->id . "'";

    $event_details = $this->query( $sql );
    $event = $event_details[0];

    $this->name = $event['name'];
    $this->type = $event['type'];
    $this->delay = $event['reset'];
    $this->date_added = $event['date_added'];
    $this->description = $event['description'];
  
  }

  /* 
   * @param $event_name string
   * @param $type string
   * @param $description string
   * @param $image_url string
   *
   * Create a new event in the table
   *
   */

  public function add_event ( $event_name, $type, $description, $image_url = NULL ) {

    $description = $this->con->real_escape_string($description);

    // Create a new event in the tracked_events table
    $sql = "INSERT INTO  tracked_events (`date_added`, `name`, `type`, `description`, `image_url`, `active`) 
    VALUES ( CURRENT_TIMESTAMP(), '" . $event_name . "', '" . $type . "', '" . $description . "', '" . $image_url . "', 1)";
    
    $this->query( $sql );

  }

  /* 
   * @param $event_id string
   * @param $field_to_update string
   * @param $value string
   *
   * Update an existing event by providing the current name and the column / value to update
   *
   */

  public function update_event ( $event_id, $field_to_update, $value ) {

    // Create a new event in the tracked_events table
    $sql = "UPDATE tracked_events SET `" . $field_to_update . "` = '" . $value . "' WHERE id = '" . $event_id . "'";

    $this->query( $sql );

  }


  /* 
   * @param $current_name string
   * @param $field_to_update string
   * @param $value string
   *
   * Update an existing event by providing the current name and the column / value to update
   *
   */

// SELECT * FROM Meditation WHERE date >= current_timestamp - interval '7' day;
// SELECT * FROM Meditation WHERE date >= current_timestamp - interval '1' minute;

  public function event_status (  ) {

    // Default to the 
    $this->background = "/red.png";
    $this->status = FALSE;

    // Create a new event in the tracked_events table
    $sql = "SELECT COUNT(*) FROM `" . $this->name . "` 
    WHERE date >= current_timestamp - interval '" . $this->delay . "' day";

    $status = $this->query( $sql );

    if ($status[0]["COUNT(*)"] > 0) {

      $this->status = TRUE;
      $this->background = "/green.png";

    }
   
  }



  /* 
   * Fetch the tracked events and create a table for them if they don't exist
   */

  public function build_tables ( ) {

    // Pull the event names
    $sql = "SELECT name FROM tracked_events WHERE active = 1";

    $tracked_events = $this->query( $sql );

    // Iterate over the tracked events
    foreach ($tracked_events as $event) {

      // Create a new table for each event
      $sql = "CREATE TABLE IF NOT EXISTS `" . $event['name'] . "` (
       `id` int(11) NOT NULL AUTO_INCREMENT,
        `date` datetime NOT NULL,
        `value` int(11) NOT NULL,
        `active` int(11) NOT NULL,
        UNIQUE KEY `id` (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8";

      $this->query( $sql );

    }

  }


}
