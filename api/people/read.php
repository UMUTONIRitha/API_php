<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/people_status.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $people = new People_status($db);

  // Blog post query
  $result = $people->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any peoples
  if($num > 0) {
    // People array
    $peoples_arr = array();
    $peoples_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $people_item = array(
       // 'id' => $id,
        'people_number' => $people_number,
        'people_name' => $people_name,
      //  'people_name' => html_entity_decode($people_name),
        'covid_status' => $covid_status,
        'number_of_vaccination' => $number_of_vaccination,
        
      );

      // Push to "data"
      array_push($peoples_arr, $people_item);
      // array_push($peoples_arr['data'], $people_item);
    }

    // Turn to JSON & output
    echo json_encode($peoples_arr);

  } else {
    // No Peoples
    echo json_encode(
      array('message' => 'No Peoples Found')
    );
  }
