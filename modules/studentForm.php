<!-- Form Section -->
<div class="container-fluid background">
    <div class="col-xl-6 col-xl-offset-3 col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-xs-8 col-xs-offset-2 form">
        <div class="form-box">
            <form method="post" name="registration" id="registration">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fName">First Name</label>
                            <input type="text" name="fName" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="lName">Last Name</label>
                            <input type="text" name="lName" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Birth Date</label>
                            <input type="text" name="birthdate" class="form-control" id="datepicker" placeholder="Birthdate" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="mobilenumber">Mobile Number</label>
                            <input type="text" class="form-control" name="mobilenumber" placeholder="Mobile Number">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="course">Course</label>
                            <select name="course" id="old_course" class="form-control">
                                <option value="">Select Course</option>
                                <?php foreach ($data as $row) {?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['course_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                  <p id="warning"><?php echo isset($message) ? $message : '';?></p>
                  <p id="success"><?php echo isset($success) ? $success : '';?></p>
                  <input type="hidden" name="action" value="student">
                  <input type="submit" class="btn btn-primary register-button" value="Register">
            </form>
                <button id="record-show" class="btn btn-primary student-list-button">Student List</button>
        </div>
    </div>
</div>