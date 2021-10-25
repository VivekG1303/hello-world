<!-- Record Show section -->
<section id="record">
            <div class="container-fluid">
                <div class="col-md-10 col-md-offset-1">
                    <div class="record-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php  if(mysqli_num_rows($student_list) > 0 ) { 
                                $i = 1;

                                while($row = mysqli_fetch_assoc($student_list)) {?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td id="current_course"><?php echo $row['firstname']; ?></td>
                                <td id="current_course"><?php echo $row['lastname']; ?></td>
                                <td id="current_course"><?php echo $row['email']; ?></td>
                                <td id="current_course"><?php echo $row['course_name']; ?></td>
                                <td><button type="button" class="btn btn-primary view" data-toggle="modal" data-target="#modalViewForm" data-id="<?php echo $row['student_id'];?>">View</button></td>
                                <td><button type="button" class="btn btn-primary edit" data-toggle="modal" data-target="#modalEditForm" data-id="<?php echo $row['student_id'];?>">Edit</button></td>
                                <td><button type="button" class="btn btn-primary delete" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $row['student_id'];?>">Delete</button></td>
                        
                            </tr>

                            <?php 
                                $i++;
                                }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</section>