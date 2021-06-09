<?php
session_start();

if(isset($_SESSION['form-email'])){
    session_destroy();
    unset($_SESSION['form-email']);
    echo "<script>alert(\"successfully logged out !\")</script>";
    echo "<script>location.href = 'index.html'</script>";
}
else{
    echo "<script>location.href = 'index.html'</script>";
}
?>