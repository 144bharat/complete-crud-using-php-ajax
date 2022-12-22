<?php

   const SERVER_NAME = 'localhost';
   const USER_NAME = 'root';
   const PASSWORD = '';
   const DATABASE = 'formdb_bharat';

   $connect = mysqli_connect(SERVER_NAME,USER_NAME,PASSWORD,DATABASE) or die('failed to connect');
  
  
   
if(isset($_POST))
{  
    // echo "hello jiii";
    // extract($_POST);
    $name = $_POST['u_name'];
    $email = $_POST['u_email'];
    $mobile = $_POST['u_mobile'];
    $address = $_POST['u_address'];
    $password = $_POST['u_password'];
    $user_file = $_POST['u_user_file'];
    
    
  

//  $insertsql = "INSERT INTO employee(name,email,mobile,address,password,user_file) VALUES('$name','$email','$mobile','$address','$password','$user_file')";

$insertsql = "insert into employee (name,email,mobile,address,password,user_file) values ('$name','$email','$mobile','$address','$password','$user_file')";

//   $resultinsert = mysqli_query($connect,$sqlinsert) or die("insert sql query failed");

  if(mysqli_query($connect, $insertsql))
  {
    echo 1;
  }else{
    echo 0;
  }

}

?>