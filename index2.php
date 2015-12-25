<?php
require_once('database.php');

// get room id 
if(!isset($room_id)){
    $room_id = filter_input(INPUT_GET, 'room_id', FILTER_VALIDATE_INT);
    if($room_id == null || $room_id == false ){
        $room_id = 1;
    }// end if
}//end if

// get name for the selected room 
$queryRoom = 'Select * from rooms where roomID = :room_id';
$statement1 = $db->prepare($queryRoom);
$statement1->bindValue(':room_id', $room_id);
$statement1->execute();
$room = $statement1->fetch();
$room_name = $room['roomName'];
$statement1->closeCursor();

// get all rooms 
$query = 'select * from rooms order by roomID';
$statement = $db->prepare($query);
$statement->execute();
$rooms = $statement->fetchAll();
$statement->closeCursor();

// get software for selected rooms
$querySoftware = 'select * from software where roomID = :room_id order by roomID';
$statement3 = $db->prepare($querySoftware);
$statement3->bindValue(':room_id', $room_id);
$statement3->execute();
$softwares = $statement3->fetchAll();
$statement3->closeCursor();

?>
<!doctype html>
<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Will's Software App;</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header><h1>Wills Software App</h1></header>
    <main>
        <aside>
        <!-- display a list of rooms -->
        <h2>Rooms</h2>
        


</body>
</html>