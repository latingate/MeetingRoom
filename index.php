redirecting to MeetinRoom in 3 seconds..

<?php
// Wait for 3 seconds
sleep(3);

// Redirect to a specific URL
$redirectURL = "/MeetingRoom"; // Change this to the desired URL
header("Location: $redirectURL");
exit(); // Terminate the script
?>
