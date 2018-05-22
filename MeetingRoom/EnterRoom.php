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

    <style>
        body {
            direction: rtl;
            text-align: right;
        }
    </style>

</head>

<body>


<div class="text-center">
    <img style="max-width: 70%" src="http://hellmann.co.il/images/helmann_israel_logo.jpg" class="rounded mx-auto d-block" alt="">
</div>

<div class="alert alert-primary" role="alert" style="text-align: center; font-size: xx-large;">
    ניהול חדר ישיבות
</div>

<?php

require "db_data.inc";

$RoomID = $_GET["RoomID"];

//<editor-fold desc="create room select for form">
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL database";
    exit();
} else {
    $heb = $mysqli->set_charset('utf8');
    $query = 'SELECT RoomID,RoomName FROM rooms';
    $result = $mysqli->query($query);
    $tmp="";
    while($row = mysqli_fetch_assoc($result))
    {
        $tmp .= "<option value='" . $row['RoomID'] . "'";
        if ($row['RoomID'] == $RoomID) {
            $tmp .=" selected";
        }
        $tmp .= ">". $row['RoomName'] . "</option>";
    }
    //echo $tmp;
    $result->free_result();
}
$mysqli->close();
//</editor-fold>

//<editor-fold desc="get current room data">
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL database";
    exit();
} else {
    $heb = $mysqli->set_charset('utf8');
    $query = 'SELECT * FROM rooms WHERE RoomID=' . $RoomID . " LIMIT 1";
    $result = $mysqli->query($query);
    if ($result->num_rows == 1) {
        $row = mysqli_fetch_assoc($result);
        $result->free_result();
    }
}
$mysqli->close();
//</editor-fold>
$RoomID = "";
$RoomName = "";
$OrganizerName = "";
$MeetingTitle = "";
$MeetingDesc = "";

?>
    <form class="col-10" style="direction: rtl; text-align: right" action="EnterRoomSubmit.php" method="post">
    <div class="form-group">
        <label for="RoomID">חדר:</label>
        <select class="form-control" id="RoomID" name="RoomID">
            <?=$tmp?>
        </select>
    </div>
    <div class="form-group">
        <label for="OrganizerName">שם מזמן הפגישה</label>
        <input type="text" class="form-control" id="OrganizerName" name="OrganizerName" aria-describedby="emailHelp"
               value="<?=$row['OrganizerName']?>" placeholder="נא להכניס שם מלא">
    </div>
    <div class="form-group">
        <label for="MeetingTitle">נושא הפגישה</label>
        <input type="text" class="form-control" id="MeetingTitle" name="MeetingTitle" value="<?=$row['MeetingTitle']?>" placeholder="">
    </div>
    <div class="form-group">
        <label for="MeetingDesc">תיאור הפגישה</label>
        <input type="text" class="form-control" id="MeetingDesc" name="MeetingDesc" value="<?=$row['MeetingDesc']?>" placeholder="">
    </div>
        <div class="form-group">
            <label for="StatusID">סטטוס החדר:</label>
            <select class="form-control" id="StatusID" name="StatusID">
                <option value="1"
                    <?php if ($row['StatusID']=='1') {
                        echo " SELECTED";
                    }
                        ?>
                >החדר תפוס</option>
                <option value="0"
                    <?php if ($row['StatusID']=='0') {
                        echo " SELECTED";
                    }
                    ?>
                >החדר פנוי</option>
            </select>
        </div>
        <div class="form-group">
        <label for="StartTime">שעת התחלה</label>
        <input type="time" class="form-control" id="StartTime" name="StartTime" value="<?=date("H:i",strtotime($row['StartTime']))?>" placeholder="">
    </div>
    <div class="form-group">
        <label for="EndTime">שעת סיום</label>
        <input type="time" class="form-control" id="EndTime" name="EndTime" value="<?=date("H:i",strtotime($row['EndTime']))?>"" placeholder="">
    </div>
    <button type="submit" class="btn btn-primary">אשר פגישה</button>
</form>

<br/>

<?php
ob_flush();
?>


</body>
