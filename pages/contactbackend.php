<!DOCTYPE html>
<html>
<head>
	<title>Kalakriti</title>
</head>

<?php
$a=mysqli_connect("localhost","root","","artgallery");
		if(!$a)
        {   die("couldn't connect to server"); }
echo"<br>";

if(!mysqli_select_db($a, "artgallery"))
  { echo"database not selected."; }

$c=$_REQUEST["name"];
$d=$_REQUEST["email"];
$e=$_REQUEST["subject"];
$f=$_REQUEST["message"];

    $hi ="INSERT INTO contactform(emp_name,emp_email,emp_subject,emp_details) values('$c','$d','$e','$f')";
       if(!mysqli_query($a,$hi))
             { echo"Record not inserted"; }
      else
          { echo "<script>alert(\"YOUR MESSAGE HAS BEEN SUCCESSFULLY SENT  !\")</script>";
         echo "<script>location.href = 'contact.html'</script>";
      }
      ?>

</html>