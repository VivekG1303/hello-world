<?php

require_once "dbconn.php";

if ($conn) {

    $query = "SELECT * FROM course";

    $course_list = mysqli_query($conn, $query);

    $data = array();

    if (mysqli_num_rows($course_list) > 0) {
        while ($row = mysqli_fetch_assoc($course_list)) {
            $data[] = $row;
        }
    }

    $sql = "SELECT * FROM student JOIN course ON student.course = course.id";

    $student_list = mysqli_query($conn, $sql);
    
}
?>