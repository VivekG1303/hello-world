<?php

$conn = mysqli_connect("localhost", "root", "Admin@123", "school");

$query = "SELECT * FROM course";
$select_course = mysqli_query($conn, $query);

?>