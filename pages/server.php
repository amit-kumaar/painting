<?php

$db = mysqli_connect('localhost','root','','artgallery') or die("Unable to connect");

//register users

$username = mysqli_real_escape_string($db, $_POST['form-email']);
$firstname = mysqli_real_escape_string($db, $_POST['form-first-name']);
$lastname = mysqli_real_escape_string($db, $_POST['form-last-name']);
$Pass = mysqli_real_escape_string($db, $_POST['form-password']);
$CPass = mysqli_real_escape_string($db, $_POST['form-cpassword']);

//handling errors
$errors = array(); 
//check if user already exists
$user_select_query = "select * from UserRegistration where username = '$username' limit 1";
$result = mysqli_query($db, $user_select_query);
$user = mysqli_fetch_assoc($result);

if($user){
    if($user['username'] === $username){array_push($errors,"Username Already taken");}
}
if(count($errors) == 0){
    $password = md5($Pass);
    mysqli_query($db,"INSERT INTO UserRegistration(username,firstname,lastname,password) VALUES('$username','$firstname','$lastname','$password')");
    echo "<script>alert(\"Successfully registered. Redirecting to Login page\")</script>";
    header("location:index.html");
}
else{
    echo "<script>alert(\"username already taken!\")</script>";
    header("location: index.html");
}
?>
