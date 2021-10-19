<?php
require_once "dbconn.php";

if(isset($_POST['action'])){
    $action = mysqli_real_escape_string($conn,$_POST['action']);
 }

if ($action == 'student_edit') {

    $id = 0;

    if(isset($_POST['id'])){
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    }
    if(isset($_POST['fname'])){
        $newfname = mysqli_real_escape_string($conn,$_POST['fname']);
    }
    if(isset($_POST['lname'])){
        $newlname = mysqli_real_escape_string($conn,$_POST['lname']);
    }
    if(isset($_POST['bday'])){
        $newbday = mysqli_real_escape_string($conn,$_POST['bday']);
    }
    if(isset($_POST['number'])){
        $newnumber = mysqli_real_escape_string($conn,$_POST['number']);
    }
    if(isset($_POST['email'])){
        $newemail = mysqli_real_escape_string($conn,$_POST['email']);
    }
    if(isset($_POST['course'])){
        $newcourse = mysqli_real_escape_string($conn,$_POST['course']);
    }
    if($id > 0){

    // Check record exists
    $checkRecord = mysqli_query($conn,"SELECT * FROM student WHERE student_id=".$id);
    $totalrows = mysqli_num_rows($checkRecord);

    if($totalrows > 0){

        if ($newfname !== '' && $newlname !== '' && $newbday !== '' && $newnumber !== '' && $newemail !== '' && $newcourse !== '') {
            
            $updatedate = date("m-d-Y H:i:s");
            // update record
            $query = "UPDATE student SET firstname='". $newfname ."', lastname='". $newlname ."', birthdate='". $newbday ."', mobilenumber='". $newnumber ."', email='". $newemail ."', course='". $newcourse ."', updatedate='".$updatedate."' WHERE student_id=".$id;
            mysqli_query($conn,$query);
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }

    }else{
        echo 0;
        exit;
    }
    }

    echo 0;
    exit;

}

if ($action == 'student_view') {

    $id = 0;
    
    if(isset($_POST['id'])){
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    }
    
    if($id > 0){
    
    // Check record exists
    $checkRecord = mysqli_query($conn,"SELECT * FROM student WHERE student_id=".$id);
    $totalrows = mysqli_num_rows($checkRecord);
    
    if($totalrows > 0){
    
            // select record
            $query = "SELECT * FROM student JOIN course ON student.course = course.id WHERE student_id=".$id;
            $fetch = mysqli_query($conn,$query);
            $data = array();
            while ($row = mysqli_fetch_assoc($fetch)) {
                $data = $row;
            }
            echo json_encode($data);
            exit;
    
    }else{
        echo 0;
        exit;
    }
    }
    
    echo 0;
    exit;
    
}

if ($action == 'student_delete') {

    $id = 0;
    
    if(isset($_POST['id'])){
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    }
    if($id > 0){

    // Check record exists
    $checkRecord = mysqli_query($conn,"SELECT * FROM student WHERE student_id=".$id);
    $totalrows = mysqli_num_rows($checkRecord);

    if($totalrows > 0){
        // Delete record
        $query = "DELETE FROM student WHERE student_id=".$id;
        mysqli_query($conn,$query);
        echo 1;
        exit;
    }else{
        echo 0;
        exit;
    }
    }

    echo 0;
    exit;

}

if ($action == 'course_view') {

    $id = 0;
    
    if(isset($_POST['id'])){
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    }
    
    if($id > 0){
    
    // Check record exists
    $checkRecord = mysqli_query($conn,"SELECT * FROM course WHERE id=".$id);
    $totalrows = mysqli_num_rows($checkRecord);
    
    if($totalrows > 0){
    
            // select record
            $query = "SELECT * FROM course WHERE id=".$id;
            $fetch = mysqli_query($conn,$query);
            $data = array();
            while ($row = mysqli_fetch_assoc($fetch)) {
                $data = $row;
            }
            echo json_encode($data);
            exit;
    
    }else{
        echo 0;
        exit;
    }
    }
    
    echo 0;
    exit;
    
}


if ($action == 'course_edit') {

    $id = 0;

    if(isset($_POST['id'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
    }

    if(isset($_POST['course'])){
        $newcourse = mysqli_real_escape_string($conn,$_POST['course']);
    }

    if($id > 0){

      // Check record exists
      $checkRecord = mysqli_query($conn,"SELECT * FROM course WHERE id=".$id);
      $totalrows = mysqli_num_rows($checkRecord);

      if($totalrows > 0){

        if ($newcourse !== '') {
            // update record
            $query = "UPDATE course SET course_name='". $newcourse ."' WHERE id=".$id;
            mysqli_query($conn,$query);
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }

      }else{
        echo 0;
        exit;
      }
    }

    echo 0;
    exit;

}

if ($action == 'course_delete') {
        
    $id = 0;

    if(isset($_POST['id'])){
      $id = mysqli_real_escape_string($conn,$_POST['id']);
    }
    
    if($id > 0){

      // Check record exists
      $checkRecord = mysqli_query($conn,"SELECT * FROM course WHERE id=".$id);
      $totalrows = mysqli_num_rows($checkRecord);

      if($totalrows > 0){
        // Delete record
        $query = "DELETE FROM course WHERE id=".$id;
        mysqli_query($conn,$query);
        echo 1;
        exit;
      }else{
        echo 0;
        exit;
      }
    }

    echo 0;
    exit;

}
