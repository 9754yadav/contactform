<?php

$db = mysqli_connect("localhost","root","","testDB");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit']))
{
    $tittle = $_POST['tittle'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $datepicker = $_POST['datepicker'];
    $phone = $_POST['phone'];
    $file= $_POST['file'];
    $email = $_POST['email'];
    $textarea = $_POST['teaxtarea'];

    $insert = mysqli_query($db,"insert into `contact`('tittle','fname' 'lname','datepicker','phone,'file','email','textarea') VALUES ('$tittle','$fname' '$lname','$datepicker','$phone,'$file','$email','$textarea')");

    if(!$insert)
    {
        echo mysqli_error();
    }
    else
    {
        echo "Records added successfully.";
    }
}

$sql = "select * from contact";
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>tittle</th>";
                echo "<th>first_name</th>";
                echo "<th>last_name</th>";
                echo "<th>date</th>";
		echo "<th>phone</th>";
		echo "<th>file</th>";
		echo "<th>messsage</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['tittle'] . "</td>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['lname'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
		echo "<td>" . $row['phone'] . "</td>";
		echo "<td>" . $row['file'] . "</td>";
		echo "<td>" . $row['message'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else{
        echo "No records";
    }
} else{
    echo "ERROR!" . mysqli_error($db);
}
mysqli_close($db);
?>