<?php
    include "config.php";

    $uri = $_SERVER['REQUEST_URI'];
    $arr = str_split($uri);
    $studentid = "";
    for ($i = 28; $i < sizeof(($arr)) -1; $i++)
    {
        $studentid = $studentid . $arr[$i];
    }

    $sql = "DELETE FROM dashboard WHERE `dashboard`.`id` = \"$studentid\";";
    // echo $sql;
    if ($conn->query($sql) === TRUE) {
        // echo "Record updated successfully";
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
?>