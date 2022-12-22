<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert data</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body style="background-color:#ffd5bd">
    <table>
        <tr>
            <th>
                <h2 style="color:black" class="text-right">insert data</h2>
            </th>
        </tr>
        
        <tr>
            <td id="table-form">
                <div class="container" style="color:teal;margin-left:60%;width:600px;background-color:white;">
                <form id="triggform" class="container">
                    <div class="form-group">
                        <label  class="font-weight-bold" for="name" class="font-weight-bold">Name : </label>
                        <input type="text"  class="form-control" name="name" id="name">
                    </div>
                        <br>
                        <br>
                    
                    <div class="form-group">
                        <label  class="font-weight-bold" for="email">Email : </label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div> 
                    
                        <br>
                        <br>
                    
                    <div class="form-group">
                        <label  class="font-weight-bold" for="mobile">Mobile : </label>
                        <input type="tel" class="form-control" name="mobile" id="mobile">
                    </div>
                    
                        <br>
                        <br>
                    
                    <div class="form-group">
                        <label  class="font-weight-bold" for="address">Address</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="5"></textarea>
                    </div>
                    
                        <br>
                        <br>
                    <div class="form-group">
                        <label  class="font-weight-bold" for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    
                        <br>
                        <br>
                    
                    <div class="form-group">
                        <label  class="font-weight-bold" for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" id="cpassword">
                    </div>
                    
                        <br>
                        <br>
                    
                    <div class="form-group">
                        <input type="file" class="form-control" name="user_file" id="user_file">
                    </div>

                        <br>
                        <br>
                        <input type="submit" id="submit" value="submit" class="btn btn-dark m-5">
                        <span id="msg"></span>
                        <input type="button" class="btn btn-success" onClick="Javascript:window.location.href='/ajax/ajax-view.php'" value="view table">
                    
                </form>
                </div>
            </td>
        </tr>
        <tr>
            <td id="table-data">

            </td>
        </tr>
    </table>
</body>
<script>
    $("document").ready(function(){
        function loadtable(){
            $.ajax({
                url:'ajax-view.php',
                type:'POST',
                success:function(data){
                        $("#table-data").html(data);
                    }
            })
        };
        // loadtable();

        $("#submit").on('click',function(e){
            e.preventDefault();
        
            var name = $("#name").val();
            var email = $("#email").val();
            var mobile = $("#mobile").val();
            var address = $("#address").val();
            var password = $("#password").val();
            var user_file = $("#user_file").val();
            
            var desc = [name,email,mobile,address,password,user_file];
            console.log("index wali file ka :- ",typeof JSON.stringify(desc));
            desc =  JSON.stringify(desc);
            console.log(typeof desc);
            $.ajax({
                url:'ajax-insert.php',
                type:'POST',
                data:{
                        u_name:name,
                        u_email:email,
                        u_mobile:mobile,
                        u_address:address,
                        u_password:password,
                        u_user_file:user_file,
                        // u_desc:desc,
                    },

                success:function(data){
                        // alert(data);
                        
                        if(data ==1)
                        {
                            alert("data inserted");
                            // loadtable();
                            $("#triggform").trigger("reset");
                        }else{
                            alert("data not saved!");
                        }
                    }
            });

            $.ajax({
                url:'ajax-formlog.php',
                type:'POST',
                data:{
                        u_desc:desc
                    },

                success:function(data){
                        
                        if(data ==1)
                        {
                            // alert("desc send");
                            // loadtable();
                        }else{
                            // alert("desc not send!");
                        }
                    }
            });


        });

        
    });

</script>
</html>