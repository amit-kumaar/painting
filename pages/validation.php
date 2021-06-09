<?php
// mysqli_report(MYSQLI_REPORT_ALL);
session_start();
$db = new mysqli('localhost','root','','artgallery') or die("Unable to connect");


if(isset($_SESSION['form-email'])){
    echo "weclome : ".$_SESSION['form-email']."<br>";
    echo "You Are Now Logged in !<br>";
    echo "To Logout press button below :<br>";
    echo "<a href='logout.php'><button>Logout</button></a>";
}
else{
    
    if(isset($_POST['form-email']) && isset($_POST['form-password'])){
        $username = mysqli_real_escape_string($db,$_POST['form-email']);
        $Pass = md5(mysqli_real_escape_string($db,$_POST['form-password']));
        $user_select_query = "SELECT username FROM UserRegistration WHERE username='$username' AND password='$Pass'";
        $result = mysqli_query($db, $user_select_query);
        if(mysqli_num_rows($result) == 1)
        {
            $_SESSION['form-email'] = $username;
            echo "<script>location.href = 'validation.php'</script>";
        }
    else{
        echo "<script>alert(\"Email or Password Incorrect\");</script>";
        echo "<script>location.href = 'index.html'</script>";

    }
    }
    else{
        echo "<script>location.href = 'index.html'</script>";
    }

}
?>
