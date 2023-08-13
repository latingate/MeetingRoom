<?php
// Redirect to a subfolder
$redirectURL = "/MeetingRoom"; // Change this to the actual subfolder URL
header("Location: $redirectURL");
exit(); // Make sure to exit after sending the header
?>

