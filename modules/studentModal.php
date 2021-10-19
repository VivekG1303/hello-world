<!-- View Modal -->
<div class="modal fade" id="modalViewForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Student Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="defaultForm-email">First Name</label>
                <p id="firstname"></p>
                </div>
                <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="defaultForm-email">Last Name</label>
                <p id="lastname"></p>
                </div>
                <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="defaultForm-email">Birthdate</label>
                <p id="birthdate"></p>
                </div>
                <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="defaultForm-email">Mobile Number</label>
                <p id="mobilenumber"></p>
                </div>
                <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="defaultForm-email">Email</label>
                <p id="email"></p>
                </div>
                <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="defaultForm-email">Course</label>
                <p id="newcourse"></p>
                </div>
            </div>
            </div>
        </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="modalEditForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Update Student Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="defaultForm-email">First Name</label>
                <input type="text" id="fnameEdit" name="fnameEdit" class="form-control validate">
                </div>
                <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="defaultForm-email">Last Name</label>
                <input type="text" id="lnameEdit" name="lnameEdit" class="form-control validate">
                </div>
                <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="defaultForm-email">Birth Date</label>
                <input type="text" id="birthdateEdit" name="birthdateEdit" class="form-control validate">
                </div>
                <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="defaultForm-email">Mobile Number</label>
                <input type="text" id="numberEdit" name="numberEdit" class="form-control validate">
                </div>
                <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="defaultForm-email">Email</label>
                <input type="text" id="emailEdit" name="emailEdit" class="form-control validate">
                </div>
                <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="defaultForm-email">Course</label>
                <select name="course" id="course" class="form-control">
                <option id=""></option>
                <?php foreach ($data as $row) {?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['course_name']; ?></option>
                <?php } ?>
                </select>
                </div>
                <p id="warning1"></p>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-default update">Update</button>
            </div>
            </div>
        </div>
        </div>