<?php 

class widget extends db {



  /* 
   * @param $range string 
   * 
   * return boolean
   *
   * Check if an event has been completed in the last 24hrs
   *
   */

  public function daily_status (  ) {

    // Check if the particular widget has 
    $sql = "SELECT * FROM tracked_events WHERE `date` > ( NOW( ) - INTERVAL 1 MONTH ) AND active = 1 LIMIT 1";

    $this->daily_status = $db->query( $sql );

  }






}
