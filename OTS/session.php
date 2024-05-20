<?php
session_start();
$id;
if(isset($_SESSION['id'])){
   $id=$_SESSION['id'];
    
   }
   else {
    echo"<script>alert('Session Expire or incorrect credential')</script>";
    echo"<script>location.href='index.php'</script>";


  }

?>