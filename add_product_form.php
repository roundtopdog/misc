<?php
require('database.php');
$query = 'SELECT *
          FROM rooms
          ORDER BY roomID';
$statement = $db->prepare($query);
$statement->execute();
$rooms = $statement->fetchAll();
$statement->closeCursor();


$query = 'SELECT * FROM software
            order by softwareID';
$statement = $db->prepare($query);
$statement->execute();
$softwares = $statement->fetchAll();
$statement->closeCursor();

?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Will's abtech Software App</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Will's Abtech Software App</h1></header>

    <main>
        <h1>Add Software</h1>
        <form action="add_product.php" method="post"
              id="add_product_form">

            <label>Room:</label>
            <select name="room_id">
            <?php foreach ($rooms as $room) : ?>
                <option value="<?php echo $room['roomID']; ?>" >
                    <?php echo $room['roomName'], $room['roomID']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Software</label>
            <select name="software_name">
            <?php foreach($softwares as $software) : ?>
                <option value="<?php echo $software['softwareName']; ?>">
                    <?php echo $software['softwareName']; ?>

                    </option>
                <?php endforeach; ?>
                </select><br>
            <label>Description</label>
            <input type="textarea" name="software_description">

           

            <label>&nbsp;</label>
            <input type="submit" value="Add Product"><br>
        </form>
        <p><a href="index.php">View Room List</a></p>
    </main>
<!-- the footer -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Will's Abtech Software App</p>
    </footer>
</body>
</html>