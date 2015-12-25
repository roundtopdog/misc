<?php
// Get ID
$room_id = filter_input(INPUT_POST, 'room_id', FILTER_VALIDATE_INT);

// Validate inputs
if ($room_id == null || $room_id == false) {
    $error = "Invalid Room ID.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'DELETE FROM rooms 
              WHERE roomID = :room_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':room_id', $room_id);
    $statement->execute();
    $statement->closeCursor();

    // Display the Category List page
    include('category_list.php');
}
?>