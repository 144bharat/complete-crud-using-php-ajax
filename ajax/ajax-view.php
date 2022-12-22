<?php
  
  const SERVER_NAME = 'localhost';
  const USER_NAME = 'root';
  const PASSWORD = '';
  const DATABASE = 'formdb_bharat';

  $connect = mysqli_connect(SERVER_NAME,USER_NAME,PASSWORD,DATABASE);
  
  
  if (mysqli_connect_errno()) {
      echo "Database connection failed.";
  }

  $sql = "SELECT * FROM employee";
  $result = mysqli_query($connect,$sql) or die("sql query failed");
  $output = "";
  if(mysqli_num_rows($result) > 0)
  {
    $output = '<div id="single"><table  class="table">
    <tr class="thead-dark">
    <th scope="col">sno</th>
    <th scope="col">name</th>
    <th scope="col">email</th>
    <th scope="col">mobile</th>
    <th scope="col">address</th>
    <th scope="col">user_file</th>
    <th scope="col">view details</th>
    <th scope="col">update details</th>
    <th scope="col">delete records</th>
            
    </tr>';
    while($row = mysqli_fetch_assoc($result))
    {
        // $descrp = [$row["id"],$row["name"],$row["email"],$row["mobile"],$row["address"],$row["password"]];
        // $json_desc = json_encode($descrp);
        // echo gettype({$row["id"]});
        // echo "<script>console.log($json_desc);</script>";
        $output.= "
        <tr>
            <td scope='row'>{$row["id"]}</td>
            <td>{$row["name"]}</td>
            <td>{$row["email"]}</td>
            <td>{$row["mobile"]}</td>
            <td>{$row["address"]}</td>
            <td>{$row["user_file"]}</td>
            <td><button class='btn btn-warning' type='button' id='viewbtn' data-id='{$row["id"]}'>view</button></td>
            <td><button class='btn btn-success' type='button' id='updatebtn' data-uid='{$row["id"]}'>update</button></td>
            <td><button class='btn btn-danger' type='button' id='deletebtn' data-id='{$row["id"]}'>delete</button></td>
        </tr>";
    }
    $output.= "</table></div>";
    echo $output;   //yeh sara table data jayga myindex.php pr #table-data isme.
  }
  else{
    echo "<script>alert('record not found');</script>";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).on("click","#deletebtn",function(){
            
            var deleteid = $(this).data("id");

            if(confirm("are you sure to delete this id: "+deleteid))
            {
                console.log(deleteid);
                    var element = this;
                    $.ajax({
                    url:"ajax-formlog.php",
                    type:"POST",
                    data: {id:deleteid},
                    success: function(data)
                    {
                        
                        if(data)
                        {
                            alert("record deleted");
                        }else{
                            alert("can't delete record!");
                        }
                    }
                });
                $.ajax({
                    url:"ajax-delete.php",
                    type:"POST",
                    data: {id:deleteid},
                    success: function(data)
                    {
                        if(data == "form success1")
                        {
                            
                            $(element).closest("tr").fadeOut();
                        }else{
                            
                            alert("hello user can't delete record!");
                        }
                    }
                });
            }

           
            // var name = $("#name").val();
            // var email = $("#email").val();
            // var mobile = $("#mobile").val();
            // var address = $("#address").val();
            // var password = $("#password").val();
            // var user_file = $("#user_file").val();

            // var desc ="username:" +name + "\nuser_email:" + email + "\nuser_mobile:" + mobile + "\nuser address:" + address + "\nuser password:" + password;
            // console.log(typeof desc,desc);
            // $.ajax({
            //         url:"ajax-formlog.php",
            //         type:"POST",
            //         data: {
            //             id:deleteid,
            //             u_name:name,
            //             u_email:email,
            //             u_mobile:mobile,
            //             u_address:address,
            //             u_password:password,
            //             u_user_file:user_file,
            //         },
            //         success: function(data)
            //         {
            //             if(data == 1)
            //             {
            //                 $(element).closest("tr").fadeOut();
            //             }else{
            //                 alert("can't delete record!");
            //             }
            //         }
            //     });
        });

        
     $(document).on("click","#viewbtn",function(){
        
        var viewid = $(this).data("id");
        console.log(viewid);
                $.ajax({
                    url:"ajax-singleview.php",
                    type:"POST",
                    data: {id:viewid},
                    success: function(data)
                    {
                        
                        if(data)
                        {
                            // alert("preview details");
                            $('#single').html(data);

                        }else{
                            alert("unable to preview the record!");
                        }
                    }
                });
            });
            // document.getElementById("viewbtn").addEventListener('click',()=>{location.href="/ajax/ajax-singleview.php";
            //             });
            // onClick='Javascript:window.location.href='/ajax/ajax-view.php'
           
</script>
  </head>
  <body>
    <button class="btn btn-success" onClick="location.href='index.php'">back</button>
  </body>
  </html>