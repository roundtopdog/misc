<?php
// Get the product data
$room_id = filter_input(INPUT_POST, 'room_id', FILTER_VALIDATE_INT);
$software_name = filter_input(INPUT_POST, 'software_name');
$software_description   = filter_input(INPUT_POST, 'software_description');


// Validate inputs
if ($room_id == null || $room_id == false ||
        $software_name == null ) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'INSERT INTO software
                 ( softwareName, roomID, softwareDescription)
              VALUES
                 (:software_name, :room_id, :software_description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':software_name', $software_name);
    $statement->bindValue(':room_id', $room_id);
    $statement->bindValue(':software_description', $software_description);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
?>