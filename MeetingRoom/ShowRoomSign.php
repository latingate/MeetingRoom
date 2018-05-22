<?php
/**
 * File name: db_test.php
 * User: Gal Sarig
 * Creation Date & Time : 16/5/18 11:32
 * Created by PhpStorm.
 */

session_start();
ob_start();

$RoomID = $_GET["RoomID"];

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
    </style>

    <script src="/jquery/jquery-3.3.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#sign").load("ShowRoomSignText.php?RoomID=<?=$RoomID?>"); //first load
            setInterval(function() {
                $("#sign").load("ShowRoomSignText.php?RoomID=<?=$RoomID?>");
                },5000) //interval in miliseconds

            $("#timer").load("ShowRoomSignTextTimer.php?RoomID=<?=$RoomID?>"); //first load
            setInterval(function() {
                $("#timer").load("ShowRoomSignTextTimer.php?RoomID=<?=$RoomID?>");
            },60000) //interval in miliseconds
        });
    </script>

</head>

<body>

<div id="sign"></div>
<div id="timer"></div>

<?php
ob_flush();
?>

</body>
