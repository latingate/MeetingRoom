<?php
// Redirect to a specific URL
$redirectURL = "/MeetingRoom"; // Change this to the desired URL
header("Refresh: 2; Location: $redirectURL");
exit(); // Terminate the script
?>
