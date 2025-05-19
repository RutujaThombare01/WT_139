<html>
    <body>
<?php
$roll=$_POST['t1'];
$con=mysqli_connect("localhost","root","","tyb1");
$sql="select * from student1 where roll=$roll";
$rs=mysqli_query($con,$sql);
if (mysqli_num_rows($rs) > 0)
{
    $row = mysqli_fetch_assoc($rs);
}
?>
<form action="save.php" method="post">
Roll No:<input type="text" name="t1" value="<?php echo $row['roll'];?>"/><br>
Name:<input type="text" name="t2" value="<?php echo $row['name'];?>"/><br>
Email:<input type="text" name="t3" value="<?php echo $row['email'];?>"/><br>
Mobile:<input type="text" name="t4" value="<?php echo $row['mobile'];?>"/><br>
Address:<input type="text" name="t5" value="<?php echo $row['address'];?>"/><br>
<input type="submit" name="b1" value="Save"/>
</form>
</body>
</html>