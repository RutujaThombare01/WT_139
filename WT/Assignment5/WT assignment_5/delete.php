<?php
$roll=$_POST['t1'];
$con=mysqli_connect("localhost","root","","tyb1");
$sql="delete from student1 where roll=$roll";
if(mysqli_query($con,$sql))
{
    echo "Record Deleted Successfully";
}
echo "<form action='student_info.php'>";
echo "<input type='submit' name='b1' value='Back'/>";
echo "</form>";
?>