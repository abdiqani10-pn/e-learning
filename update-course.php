<?php

include_once('includes/head.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');
?>

 <div class="main-content">


 <?php

if  (isset($_POST['btnSubmit'])){
    if(updateCourse($_POST)){
        echo "<div class='alert alert-success'>Course has been updated <a class='btn btn-primary' href ='courses.php'> Back</a> </div>";
    } else {
        echo "<div class='alert alert-danger'>No course updated</div>";
    }
}


?>

    <form action="update-course.php" method="POST" onsubmit="return validateUpdateCourseForm()">
     <div class="card w-50">
        <!----card header---->
        <div class="card-header bg-primary text-white">
            <h2 class="card-title">Course update</h2>
        </div>
         <!----card body--->
        <div class="card-body">

          <?php
          if (isset($_GET['id'])){
          $course = getCourseById($_GET['id']);
          if (($course) != false){

          
          ?>

            <input type="hidden" name="id" value="<?php echo $course['id']; ?>">
            <!----row1----->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Course name </label>
                        <input id="courseName" name="courseName" value="<?php echo $course['course_name']; ?>"  type="text" placeholder="Enter course name" class="form-control">
                        <span id="courseNameError" class="error-message"></span>
                        
                    </div>
                </div>
            </div>
            <!-----row2----->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Start date </label>
                        <input type="date" id="courseDate" name="courseDate"  value="<?php echo $course['course_date']; ?>" placeholder="Enter start-date" class="form-control">
                        <span id="courseDateError" class="error-message"></span>
                        
                    </div>
                </div>
            </div>
            <!-- row3 -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Course Fee </label>
                        <input id="courseFee"   name="courseFee" value="<?php echo $course['course_fee']; ?>"    type="text" placeholder="Enter course Fee" class="form-control">
                        <span id="courseFeeError" class="error-message"></span>
                        
                    </div>
                </div>
            
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Duration </label>
                        <input id="CourseDuration"  name="CourseDuration"  value="<?php echo $course['course_duration']; ?>"  type="text" placeholder="Enter Duration" class="form-control">
                        <span id="CourseDurationError" class="error-message"></span>

                    </div>
                </div>
              </div>
          


            <!-- submit button -->
            <div class="pull-right">
            <button type="submit"  class ="btn btn-primary" name="btnSubmit">Update</button>
            </div>
        </div>
        <?php } }?>

     </div>
   </form> 
  </div>

<script>
     
function validateUpdateCourseForm(){
   

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
    courseDateError.innerText = "please writte Course Date";
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
    CourseDurationError.innerText = "please writte  Course Duration";
  } else{
    CourseDuration.classList.remove("has-error")
    CourseDurationError.innerText = "";
  }

return isValidForm;
}
</script>




<?php    
  include_once('includes/footer.php')
  ?>