<?php
      $connect=mysqli_connect("localhost","root","","curd_db");
       $did=$_GET['id'];
      $res=mysqli_query($connect,"select * from employee_info where id='".$did."'");
       $row=mysqli_fetch_row($res);
      ?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
     <div class="container">
        <div class="row">
             <div class="col-sm-6">
             <form  action="update_add.php?id=<?php echo $did?>" method="POST"role="form">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Name</label>
                        <input type="text" class="form-control"  placeholder="Name" name="name" value="<?php echo $row[1]?>" >
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputPassword4">Email</label>
                        <input type="text" value="<?php echo $row[2]?>" class="form-control" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress2">Mobile</label>
                        <input type="text" class="form-control" placeholder="Mobile" name="mobile" value="<?php echo $row[3]?>">
                    </div>
                  
                    <div class="form-group col-md-6 ">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Address" name="address" value="<?php echo $row[4]?>">
                    </div>
                    </div> 
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity" name="city" value="<?php echo $row[5]?>">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control" name="state" value="<?php echo $row[6]?>">
                            <option selected>Choose...</option>
                            <option value="pune">Pune</option>
                            <option value="mumbai">Mumbai</option>
                            <option value="kohalapur"> Kohalapur</option>
                            <option value="nashik">Nashik</option>
                        </select>
                        </div>
                        <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip" name="zip" value="<?php echo $row[7]?>">
                        </div>
                    </div>
                    <input type="hidden" class="form-control" value="<?php echo $row[0]?>"  name="did" placeholder="Enter ...">
                 
                    <button type="submit" name="update" class="btn btn-primary">Sign in</button>
                </form>

             </div>  
               
                    </tbody>
                </table>
                 </div>
           
             
         
        </div>
     </div>       


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<?php
$connect=mysqli_connect("localhost","root","","curd_db");


if(isset($_POST['update']))
 {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
  $did=$_POST['did'];
 if(mysqli_query($connect,"update employee_info set name='".$name."', email='".$email."',mobile='".$mobile."',address='".$address."', city='".$city."',state='".$state."', zip='".$zip."' where id='".$did."'"))
  {
    echo'
    <script>
    alert("update added");
    window.location.href="add.php";
    </script>';
  }

  else
  {
    echo'
    <script>
    alert("Try again");
    window.location.href="add.php";
    </script>';
  }
 }

?>
