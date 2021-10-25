//Student Delete jQuery

$(document).ready(function(){

    // Delete 
    $('.course-delete').on('click', function(){
    var el = this;
    
    // Delete id
    var deleteid = $(this).data('id');

    var actionid = 'course_delete';

    var confirmalert = confirm("Are you sure?");
    if (confirmalert == true) {
        // AJAX Request
        $.ajax({
        url: 'action.php',
        type: 'POST',
        data: { id:deleteid, action:actionid },
        success: function(response){

            if(response == 1){
        // Remove row from HTML Table
        $(el).closest('tr').css('background','tomato');
        $(el).closest('tr').fadeOut(800,function(){
            $(this).remove();
        });
            }else{
        alert('Invalid ID.');
            }

        }
        });
    }

    });

});

//Course Edit jQuery and Ajax
var edit = {};
$(document).ready(function(){
                
    // Edit
    $('.course-edit').on('click', function() {

    // Edit ID
    edit.editid = $(this).data('id');

    // View id
    var viewid = $(this).data('id');

    var actionid = 'course_view';
        
        // AJAX Request
        $.ajax({
        url: 'action.php',
        type: 'POST',
        data: { id:viewid, action:actionid },
        dataType: 'json',
        success: function(courseData){
                $("#courseEdit").val(courseData.course_name);
            }
        });

        $('.update').on('click', function() {

            var editid = edit.editid;    

            var actionid = 'course_edit';
        
            var newcourse = $('#courseEdit').val();

            // AJAX Request
            $.ajax({
            url: 'action.php',
            type: 'POST',
            data: { id:editid, action:actionid, course:newcourse },
            success: function(response){
                if (response == 1) {
                    window.location.reload(true);
                }

            }
            });

        });

    });

});

//DatePicker & Data Table
$( function() {
    $( "#datepicker" ).datepicker();
    $( "#birthdateEdit" ).datepicker();
} );

$(document).ready(function() { 
    $("#record-show").on("click", function() {
        $("#record").toggle();
    });

    $("#record-show").click(function() {
        $('html, body').animate({
            scrollTop: $("#record").offset().top
        }, 1000);
    });
});

$(document).ready(function() {
    $('ul li a').on('click', function(){
        $('ul').children().removeClass('active-button');
        $(this).addClass('active-button');
      });
});


$(document).ready(function() { 
    $('#example').DataTable();
});

// Student View jQuery
$(document).ready(function(){

    // View 
    $('.view').on('click', function(){
    
    // View id
    var viewid = $(this).data('id');

    var actionid = 'student_view';
    
        // AJAX Request
        $.ajax({
        url: 'action.php',
        type: 'POST',
        data: { id:viewid, action:actionid },
        dataType: 'json',
        success: function(studentData){
            $("#firstname").html(studentData.firstname);
            $("#lastname").html(studentData.lastname);
            $("#birthdate").html(studentData.birthdate);
            $("#mobilenumber").html(studentData.mobilenumber);
            $("#email").html(studentData.email);
            $("#newcourse").html(studentData.course_name);
        }
        });

    });

});

// Student Delete jQuery
$(document).ready(function(){

    // Delete 
    $('.delete').on('click', function(){
    var el = this;
    
    // Delete id
    var deleteid = $(this).data('id');

    var actionid = 'student_delete';

    var confirmalert = confirm("Are you sure?");
    if (confirmalert == true) {
        // AJAX Request
        $.ajax({
        url: 'action.php',
        type: 'POST',
        data: { id:deleteid, action:actionid },
        success: function(response){

            if(response == 1){
                // Remove row from HTML Table
                $(el).closest('tr').css('background','tomato');
                $(el).closest('tr').fadeOut(800,function(){
                    $(this).remove();
                });
            }else{
                alert('Invalid ID.');
            }

        }
        });
    }

    });

});



// Student Edit jQuery and Ajax
var studentedit = {};

$(document).ready(function(){
        
    // Edit
    $('.edit').on('click', function() {

    // Edit ID
    studentedit.editid = $(this).data('id');

    // View id
    var viewid = $(this).data('id');

    var actionid = 'student_view';
    
        // AJAX Request
        $.ajax({
        url: 'action.php',
        type: 'POST',
        data: { id:viewid, action:actionid },
        dataType: 'json',
        success: function(studentData){
            console.log(studentData);
            $("#fnameEdit").val(studentData.firstname);
            $("#lnameEdit").val(studentData.lastname);
            $("#birthdateEdit").val(studentData.birthdate);
            $("#numberEdit").val(studentData.mobilenumber);
            $("#emailEdit").val(studentData.email);
            $("#course").val(studentData.course);
        }
    });


        $('.update').on('click', function() {

            var editid = studentedit.editid;

            var actionid = 'student_edit';

            var newfname = $('#fnameEdit').val();
            var newlname = $('#lnameEdit').val();
            var newbirthdate = $('#birthdateEdit').val();
            var newnumber = $('#numberEdit').val();
            var newemail = $('#emailEdit').val();
            var newcourse = $('#course').val();

            // AJAX Request
            $.ajax({
            url: 'action.php',
            type: 'POST',
            data: { id:editid, action:actionid, fname:newfname, lname:newlname, bday:newbirthdate, number:newnumber, email:newemail, course:newcourse},
            success: function(response){
                if (response == 1) {
                   window.location.reload(true);
                } else {
                    $("#warning1").text('Please fill up all the fields!');
                }

            }
            });

        });

    });

});

// Navbar toggle 
$(document).ready(function() {
    $('.navbar-toggle').on('click', function() {
        $('.navigation-menu').toggle();
    });
});

//email validation
jQuery.validator.addMethod("validate_email", function(value, element) {

    if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
        return true;
    } else {
        return false;
    }
}, "Please enter a valid Email.");

//Validation jQuery
$(function(){
    $("#registration").validate({
        rules: {
            fName: "required",
            lName: "required",
            email: {
                required: true,
                email: true,
                validate_email: true
            },
            course: "required",
            mobilenumber: {
                digits:true,
                minlength:10,
                maxlength:10
            }
        },
        messages: {
            firstname: "Enter your firstname",
            lastname: "Enter your lastname",
            email: "Please enter valid mail id",
            course: "Please select the valid course",
            mobilenumber: "Please enter correct mobile number"
        }
    });
    
    $(".register-button").on('click', function(){
        $("#registration").submit();
        return false;
    });
});