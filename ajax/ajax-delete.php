<?php
    
    const SERVER_NAME = 'localhost';
    const USER_NAME = 'root';
    const PASSWORD = '';
    const DATABASE = 'formdb_bharat';
  
    $connect = mysqli_connect(SERVER_NAME,USER_NAME,PASSWORD,DATABASE);
    
    
    if (mysqli_connect_errno()) {
        echo "Database connection failed.";
    }
   

    // firstly we will be going to send this id data to the form_log table so that we can record all deleted data for the security purpose.
    $delete_id = $_POST["id"];
    $sqldelete = "SELECT * FROM employee WHERE id='$delete_id'";
    if($fetchrow = mysqli_query($connect,$sqldelete))
    {

      while($formlogdata = mysqli_fetch_assoc($fetchrow))
      {
        $name =  $formlogdata['name'];
        $email =  $formlogdata['email'];
        $mobile =  $formlogdata['mobile'];
        $address =  $formlogdata['address'];
        $password =  $formlogdata['password'];
        $user_file =  $formlogdata['user_file'];
      }

      $desc = array("name"=>$name,"email"=>$email,"mobile"=>$mobile,"address"=>$address,"password"=>$password,"user_file"=>$user_file);

      $desc=json_encode($desc);

      // print_r($desc);
      
      // echo gettype($desc);
      $type = "deleted";

      $insert_into_formlog= "insert into form_log (id,type,description) values ('$delete_id','$type','$desc')";
      if($forminsertsql=mysqli_query($connect,$insert_into_formlog))
      {
        echo "form success";
        $sqldelete_emp= "DELETE FROM employee WHERE id=$delete_id";
          
        if(mysqli_query($connect, $sqldelete_emp))
        {
            echo "1";
        }else{
            echo "0";
        }
      }
      else{
        echo "something went wrong!";
      }
    }

    

?>