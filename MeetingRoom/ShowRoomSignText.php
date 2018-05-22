<?php
/**
 * File name: ShowRoomSignText.php
 * User: Gal Sarig
 * Creation Date & Time : 16/5/18 11:32
 * Created by PhpStorm.
 */

session_start();
ob_start();

require "db_data.inc";

$RoomID = $_GET["RoomID"];

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

$EndTtimeForCounter = date("Y/m/d",time()) . " " . $row['EndTime'];
//echo "<h2 style='direction: ltr'>EndTimeForCounter=".$EndTtimeForCounter."</h2>";

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="/jquery/jquery-3.3.1.min.js"></script>
    <script src="/jquery_plugins/jquery.countdown-2.2.0/jquery.countdown.js"></script>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <style>
        body {
            direction: rtl;
            text-align: right;
        }
    </style>



    <script type="text/javascript">

        $( document ).ready(function() {
        //Countdown ajax
            $('#clock').countdown('<?=$EndTtimeForCounter?>')
                .on('update.countdown', function(event) {
                    var format = '%M דקות';
                    if(event.offset.totalHours > 0) {
                        format = '%-H שעות %!H ו-' + format;
                    }
                    if(event.offset.totalDays > 0) {
                        format = '%-d ימים %!d ו-' + format;
                    }
                    if(event.offset.weeks > 0) {
                        format = '%-w שבועות %!w ' + format;
                    }
                    $(this).html(event.strftime(format));
                })
                .on('finish.countdown', function(event) {
                    $(this).html('** החדר פנוי **')
                        .parent().addClass('disabled');

                });
        });
    </script>


</head>

<body>

<div class="text-center">
    <img style="max-width: 65%" src="http://hellmann.co.il/images/helmann_israel_logo.jpg" class="rounded mx-auto d-block" alt="">
</div>

<div class="alert alert-primary" role="alert" style="text-align: center; font-size: xx-large;">
    <?=$row["RoomName"]?>
</div>

            <div class="alert alert-secondary" role="alert" style="direction:ltr; text-align: center; font-size: x-large;">
                <?=date("d/m/Y")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=date("H:i",time()+3*60*60)?>
            </div>
<div class="container-fluid">
    <div class="row" style="min-height: 200px; color:white;">
        <div class="col col-1" style="background-color:white; color:black;">
            <!--margin-->
        </div>

        <?php
            if ($row['StatusID']==1) {
        ?>
        <div class="col" style="background-color:red; text-align: center;">
            <br/>
            <h2>החדר תפוס</h2>
            <br/>
            <h4>
            <?=date("H:i",strtotime($row['StartTime']))."-".date("H:i",strtotime($row['EndTime']))?>
            </h4>
<!--
            <br/>
            <h5>
                החדר יתפנה בעוד <span id="clock"></span>
            </h5>
-->
            <br/>
        </div>
        <div class="col" style="background-color: ivory; color: black; text-align: right;">
            <br/>
            <h5>
            מארגן הפגישה: <?=$row['OrganizerName']?>
            </h5>
            <br/>
            <h3 style="font-weight: bold;">
             <?=$row['MeetingTitle']?>
            </h3>
            <h5>
            <?=$row['MeetingDesc']?>
            </h5>
            <br/>

        </div>

                <?php
        }
            else {
        ?>

        <div class="col" style="background-color:green; text-align: center;">
            <br/>
            <h1>החדר פנוי</h1>
            <br/>
        </div>

        <?php
        }
        ?>
        <div class="col col-1" style="background-color:white; color:black;">
            <!--margin-->
        </div>
    </div>
</div>

<?php
ob_flush();
?>

</body>
