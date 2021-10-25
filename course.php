<?php

require_once "dbconn.php";
require_once "upload.php";
require_once "course_list.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://kit.fontawesome.com/ee8747208b.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js" crossorigin="anonymous"></script>
        <script src="main.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top navbar-background">
            <!-- Mobile Menu -->
            <div class="navbar-header mobile-menu">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <i class="fas fa-chevron-circle-down"></i>
            </button>
            </div>
            <div class="container-fluid navigation-menu">
                <ul class="nav navbar-nav navigation-button">
                <li><a href="index.php">Home</a></li>
                <li><a href="student.php">Students</a></li>
                <li class="active-button"><a href="course.php">Courses</a></li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid background">
            <div class="col-xl-6 col-xl-offset-3 col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-xs-8 col-xs-offset-2 form">
                <div class="form-box col-md-10 col-md-offset-1">
                <form method="post" name="course">
                    <div class="form-row">
                        <div class="form-group">
                        <label for="courseName">Course</label>
                        <input type="text" name="courseName" class="form-control" placeholder="Course">
                        </div>
                    </div>
                    <p id="warning"><?php echo isset($message) ? $message : '';?></p>
                    <p id="success"><?php echo isset($success) ? $success : '';?></p>
                    <input type="hidden" name="action" value="course">
                    <input type="submit" class="btn btn-primary course-register-button" value="Add">
                </form>
                <button id="record-show" class="btn btn-primary course-list-button">Course List</button>
              </div>
            </div>
        </div>

        <!-- Course Show Section -->
        <section id="record">
            <div class="container-fluid">
                <div class="col-md-10 col-md-offset-1">
                    <div class="record-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Course</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                $i = 1;

                                foreach ($data as $row)  {?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td id="current_course"><?php echo $row['course_name']; ?></td>
                                <td><button type="button" class="btn btn-primary course-edit" data-toggle="modal" data-target="#modalLoginForm" data-id="<?php echo $row['id'];?>">Edit</button></td>
                                <td><button type="button" class="btn btn-primary course-delete" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $row['id'];?>">Delete</button></td>
                        
                            </tr>

                            <?php 
                                $i++;
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Update Course</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                <input type="text" id="courseEdit" name="courseEdit" class="form-control validate">
                <label data-error="wrong" data-success="right" for="defaultForm-email">Course</label>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-default update">Update</button>
            </div>
            </div>
        </div>
        </div>
        <p class="message"></p>
    </body>
</html>