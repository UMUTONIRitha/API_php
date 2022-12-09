<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/people_status.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $people = new People_status($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to UPDATE
 $people->people_number = $data->people_number;

  $people->people_name = $data->people_name;
  $people->covid_status = $data->covid_status;
  $people->number_of_vaccination = $data->number_of_vaccination;
  //echo json_encode(array('message' => $people->update()));
  // Update post
  if($people->update()) {
    echo json_encode(
      array('message' => 'people Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'people not updated')
    );
  }