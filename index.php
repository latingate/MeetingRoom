<?php
// Wait for 3 seconds
sleep(1);

// Redirect to a specific URL
$redirectURL = "/MeetingRoom"; // Change this to the desired URL
header("Location: $redirectURL");
exit(); // Terminate the script
?>
