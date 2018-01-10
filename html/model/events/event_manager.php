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
    $this->status = $event['active'];
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
    $this->percentage = NULL;

    // Create a new event in the tracked_events table
    $sql = "SELECT * FROM `" . $this->name . "` 
    WHERE date >= current_timestamp - interval '" . $this->delay . "' day
    ORDER BY date DESC";

    $status = $this->query( $sql );

    if (isset($status[0]["date"])) {

      $this->status = TRUE;

      // Set the background image for binary objects
      $this->background = "/green.png";

    }

    // Cast the most recent value as an integer
    $value = (int) $status[0]["value"];

    // Find the percentage and round to nearest tenth
    $this->percentage_label = round ( ( $value / 7 ) * 100, 1);   

    // If the label is not 0, make them equal, otherwise default to 5%
    $this->percentage = ( $this->percentage_label == 0 ? 5 : $this->percentage_label );

   
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

  /* 
   * Build the select options for the editing page
   */

  public function create_type_view ( ) {

  }

}
