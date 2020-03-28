<?php
    include "config.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="top">
            <header>
                <h1>Edit Record</h1>
            </header>
            <nav>
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li>|</li>
                    <li><a href="./dashboard.php">Dashboard</a></li>
                </ul>
            </nav>
        </div>
        <form method="POST">
            <input type="text" name="Name" id="Name" placeholder="Enter Name">
            <input type="text" name="Age" id="Age" placeholder="Enter Age">
            <input value="Update" name="update" type="submit">
            <?php
                $uri = $_SERVER['REQUEST_URI'];
                $arr = str_split($uri);
                $studentid = "";
                for ($i = 26; $i < sizeof(($arr)) -1; $i++)
                {
                    $studentid = $studentid . $arr[$i];
                }
                if (isset($_POST['update']))
                {
                    $studentName = $_POST['Name'];
                    $age = $_POST['Age'];
                    updateDatabase($conn, $studentName, $age, $studentid);
                }
                function updateDatabase($conn, $studentName, $age, $studentid)
                {
                    $sql = "UPDATE dashboard SET name = \"$studentName\", age = \"$age\" WHERE `dashboard`.`id` = \"$studentid\";";
                    // echo $sql;
                    if ($conn->query($sql) === TRUE) {
                        // echo "Record updated successfully";
                        header("Location: index.php");
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                }
            ?>
        </form>
    </div>
</body>

</html>