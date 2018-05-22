<head>
    <script src="/jquery/jquery-3.3.1.min.js"></script>
    <script src="/bower_components/jquery.countdown/dist/jquery.countdown.js"></script>



</head>

<body>
<div id="simpleClock">counter</div>

<script>

    $('#simpleClock').countdown('2018/10/10', function(event) {
        $(this).html(event.strftime('%D days %H:%M:%S'));
    });
</script>
</body>