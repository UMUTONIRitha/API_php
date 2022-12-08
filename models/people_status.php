<?php 
  class People_status {
    // DB stuff
    private $conn;
    private $table = 'people_status';

    // Post Properties
   // public $id;
    public $people_number;
    public $people_name;
    public $covid_status;
    public $number_of_vaccination;
  

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

     // Get Posts
     public function read() {
        // Create query
        $query = 'SELECT people_number, 
                         people_name, 
                         covid_status,
                         number_of_vaccination
                                  FROM ' . $this->table . '
                                  
                                  ORDER BY
                                    people_number DESC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
}
  } 