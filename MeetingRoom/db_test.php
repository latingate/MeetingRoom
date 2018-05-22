<?php
/**
 * File name: db_test.php
 * User: Gal Sarig
 * Creation Date & Time : 16/5/18 11:32
 * Created by PhpStorm.
 */

session_start();
ob_start();
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>

<?php

require "db_data.inc";

$session_user_id = $_SESSION['user_id'];
$RoomID = $_GET["RoomID"];
$change_password = $_POST["changepassword"];
if (empty($RoomID)) {
    $RoomID = 1;
    echo "RoomID auto set to 1<br/>";
}

$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL database";
    exit();
} else {
    $heb = $mysqli->set_charset('utf8');
    $query = 'SELECT * FROM rooms where RoomID ="' . $RoomID . '"';
    //echo $query."<br>";
    $result = $mysqli->query($query);
    switch ($result->num_rows) {
        case 0:
            echo "room id not found";
            break;
        case 1:
            $entry = $result->fetch_array(MYSQLI_ASSOC);

            echo "found room id " . $RoomID ;
            echo "<pre> " ;
            echo print_r($entry);
            echo "</pre>";
            foreach($entry as $RoomID ){
                echo "<br/>".$RoomID."=".$RoomName;
        }

            echo "<br/> חדר: " . $entry['RoomName'];
            echo "<br/> מארגן: ". $entry['OrganizerName'];
            break;
        default:
            echo "too many results found (" . $result->num_rows . ")";
            break;
    }
    $result->free_result();
}
$mysqli->close();

ob_flush();
?>

</body>