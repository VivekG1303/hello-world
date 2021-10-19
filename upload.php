<?php

require_once "dbconn.php";


//Student Data Insert
if(!empty($_POST)) {

    if ($_POST['action'] == 'student' ) {

        $query = "SELECT email FROM student WHERE email='".$_POST['email']."'";

        $select = mysqli_query($conn, $query);

        if (mysqli_num_rows($select) > 0) {

            $message = "This email already exist!";

        } else {

            if ($_POST['fName'] == '' && $_POST['lName'] == '' && $_POST['birthdate'] == '' && $_POST['mobilenumber'] == '' && $_POST['email'] == '' && $_POST['course'] == '') {

                $message = "Please input the all fields!";

            } else {

                $currentDate  = date("m/d/Y H:i:s");
                    
                $query = "INSERT INTO student(firstname, lastname, birthdate, mobilenumber, email, course, createdate ) VALUES ('".$_POST['fName']."', '".$_POST['lName']."', '".$_POST['birthdate']."', '".$_POST['mobilenumber']."', '".$_POST['email']."', '".$_POST['course']."', '".$currentDate."')";

                $register = mysqli_query($conn, $query);

                $success = "Student detail registered successfully!";

            }

        }

    }

    if ($_POST['action'] == 'course' ) {

        $query = "SELECT course_name FROM course WHERE course_name='".$_POST['courseName']."'";

        $select = mysqli_query($conn, $query);
    
        if (mysqli_num_rows($select) > 0) {
    
            $message = "This course already exist!";
    
        } else {
    
            if ($_POST['courseName'] == '') {
    
                $message = "Please enter the valid course!";
    
            } else {
                
                $query = "INSERT INTO course(course_name) VALUES ('".$_POST['courseName']."')";
        
                $insert = mysqli_query($conn, $query);

                $success = "Course detail's registered successfully!";
    
            }
    
        }
    
    }

}