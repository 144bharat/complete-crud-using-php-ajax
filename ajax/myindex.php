<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show_data</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
</head>
<body>
    <table>
        <tr>
            <td><h2>Ajax Form</h2></td>
        </tr>
        
        <tr>
            <td>
                <input type="button" id="load-button" value="load data">
            </td>
        </tr>
        
        <tr>
                <td id="table-data"></td>
        </tr>
    </table>


    <script>
        $("document").ready(function(){
            // e.preventDefault();
           // alert("success");
            $("#load-button").on('click',function(e){
                // alert("success");
                    $.ajax({
                    url:'ajax-view.php',
                    type:'POST',
                    // dataType: 'json',
                    success:function(data){
                        $("#table-data").html(data);
                        
                    }
                })
            });
            

        });
    </script>
</body>
</html>