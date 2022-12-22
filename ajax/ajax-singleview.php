<?php
  
  const SERVER_NAME = 'localhost';
  const USER_NAME = 'root';
  const PASSWORD = '';
  const DATABASE = 'formdb_bharat';

  $connect = mysqli_connect(SERVER_NAME,USER_NAME,PASSWORD,DATABASE);
  
  
  if (mysqli_connect_errno()) {
      echo "Database connection failed.";
  }
    $viewid = $_POST['id'];

  $sql = "SELECT * FROM employee WHERE id='$viewid'";
// $sql = "SELECT * FROM employee WHERE id=64";
  $result = mysqli_query($connect,$sql) or die("sql query failed");
  $output = "";
  if(mysqli_num_rows($result) > 0)
  {
    $output = '<table  class="table">
    <tr class="thead-dark">
    <th scope="col">sno</th>
    <th scope="col">name</th>
    <th scope="col">email</th>
    <th scope="col">mobile</th>
    <th scope="col">address</th>
    <th scope="col">password</th>
    <th scope="col">user_file</th>
            
    </tr>';
    while($row = mysqli_fetch_assoc($result))
    {
       
        $output.= "
        <tr>
            <td scope='row'>{$row["id"]}</td>
            <td>{$row["name"]}</td>
            <td>{$row["email"]}</td>
            <td>{$row["mobile"]}</td>
            <td>{$row["address"]}</td>
            <td>{$row["password"]}</td>
            <td>{$row["user_file"]}</td>
        </tr>";
    }
    $output.= "</table>";
    echo $output; 
}
      
  else{
    echo "<script>alert('record not found to view');</script>";
  }
  ?>

  