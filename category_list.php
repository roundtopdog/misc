<?php
require_once('database.php');

// Get all categories
$query = 'SELECT * FROM rooms
                       ORDER BY roomID';
$statement = $db->prepare($query);
$statement->execute();
$rooms = $statement->fetchAll();
$statement->closeCursor();
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
<header><h1>Will's Abtech Software App</h1></header>
<main>
    <h1>Room List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>        
        <?php foreach ($rooms as $room) : ?>
        <tr>
            <td><?php echo $room['roomName']; ?></td>
            <td>
                <form action="delete_category.php" method="post">
                    <input type="hidden" name="room_id"
                           value="<?php echo $room['roomID']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>    
    </table>

    <h2 class="margin_top_increase">Add Room</h2>
    <form action="add_category.php" method="post"
          id="add_category_form">

        <label>Room Name:</label>
        <input type="text" name="name" />
        <input id="add_category_button" type="submit" value="Add"/>
    </form>
    
    <p><a href="index.php">List Software</a></p>

</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Will's Abtech Software App</p>
</footer>
</body>
</html>