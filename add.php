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
                <form method="post" action="add.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputPassword4">Email</label>
                        <input type="text" class="form-control" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress2">Mobile</label>
                        <input type="text" class="form-control" placeholder="Mobile" name="mobile">
                    </div>
                  
                    <div class="form-group col-md-6 ">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Address" name="address">
                    </div>
                    </div> 
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity" name="city">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control" name="state">
                            <option selected>Choose...</option>
                            <option value="pune">Pune</option>
                            <option value="mumbai">Mumbai</option>
                            <option value="kohalapur"> Kohalapur</option>
                            <option value="nashik">Nashik</option>
                        </select>
                        </div>
                        <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip" name="zip">
                        </div>
                    </div>
                 
                    <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
                </form>

             </div>  
                 <div class="col-sm-6">
                 <table class="table table-bordered mt-5">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">mobile</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                  $sr=1;
                  $connect=mysqli_connect("localhost","root","" ,"curd_db");
                  $res=mysqli_query($connect,"select * from employee_info");
                  while($row=mysqli_fetch_row($res))
                  {
                    $result=mysqli_query($connect,"select * from employee_info where id='".$row[0]."'");
                    $cat1=mysqli_fetch_row($result);
                   echo
                   '<tr>
                      <td>'.$sr.'</td>
                      <td>'.$cat1[1].'</td>
                      <td>'.$cat1[2].'</td>
                      <td>'.$cat1[3].'</td>
                      <td>
                      <a href="update_add.php?id='.$row[0].'"> <center> <button class="btn btn-primary btn-flat">
                          <i class="fa fa-pencil-square-o "> Edit</i>
                        </button></center></a>
                      </td>
                      <td>
                      <a href="delete_add.php?id='.$row[0].'"><center> <button class="btn btn-danger btn-flat">
                         <i class="fa fa-times">Delete</i>
                       </button></center></a>
                     </td>
                  </tr>';
                  $sr++;
                  }
               
                ?>
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
    $connect=mysqli_connect("localhost","root","" ,"curd_db");
    if(isset($_POST['submit']))
     {
      $name=$_POST['name'];
      $email=$_POST['email'];
      $mobile=$_POST['mobile'];
      $address=$_POST['address'];
      $city=$_POST['city'];
      $state=$_POST['state'];
      $zip=$_POST['zip'];
     
      $sql="INSERT INTO employee_info(name,email,mobile,address,city,state,zip)VALUES('$name','$email','$mobile','$address','$city','$state','$zip') ";

      $result=mysqli_query($connect,$sql);
      if($result==true)
      {
        echo'
        <script>
        alert("Data added");
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
