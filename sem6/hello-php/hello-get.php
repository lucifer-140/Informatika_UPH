<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['name']) && $_GET['name'] !== '') {
            $name = htmlspecialchars($_GET['name']);
            echo "Hello, $name!";
        } else {
            echo "Hello World";
        }
    ?>
    <form method="GET">
        <div>
            <label>Name: </label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>

</body>
</html>