<?php include "./config.php"?>
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
                <h1>Insert New Record</h1>
            </header>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li>|</li>
                    <li><a href="dashboard.php">Dashboard</a></li>
                </ul>
            </nav>
        </div>
        <form action="insert.php" method="post">
            <input type="text" name="Name" id="Name" placeholder="Enter Name">
            <input type="number" name="Age" id="Age" placeholder="Enter Age">
            <input type="submit" name="submit" value="submit">
            <?php
                if (isset($_POST['submit']))
                {
                    $studentName = $_POST['Name'];
                    $age = $_POST['Age'];
                    insertIntoDb($conn, $studentName, $age);
                }
                function insertIntoDb($conn, $studentName, $age)
                {
                    $sql = "INSERT INTO dashboard (name, age) VALUES (\"$studentName\",\"$age\");";
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