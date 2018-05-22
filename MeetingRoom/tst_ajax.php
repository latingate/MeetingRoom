<!DOCTYPE html>
<html>
<head>
    <script src="/jquery/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function(){
            // first function
            $("button").click(function(){
                $("p").hide();
            });

            // second function
            setInterval(function() {
                var someval = Math.floor(Math.random() * 100);
                $('#sample').text('Test' + someval + '( refresh 5 seconds)');
            }, 5000);  //Delay here = 5 seconds


        });
    </script>
</head>
<body>

<div id="sample">Testing refresh every 5 seconds</div>



<h2>This is a H2 heading</h2>

<p>This is a paragraph.</p>
<p>This is another paragraph.</p>

<button>Click me to hide paragraphs</button>

</body>
</html>
