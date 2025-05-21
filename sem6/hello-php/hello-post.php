<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['name']) && $_POST['name'] !== '') {
                $name = htmlspecialchars($_POST['name']);
                echo "Hello, $name!";
            } else {
                echo "Hello World";
            }
        }
    ?>
    <form method="POST">
        <div>
            <label for="name">Name: </label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>

</body>
</html>