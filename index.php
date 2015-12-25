<?php
require_once('database.php');

// Get room ID
if (!isset($room_id)) {
    $room_id = filter_input(INPUT_GET, 'room_id', 
            FILTER_VALIDATE_INT);
    if ($room_id == NULL || $room_id == FALSE) {
        $room_id = 1;
    }
}
// Get name for selected room
$queryRoom = 'SELECT * FROM rooms
                  WHERE roomID = :room_id';
$statement1 = $db->prepare($queryRoom);
$statement1->bindValue(':room_id', $room_id);
$statement1->execute();
$room = $statement1->fetch();
$room_name = $room['roomName'];
$statement1->closeCursor();

// Get all rooms
$query = 'SELECT * FROM rooms
                       ORDER BY roomID';
$statement = $db->prepare($query);
$statement->execute();
$rooms = $statement->fetchAll();
$statement->closeCursor();

// Get software for selected room
$querySoftware = 'SELECT * FROM software
                  WHERE roomID = :room_id
                  ORDER BY roomID';
$statement3 = $db->prepare($querySoftware);
$statement3->bindValue(':room_id', $room_id);
$statement3->execute();
$softwares = $statement3->fetchAll();
$statement3->closeCursor();

?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Will's abtech Software App</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Wills Abtech software app</h1></header>
<main>


    <aside>
        <!-- display a list of rooms -->
        <h2>Rooms</h2>
        <nav>
        <ul>
            <?php foreach ($rooms as $room) : ?>
            <li><a href=".?room_id=<?php echo $room['roomID']; ?>">
                    <?php echo $room['roomName']; ?><br>
                    <?php echo $room['roomDescription']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>          
    </aside>

    <section>
        <!-- display a table of products -->
        <h2><?php echo $room_name; ?></h2>
        <table>
            <tr>
            
                <th>Software Name</th>
                <th>Software Description</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($softwares as $software) : ?>
            <tr>
                <td><?php echo $software['softwareName']; ?></td>
                <td><?php echo $software['softwareDescription']; ?></td>
                <td><form action="delete_product.php" method="post">
                    <input type="hidden" name="software_id"
                           value="<?php echo $software['softwareID']; ?>">
                           
                    <input type="hidden" name="room_id"
                           value="<?php echo $software['roomID']; ?>"> 
                    <input type="submit" value="Delete"> 
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="add_product_form.php">Add Software</a></p>
        <p><a href="category_list.php">List Rooms</a></p>         
    </section>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Will's Abtech Software App</p>
</footer>
</body>
</html>