<?php
require_once('database.php');

// Get IDs
$software_id = filter_input(INPUT_POST, 'software_id', FILTER_VALIDATE_INT);
$room_id = filter_input(INPUT_POST, 'room_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($software_id != false && $room_id != false) {
    $query = 'DELETE FROM software
              WHERE softwareID = :software_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':software_id', $software_id);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the Product List page
include('index.php');