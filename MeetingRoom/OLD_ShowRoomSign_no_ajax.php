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

        /*}*/
    </style>

    <script src="/jquery/jquery-3.3.1.min.js"></script>

    <script>
        // interval ajax
        setInterval(function() {
            var someval = Math.floor(Math.random() * 100);

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "ShowRoomSignText.php?RoomID="+<?=$RoomID?>, true);
            xmlhttp.send();


            $('#sample').text('Test' + someval + '( refresh 5 seconds)');
        }, 5000);  //Delay here = 5 seconds
    </script>

</head>


<body>

<div id="txtHint">This module will refresh every 5 seconds</div>

<?php
ob_flush();
?>

</body>
