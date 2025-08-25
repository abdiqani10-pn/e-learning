<?php
function getConnection()
 {
  try {
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbName = 'elearning_db';

    return new mysqli($host, $user, $password, $dbName);
  } catch (Exception $e) {
    echo $e->getMessage();
    echo "there is error please return agoin";
    exit();
  }
}
////Studets database/////





function getStudents()
 {
  try {
    $conn = getConnection();
    $result = $conn->query(" SELECT * FROM students ");

    return $result->fetch_all(MYSQLI_ASSOC);
  } catch (Exception $e) {
    echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
  }
}






function addStudent($data)
 { 
  try {
    $studentName = $data['studentName'];
    $studentMobile = $data['studentMobile'];
    $studentsex = $data['sex'];
    $studentStatus = $data['status'];

    if (empty($studentName)) throw new Exception("Student name is required");
    if (empty($studentMobile)) throw new Exception("Student mobile is required");
    if (empty($studentsex)) throw new Exception("Student sex is required");
    if (empty($studentStatus)) throw new Exception("Student status is required");

    $conn = getConnection();
    $conn->query("INSERT INTO students(student_name,student_mobile,student_sex,student_status) VALUES
      ('$studentName','$studentMobile','$studentsex','$studentStatus')");
    return true;
  } catch (Exception $e) {
    echo  '<div class="alert alert-danger">' . $e->getMessage() . '</div>';
    return false;
  }
}





function updateStudent($data, $id)
 {
  try {
    $conn = getConnection();


    $studentName = $data['studentName'];
    $studentMobile = $data['studentMobile'];
    $studentsex = $data['sex'];
    $studentStatus = $data['status'];

    if (empty($id)) throw new Exception('student is required');
    if (empty($studentName)) throw new Exception('studentName is required');
    if (empty($studentMobile)) throw new Exception('studentmobile is required');
    if (empty($studentsex)) throw new Exception(' studentsex is required');
    if (empty($studentStatus)) throw new Exception('student status is required');
    $conn->query("UPDATE students SET student_name ='$studentName' , student_mobile ='$studentMobile'
       , student_sex = '$studentsex', student_status = '$studentStatus'  WHERE id = $id");
    return true;
  } catch (Exception $e) {
    echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
    return false;
  }
}




function getStudentById($id)
 {
  try {
    if (empty($id) == true) throw new Exception("fadlan student id soo qoro");

    $conn = getConnection();
    $statement = $conn->prepare("SELECT id,student_name,student_mobile,student_sex,student_status from 
  students WHERE id = ?");
    $statement->Bind_param('i', $id);
    $statement->execute();
    $results = $statement->get_result();
    if ($results->num_rows < 0) {
      throw new Exception("fadlan ARDAYGAN WA QALAD");
    }
    return $results->fetch_assoc();
  } catch (Exception $e) {

    echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
    return false;
  }
}




function deleteStudentById($id)
 {
  try {
    $conn = getConnection();
    $conn->query("DELETE  FROM students WHERE id = $id");

    return true;
  } catch (Exception $e) {
    echo $e->getMessage();
    return false;
  }
}


////course database///




function addCourse($data)
 {
  $conn = getConnection();
  try {

    $courseName = $data['courseName'];
    $courseDate = $data['courseDate'];
    $courseFee = $data['courseFee'];
    $CourseDuration = $data['CourseDuration'];



    if (empty($courseName) == true) throw new Exception("soo qor coursename-ka fadlan.");
    if (empty($courseDate) == true) throw new Exception("soo qor course-dateka fadlan.");
    if (empty($courseFee) == true) throw new Exception("soo qor courseFee-ga fadlan.");
    if (empty($CourseDuration) == true) throw new Exception("soo qor Course Duration ka fadlan.");


    return  $conn->query("INSERT INTO courses (course_name, course_date,course_fee,course_duration) 
   VALUES ('$courseName','$courseDate','$courseFee','$CourseDuration')");
  } catch (Exception $e) {
    echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
    return false;
  }
}



function getCourses()
 {
  try {
    $conn = getConnection();
    $result = $conn->query(" SELECT * FROM courses ");

    return $result->fetch_all(MYSQLI_ASSOC);
  } catch (Exception $e) {
    echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
  }
}




function getCourseById($id)
 {
  try {
    if (empty($id) == true) throw new Exception("fadlan course id soo qoro");

    $conn = getConnection();
    $result = $conn->query("SELECT * FROM courses WHERE id = $id");
    if ($result->num_rows < 1) throw new Exception("ID $id xogtiisa lama hayo");
    return $result->fetch_assoc();
  } catch (Exception $e) {

    echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
    return false;
  }
}


function updateCourse($data)
 {
  try {
    $conn = getConnection();

    $id = $data['id'];
    $courseName = $data['courseName'];
    $courseDate = $data['courseDate'];
    $courseFee = $data['courseFee'];
    $CourseDuration = $data['CourseDuration'];
    if (empty($id)) throw new Exception('ID is required');
    if (empty($courseName)) throw new Exception('courseName is required');
    if (empty($courseDate)) throw new Exception('courseDate is required');
    if (empty($courseFee)) throw new Exception('courseFee is required');
    if (empty($CourseDuration)) throw new Exception('CourseDuration is required');
    $conn->query("UPDATE courses SET course_name ='$courseName' , course_date ='$courseDate'
       , course_fee = '$courseFee', course_duration = '$CourseDuration'  WHERE id = $id");
    return true;
  } catch (Exception $e) {
    echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
    return false;
  }
}


function deleteCourseById($id)
 {
  try {
    $conn = getConnection();
    $conn->query("DELETE  FROM courses WHERE id = $id ");

    return true;
  } catch (Exception $e) {
    echo $e->getMessage();
    return false;
  }
}

//enrollment///

function enrollCourse($data)
 {
  try {
    $studentid = $data['studentid'];
    $courseid = $data['courseid'];
    $EnrollmentDate = $data['EnrollmentDate'];
    if (empty($studentid)) throw new Exception("Fadlan dooro ardayga");
    if (empty($courseid)) throw new Exception("Fadlan dooro course ka");
    if (empty($EnrollmentDate)) throw new Exception("Fadlan dooro date ka");
    $conn = getConnection();

    $hasEnrolled = $conn->query("SELECT * FROM enrollment WHERE student_id = $studentid AND course_id = $courseid");
    if ($hasEnrolled->num_rows > 0) throw new Exception("Ardaygan horay ayuu course-ka isaga diwaan gashay");

    $conn->query("INSERT INTO enrollment (student_id,course_id,enrollment_date) VALUES ($studentid,$courseid,'$EnrollmentDate')");
    return true;
  } catch (Exception $e) {

    echo "<div class='alert text-danger'>" . $e->getMessage() . "</div>";
    return false;
  }
}
///enrollmentreport//

function getEnrollmentReport($courseid)
 {
  try {

    $conn = getConnection();
    $result = $conn->query("SELECT e.id, e.student_id, e.enrollment_date,e.course_id,s.student_name,s.student_mobile,c.course_name,c.course_fee FROM enrollment e  INNER JOIN students s  ON s.id = e.student_id  INNER JOIN courses c ON c.id =e.course_id WHERE e.course_id = $courseid ");
    if ($result->num_rows < 1) throw new Exception("No course found");
    return $result->fetch_all(MYSQLI_ASSOC);
  } catch (Exception $e) {
    echo $e->getMessage();
    return [];
  }
}



function deleteEnrollmentById($id)
 {
  try {
    $conn = getConnection();
    $conn->query("DELETE  FROM enrollment WHERE id = $id ");

    return true;
  } catch (Exception $e) {
    echo $e->getMessage();
    return false;
  }
}









function getEnrollmentReportById($id)
 { 
  try {
    if (empty($id) == true) throw new Exception("fadlan student name soo qoro");

    $conn = getConnection();
    $statement = $conn->prepare("SELECT id,student_name,student_mobile,course_name,enrollment_date,course_fee from 
  reports WHERE id = ?");
    $statement->Bind_param('i', $id);
    $statement->execute();
    $results = $statement->get_result();
    if ($results->num_rows < 0) {
      throw new Exception("fadlan update WA QALAD");
    }
    return $results->fetch_assoc();
  } catch (Exception $e) {

    echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
    return false;
  }
}






function updateEnrollment($data, $id)
 {
  try {
    $conn = getConnection();


    $studentName = $data['studentName'];
    $studentMobile = $data['studentMobile'];
    $course = $data['courseName'];
    $Erollmentdate = $data['Erollmentdate'];
    $fee = $data['courseFee'];

    if (empty($id)) throw new Exception('student is required');
    if (empty($studentName)) throw new Exception('studentName is required');
    if (empty($studentMobile)) throw new Exception('studentmobile is required');
    if (empty($courseName)) throw new Exception(' courseName is required');
    if (empty($Erollmentdate)) throw new Exception(' Erollmentdate is required');
    if (empty($courseFee)) throw new Exception('courseFee is required');
    $conn->query("UPDATE reports SET student_name ='$studentName' , student_mobile ='$studentMobile'
       , course_name = '$course', erollment_date = '$Erollmentdate'  WHERE id = $id");
    return true;
  } catch (Exception $e) {
    echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
    return false;
  }
}








/// user managments //





function addusers($data)
 {
  $conn = getConnection();
  try {

    $role = $data['role'];
    $status = $data['status'];

    $username = $data['username'];
    $password = md5($data['password']);

    if (empty($role)) throw new Exception("Fadlan soobuuxi magaca rolka");
    if (empty($status)) throw new Exception("Fadlan soobuuxi statuska");

    if (empty($username)) throw new Exception("Fadlan soobuuxi usernamka");
    if (empty($password)) throw new Exception("Fadlan soobuuxi password userka");
    return $conn->query("insert into users (role,username,user_password,status) values('$role','$username','$password','$status')");
  } catch (Exception $e) {
    echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
  }
}



function getusers()
 {
  try {
    $conn = getConnection();
    $results = $conn->query("select id,role,username,status from users");
    return $results->fetch_all(MYSQLI_ASSOC);
  } catch (Exception $e) {
    echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
  }
}




function getusersByid($id)
 {
  try {
    $conn = getConnection();
    if (empty($id)) throw new exception("fadlan id soodirso");
    $statement = $conn->prepare("select id,username,user_password,role,status from users where id= ?");
    $statement->bind_param('i', $id);
    $statement->execute();
    $results = $statement->get_result();
    if ($results->num_rows <= 0) {
      echo '<div class="alert alert-info">Has not found whith' . $id . '</div>';
      exit();
    }
    return $results->fetch_assoc();
  } catch (exception $e) {
    echo '<div class="alert alert-danger">' . $e->getMessage() . '</div>';
  }
}

function updateusers($data, $id)
 {
  $conn = getConnection();
  try {
    if (empty($id)) throw new exception("fadlan user id soodirso");
    $username = $data['username'];
    $role = $data['role'];
    $status = $data['status'];
    $password = $data['password'];
    if (empty($username)) throw new exception("fadlan sobuuxi fuulnamka");
    if (empty($role)) throw new exception("fadlan sobuuxi rolka");
    if (empty($status)) throw new exception("fadlan sobuuxi mobilka");

    $sql = '';

    if (isset($data['password']) && !empty($data['password'])) {
      $password = md5($data['password']);
      $sql = "update  users set username='$username',role='$role',status='$status',user_password='$password' where id=$id";
    } else {
      $sql = "update  users set username='$username',role='$role',status='$status' where id=$id";
    }


    $conn->query($sql);
    // echo $sql;
    return true;
  } catch (Exception $e) {
    echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
  }
}


function DeleteUsers($id)
 {
  try {
    if (isset($id) && empty($id)) {
      throw new exception("User Id Is required");
    }
    $conn = getConnection();
    $conn->query("delete from users where id=$id");
    return true;
  } catch (exception $e) {
    echo '<div class="alert alert-danger">' . $e->getMessage() . '</div>';
    return false;
  }
}
