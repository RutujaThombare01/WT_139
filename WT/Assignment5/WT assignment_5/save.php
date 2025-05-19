<?php
$roll = $_POST['t1'];
$name = $_POST['t2'];
$email = $_POST['t3'];
$mobile = $_POST['t4'];
$address = $_POST['t5'];

$con = mysqli_connect("localhost", "root", "", "TYB1");
$sql = "update student1 set roll=$roll,name='$name',email='$email',mobile='$mobile',address='$address' where roll=$roll";

if (mysqli_query($con, $sql)) {
    echo "Updated Successfully";
} else {
    echo "Error: " . mysqli_error($con);
}
mysqli_close($con);
echo "<form action='student_info.php'>";
echo "<input type='submit' name='b1' value='Back'/>";
echo "</form>";

?>