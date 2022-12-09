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
}// Create Category
public function create() {
  // Create Query
  $query = 'INSERT INTO ' .
    $this->table . '
  SET
    people_name = :people_name,
    covid_status = :covid_status,
    number_of_vaccination = :number_of_vaccination';

// Prepare Statement
$stmt = $this->conn->prepare($query);

// Clean data
$this->people_name = htmlspecialchars(strip_tags($this->people_name));
$this->covid_status = htmlspecialchars(strip_tags($this->covid_status));
$this->number_of_vaccination = htmlspecialchars(strip_tags($this->number_of_vaccination));

// Bind data
$stmt-> bindParam(':people_name', $this->people_name);
$stmt-> bindParam(':covid_status', $this->covid_status);
$stmt-> bindParam(':number_of_vaccination', $this->number_of_vaccination);

// Execute query
if($stmt->execute()) {
  return true;
}

// Print error if something goes wrong
printf("Error: $s.\n", $stmt->error);

return false;
}

// Update Category
public function update() {
  // Create Query
  $query = 'UPDATE ' .
    $this->table . '
  SET
    people_name = :people_name,
    covid_status = :covid_status,
    number_of_vaccination = :number_of_vaccination

    WHERE
    people_number = :people_number';

// Prepare Statement
$stmt = $this->conn->prepare($query);

// Clean data
$this->people_name = htmlspecialchars(strip_tags($this->people_name));
$this->covid_status = htmlspecialchars(strip_tags($this->covid_status));
$this->number_of_vaccination = htmlspecialchars(strip_tags($this->number_of_vaccination));
$this->people_number = intval( htmlspecialchars(strip_tags($this->people_number)));

// Bind data
$stmt-> bindParam(':people_name', $this->people_name);
$stmt-> bindParam(':covid_status', $this->covid_status);
$stmt-> bindParam(':number_of_vaccination', $this->number_of_vaccination);
$stmt-> bindParam(':people_number', $this->people_number);

// Execute query
if($stmt->execute()) {
  return true;
}

// Print error if something goes wrong
printf("Error: $s.\n", $stmt->error);

return false;
}

// Delete Category
public function delete() {
  // Create query
  $query = 'DELETE FROM ' . $this->table . '';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // clean data
  $this->people_number = htmlspecialchars(strip_tags($this->people_number));

  // Bind Data
  //$stmt-> bindParam(':people_number', $this->people_number);
  $stmt-> bindParam(':covid_status', $this->covid_status);
  $stmt-> bindParam(':number_of_vaccination', $this->number_of_vaccination);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: $s.\n", $stmt->error);

  return false;
  }

  } 