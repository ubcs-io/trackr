<?php 

include ( "config.php");

$con = new mysqli($server, $username, $password, $dbname);

class db {

  /*
   *
   */

 public function __construct($con) {

    $this->con = $con;
  
  }

  /* 
   * @param $sql string
   *
   * return $db_value mixed
   *
   */

  public function query ( $sql ) {

    $results_array = NULL;

    $query_result = $this->con->query( $sql . ";" );

    // var_dump($sql);
    // echo "Execute failed: (" . $this->con->errno . ") " . $this->con->error;

    while ($row = mysqli_fetch_assoc($query_result)) {

      $results_array[] = $row;

    }

    return $results_array;

  }

}
