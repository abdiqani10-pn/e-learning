<?php

include_once('includes/head.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');
?>

 <div class="main-content">


 <?php

if  (isset($_POST['btnSubmit'])){
    if (addCourse($_POST)) {
      header('location:courses.php');
   } else {
     echo ('<div class="alert alert-danger"> No course registered </div>');
  }
}


?>

    <form action="add-course.php" method="POST" onsubmit="return validateAddCourseForm()">
     <div class="card w-50">
        <!----card header---->
        <div class="card-header bg-primary text-white">
            <h2 class="card-title">Course registration</h2>
        </div>
         <!----card body--->
        <div class="card-body">
            <!----row1----->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>CourseName </label>
                        <input  id="courseName"  name="courseName" type="text" placeholder="Enter course name" class="form-control">
                        <span id="courseNameError" class="error-message"></span>
                    </div>
                </div>
            </div>
            <!-----row2----->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Coursedate </label>
                        <input  id="courseDate" type="date" name="courseDate" placeholder="Enter start-date" class="form-control ">
                        <span id="courseDateError" class="error-message"></span>
                    </div>
                </div>
            </div>
            
            <!-- row3 -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Course Fee </label>
                        <input  id="courseFee" name="courseFee" type="number"  placeholder="Fee" class="form-control">
                        <span id="courseFeeError" class="error-message"></span>
                    </div>
                </div>
            </div>
            <!-- row4 -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Duration </label>
                        <input  id="CourseDuration" name="CourseDuration" type="text" placeholder="Enter CourseDuration" class="form-control">
                        <span id="CourseDurationError" class="error-message"></span>
                    </div>
                </div>
            </div>

    

            <!-- submit button -->
            <div class="pull-right">
            <button type="submit"  class ="btn btn-primary" name="btnSubmit">Save</button>
            </div>
        </div>


     </div>
   </form> 
  </div>

  <script>

function validateAddCourseForm(){
  var isValidForm = true;
  const courseName = document.getElementById("courseName")
  const courseNameError= document.getElementById("courseNameError")

  const courseDate = document.getElementById("courseDate")
  const courseDateError = document.getElementById("courseDateError")
  
  const courseFee = document.getElementById("courseFee")
  const courseFeeError = document.getElementById("courseFeeError")

  const CourseDuration = document.getElementById("CourseDuration")
  const CourseDurationError = document.getElementById("CourseDurationError")

  if (courseName.value == ""){
    isValidForm = false ;
    courseName.classList.add("has-error")
    courseNameError.innerText = "please writte course Name";
  } else{
    courseName.classList.remove("has-error")
    courseNameError.innerText = "";
  }


  
  if (courseDate.value == ""){
    isValidForm = false ;
    courseDate.classList.add("has-error")
    courseDateError.innerText = "please writte course Date";
  } else{
    courseDate.classList.remove("has-error")
    courseDateError.innerText = "";
  }

  
  if (courseFee.value == ""){
    isValidForm = false ;
    courseFee.classList.add("has-error")
    courseFeeError.innerText = "please writte course Fee";
  } else{
    courseFee.classList.remove("has-error")
    courseFeeError.innerText = "";
  }


  
  if (CourseDuration.value == ""){
    isValidForm = false ;
    CourseDuration.classList.add("has-error")
    CourseDurationError.innerText = "please writte  CourseDuration";
  } else{
    endDate.classList.remove("has-error")
    endDateError.innerText = "";
  }

return isValidForm;
}
  </script>

<?php    
  include_once('includes/footer.php')
  ?>