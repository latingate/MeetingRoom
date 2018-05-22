<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <title>MeetingRoom</title>
</head>


<body>
<h3>PHP/MeetingRoom - Admin</h3>
<br/>
<div class="container-fluid">
    <div class="row"  style="height: 200px; color:white;">
        <div class="col col-1" style="background-color:white; color:black;">
            margin
        </div>
        <div class="col" style="background-color:red; text-align: center;">
            <h1>חדר ישיבות תפוס</h1>
        </div>
        <div class="col"  style="background-color:green; text-align: center;">
            <h1>חדר ישיבות פנוי</h1>
        </div>
        <div class="col col-1" style="background-color:white; color:black;">
            margin
        </div>
    </div>
    <div class="row">
        <div class="col">
            1 of 3
        </div>
        <div class="col">
            2 of 3
        </div>
        <div class="col">
            3 of 3
        </div>
    </div>
</div>



<div>
    <button type="button" class="btn btn-danger" style="height: 200px; font-size:50px;">חדר ישיבות תפוס</button>
    <button type="button" class="btn btn-success" style="height: 200px; font-size:50px;">חדר ישיבות פנוי</button>
</div>



<div class="hero-button text-center">
    <a href="#" class="btn btn-danger" style="height: 200px; >
                <span style="font-size:50px;">Download from the</span>
        App Store
    </a>
</div>


<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
    <div class="card-header">חדר ישיבות ראשי</div>
    <div class="card-body">
        <h5 class="card-title" style="font-size: xx-large;">חדר הישיבות תפוס</h5>
        <p class="card-text" style="text-align: right;">ישיבת הנהלה</p>
    </div>
</div>



Countdown Timer
<p id="demo"></p>

               <script>
// Set the date we're counting down to
var countDownDate = new Date("Sep 5, 2018 15:37:25").getTime();

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
</html>

