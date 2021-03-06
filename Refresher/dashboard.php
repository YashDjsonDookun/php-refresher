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
                <h1>Dashboard</h1>
            </header>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li>|</li>
                    <li><a href="insert.php">Insert new records</a></li>
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
                    <div class="edit tableTitleRow">Edit</div>
                    <div class="delete tableTitleRow">Delete</div>
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
                                <div class=\"tableTitleRow\">
                                <form method=\"GET\" action=\"edit.php\">
                                    <button class=\"btnEdit\" type=\"submit\" id=\"studID".$row["id"] ."\" name=\"studID".$row["id"] ."\">Edit</button>
                                    <input type=\"hidden\" value=\"studID".$row["id"] ."\">
                                </form>
                                </div>
                                <div class=\"tableTitleRow\">
                                    <form method=\"GET\" action=\"delete.php\">
                                        <button class=\"delete\" type=\"submit\" name=\"studID".$row["id"] ."\">Delete</button>
                                        <input type=\"hidden\" value=\"studID".$row["id"] ."\">
                                    </form>
                                </div>
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