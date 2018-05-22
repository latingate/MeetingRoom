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

    <script src="/jquery/jquery-3.3.1.min.js"></script>
    <script src="/jquery_plugins/jquery.countdown-2.2.0/jquery.countdown.js"></script>

    <script>
        // interval ajax
        setInterval(function() {
            var someval = Math.floor(Math.random() * 100);
            $('#sample').text('Test' + someval + '( refresh 5 seconds)');
        }, 5000);  //Delay here = 5 seconds
    </script>



    <script type="text/javascript">
        //Countdown
        $('#clock').countdown('2020/10/10 12:34:56')
            .on('update.countdown', function(event) {
                var format = '%H:%M:%S';
                if(event.offset.totalDays > 0) {
                    format = '%-d day%!d ' + format;
                }
                if(event.offset.weeks > 0) {
                    format = '%-w week%!w ' + format;
                }
                $(this).html(event.strftime(format));
            })
            .on('finish.countdown', function(event) {
                $(this).html('This offer has expired!')
                    .parent().addClass('disabled');

            });

        $('#simpleClock').countdown('2020/10/10', function(event) {
            $(this).html(event.strftime('%D days %H:%M:%S'));
        });

        $("#getting-started")
            .countdown("2019/01/01", function(event) {
                $(this).text(
                    event.strftime('%D days %H:%M:%S')
                );
            });
    </script>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <style>
        body {
            direction: rtl;
            text-align: right;
    </style>

</head>

<body>

<?php

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

?>


<div class="text-center">
    <img style="max-width: 70%" src="http://hellmann.co.il/images/helmann_israel_logo.jpg"
         class="rounded mx-auto d-block" alt="">
</div>

<div class="alert alert-primary" role="alert" style="text-align: center; font-size: xx-large;">
    <?= $row["RoomName"] ?>
</div>

<div class="container-fluid">
    <div class="row" style="min-height: 200px; color:white;">
        <div class="col col-1" style="background-color:white; color:black;">
            <!--margin-->
        </div>

        <?php
        if ($row['StatusID'] == 1) {
            ?>
            <div class="col" style="background-color:red; text-align: center;">
                <br/>
                <h2>החדר תפוס</h2>
                <br/>
                <h4>
                    משך
                    הפגישה: <?= date("H:i", strtotime($row['StartTime'])) . "-" . date("H:i", strtotime($row['EndTime'])) ?>
                </h4>
                <br/>
            </div>
            <div class="col" style="background-color: ivory; color: black; text-align: right;">

                <h5>
                    מארגן הפגישה: <?= $row['OrganizerName'] ?>
                </h5>
                <h4>
                    <?= $row['MeetingTitle'] ?>
                </h4>
                <h5>
                    <?= $row['MeetingDesc'] ?>
                </h5>
                <br/>

            </div>

            <?php
        } else {
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


<br/>

<?php
ob_flush();
?>

<div id="simpleClock">SimpleClock Countdown</div>


<div class="countdown">
    Limited Time Only!
    <span id="clock"></span>
</div>

<h3>
    החדר יתפנה בעוד:
<div id="getting-started">countdown</div>
</h3>



Countdown Timer
<p id="demo"></p>

<script>
    // Set the date we're counting down to
    var countDownDate = new Date("May 29, 2019 17:30:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

// Get todays date and time
        var now = new Date().getTime();

// Find the distance between now an the count down date
        var distance = countDownDate - now;

// Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

// Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

// If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>


</body>
