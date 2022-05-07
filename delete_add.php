<?php
$connect=mysqli_connect("localhost","root","","curd_db");
if(mysqli_query($connect,"delete from employee_info where id='".$_GET['id']."'"))
{
	echo'
    <script>
    
    alert("Category Deleted");
    window.location.href="add.php";
    </script>';
}
else
{
	echo'
    <script>
    alert("Category Deleted");
    window.location.href="add.php";
    </script>';
}
?>