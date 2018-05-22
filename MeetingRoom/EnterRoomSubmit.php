<?php
/**
 * File name: EnterRoomSubmit.php
 * User: Gal Sarig
 * Creation Date & Time : 16/5/18 11:32
 * Created by PhpStorm.
 */

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
$setFields = "";
foreach( $_POST as $Name => $Value ) {
    $Fields[$Name] = $Value;
    $setFields .= $Name . "='" . $Value. "', ";
}
$setFields = substr($setFields,0,-2);
//echo print_r($Fields);

//<editor-fold desc="update room data">
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL database";
    exit();
} else {
    $heb = $mysqli->set_charset('utf8');
    $query = 'UPDATE rooms SET ' . $setFields . ' WHERE RoomID=\'' . $Fields["RoomID"]. "'";
    if (!$mysqli->query($query) == TRUE) {
        echo "Error updating record: " . $mysqli->error;
    } else {
        //echo "סטטוס החדר עודכן";
    }
}
$mysqli->close();
//</editor-fold>

if ($Fields['StatusID']==1) {
    echo "<h3>לסיום הפגישה ושיחרור החדר - נא להקיש כאן</h3>";
}
else {
    echo "<h3>סטטוס החדר עודכן ל-פנוי</h3>";
}
?>


</body>