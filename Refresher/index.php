<?php include "./config.php" ?>
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
            <h1>Home</h1>
        </header>
        <nav>
            <ul>
                <li>
                    <a href="./dashboard.php">Dashboard</a></li>
            </ul>
        </nav>
        <div class="pageTitle">
            <h1>View Records</h1>
        </div>
    </div>
        <div class="table">
            <div class="displayTable">
                <div class="tableCol">
                    <div class="id tableTitleRow">S.No</div>
                    <div class="name tableTitleRow">Name</div>
                    <div class="age tableTitleRow">Age</div>
                </div>
                <?php
                    $sql = "SELECT * FROM `dashboard`";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_array($result)) {
                            echo "
                            <div class=\"tableRows\">
                                <div class=\"id tableTitleRow\"><span id=\"id\">". $row["id"]."</span></div>
                                <div class=\"name tableTitleRow\"><span id=\"name\">". $row["name"]."</span></div>
                                <div class=\"age tableTitleRow\"><span id=\"age\">". $row["age"]."</span></div>
                            </div>
                        ";
                        }
                    } else {
                        echo "0 results";
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>