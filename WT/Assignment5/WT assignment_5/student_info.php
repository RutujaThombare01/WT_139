<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript">
        function validateForm(event){
            var clickedButton = event.submitter.value;

            if (clickedButton === "DISPLAY" || clickedButton === "DELETE" || clickedButton === "UPDATE") {
                return true;
            }

            if (document.f1.t1.value == ""){
                alert("ID required");
                return false;
            }

            if (document.f1.t2.value == ""){
                alert("Name required");
                return false;
            }

            if (document.f1.t3.value == ""){
                alert("Email required");
                return false;
            }

            if (document.f1.t4.value == ""){
                alert("Mobile No required");
                return false;
            }

            if (document.f1.t5.value == ""){
                alert("Address required");
                return false;
            }
        }
    </script>
    <style>
    body {
        font-family: Arial, sans-serif;
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #f5f5f5;
    }

    /* Form Styling */
    form {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    table {
        width: 100%;
        margin-bottom: 20px;
    }

    td {
        padding: 10px;
        vertical-align: middle;
    }

    td:first-child {
        font-weight: bold;
        width: 30%;
    }

    input[type="text"],
    input[type="email"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        padding: 10px 20px;
        margin-right: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    input[value="ADD"] {
        background-color: #4CAF50;
        color: white;
    }

    input[value="UPDATE"] {
        background-color: #2196F3;
        color: white;
    }

    input[value="DELETE"] {
        background-color: #f44336;
        color: white;
    }

    input[value="DISPLAY"] {
        background-color: #9C27B0;
        color: white;
    }

    input[type="submit"]:hover {
        opacity: 0.9;
    }

    /* Display Table Styling */
    h2 {
        color: #333;
        margin-top: 30px;
    }

    table[border="1"] {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        margin-top: 20px;
    }

    th {
        background-color: #4CAF50;
        color: white;
        padding: 12px;
        text-align: left;
    }

    td {
        padding: 10px;
        border: 1px solid #ddd;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f5f5f5;
    }
</style>
</head>
<body>
    <form method="POST" name="f1" onsubmit="return validateForm(event);">
        <table>
        <tr>
            <td>Student ID:</td><td><input type="text" name="t1" value=""></td>
        </tr>
        <tr>
            <td>Student Name:</td><td><input type="text" name="t2" value=""></td>
        </tr>
        <tr>
            <td>Student Email:</td><td><input type="email" name="t3" value=""></td>
        </tr>
        <tr>
            <td>Student Mobile No:</td><td><input type="text" name="t4" value=""></td>
        </tr>
        <tr>
            <td>Student Address:</td><td><input type="text" name="t5" value=""></td>
        </tr>
        </table>
        <input type="submit" name="b1" value="ADD">
        <input type="submit" name="b2" value="UPDATE">
        <input type="submit" name="b3" value="DELETE">
        <input type="submit" name="b4" value="DISPLAY">
    </form>    
</body>
<!-- ------------------------------------------------------INSERT---------------------------------------------------->
<?php
if (isset($_POST['b3'])) {
    header("Location:delete.html");
}
if (isset($_POST['b2'])) {
    header("Location:update.html");
}

if (isset($_POST['b1'])) {
    $roll = $_POST['t1'];
    $name = $_POST['t2'];
    $email = $_POST['t3'];
    $mobile = $_POST['t4'];
    $address = $_POST['t5'];

    $con = mysqli_connect("localhost", "root", "", "TYB1");
    $sql = "INSERT INTO student1 VALUES ('$roll', '$name', '$email', '$mobile', '$address')";

    if (mysqli_query($con, $sql)) {
        echo "Inserted Successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
    mysqli_close($con);
}
// <---------------------------------------------------------DISPLAY-------------------------------------------------->
if (isset($_POST['b4'])) {
    $con = mysqli_connect("localhost", "root", "", "TYB1");
    $sql = "SELECT * FROM student1";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Student Records</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['roll']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['mobile']}</td>
                    <td>{$row['address']}</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No records found";
    }
    mysqli_close($con);


    // <---------------------------------------------------------DELETE-------------------------------------------------->

}
?>


</html>
