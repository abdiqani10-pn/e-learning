<?php
session_start();
function loginuser($username,$password){
    try{
        if(empty($username)) throw new exception("username is required");
        if(empty($password)) throw new exception("password is required");
       $conn=getConnection();
       $password=md5($password);
       $statement=$conn->prepare("select id,username,role,status from users where username= ? and user_password= ?");
       $statement->bind_param('ss', $username,$password);
       $statement->execute();
       $results=$statement->get_result();
       if($results->num_rows ==0){
        throw new exception("username and passwaord invalaid");
       }
       $user=$results->fetch_assoc();
       
       if($user['status']=='inactive') throw new exception("your username has been deactivated please contact your manager");
        $_SESSION['id']=$user['id'];
        
        $_SESSION['username']=$user['username'];
        $_SESSION['role']=$user['role'];
        $_SESSION['status']=$user['status'];
       return true;
    }catch(Exception $e){
        echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";   
       return false;
    }
}

function isloging(){
    return isset($_SESSION['username']) && !empty($_SESSION['username']) && isset($_SESSION['status']) && $_SESSION['status'] !='inactive';
}
function isadmin(){
    $user_type=$_SESSION['role'];
    return isset($role) && !empty($role) && $role=='Admin';
}
?>