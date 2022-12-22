<?php
    const SERVER = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DATABASE = 'formdb_bharat';

    $connect = mysqli_connect(SERVER,USERNAME,PASSWORD,DATABASE) or die("Database connection failed.");

    // $deleteform_id = $_POST["id"];
    // echo $deleteform_id;
    // exit;
    // $printformsql = "SELECT * FROM form_log WHERE id=$deleteform_id";
    $printformsql = "SELECT * FROM form_log";

  
    $formresult = mysqli_query($connect,$printformsql) or die("sql query failed");
    $output = "";
    if(mysqli_num_rows($formresult) > 0)
    {
      $output = '<h2 class="text-center">form log table</h2>
      <table  class="table">
      <tr class="thead-dark">
      <th scope="col">sno</th>
      <th scope="col">type</th>
      <th scope="col">description</th>
      <th scope="col">createdate</th>              
      </tr>';
      while($row = mysqli_fetch_assoc($formresult))
      {
          $output.= "
          <tr>
              <td scope='row'>{$row["id"]}</td>
              <td>{$row["type"]}</td>
              <td>{$row["description"]}</td>
              <td>{$row["createdate"]}</td>
          </tr>";
      }
      $output.= "</table>";
      echo $output;   //yeh sara table data jayga ajax-view.php pr #table-data isme.
    }
    else{
      echo "<script>alert('record not found');
                    document.write('nothing to show!')</script>";
    }

?>











<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
   
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
  
</body>
</html>