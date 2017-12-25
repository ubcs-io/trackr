<?php 

class event_manager extends db {

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

    // Create a new event in the tracked_events table
    $sql = "INSERT INTO  tracked_events (`date_added`, `name`, `type`, `description`, `image_url`, `active`) 
    VALUES ( CURRENT_TIMESTAMP(), '" . $event_name . "', '" . $type . "', '" . $description . "', '" . $image_url . "', 1)";
    
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

  public function update_event ( $current_name, $field_to_update, $value ) {

    // Create a new event in the tracked_events table
    $sql = "UPDATE tracked_events SET `" . $field_to_update . "` = '" . $value . "' WHERE id = '" . $current_name . "'";

    $this->query( $sql );

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
      ) ENGINE=MyISAM DEFAULT CHARSET=latin1";

      $this->query( $sql );

    }

  }


}
