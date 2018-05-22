<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(
            function() {
                setInterval(function() {
                    var someval = Math.floor(Math.random() * 100);
                    $('#sample').text('Test' + someval);
                }, 5000);  //Delay here = 5 seconds
            });
        
    </script>

</head>

<body>

<div id="sample">Testing refresh every 5 seconds</div>

I would take a look at this below as well, although it may not be relevant in your case.

http://stackoverflow.com/questions/729921/settimeout-or-setinterval



http://jsfiddle.net/YVB9F/





</body>
</html>