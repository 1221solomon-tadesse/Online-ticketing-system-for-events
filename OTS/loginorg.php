<?php
 session_start();?>
 <?php
include 'functions.php';
// Connect to MySQL using the below function
$pdo = pdo_connect_mysql();
// MySQL query that retrieves all the tickets from the database
$stmt = $pdo->prepare('SELECT * FROM organizers ORDER BY OID DESC');
$stmt->execute();
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
$conn=mysqli_connect('localhost','root','','ots') or die("connection failed:".mysqli_connect_error() );
?>
 <head>
            <meta charset="utf-8">
            <title>login</title>
            <link href="style.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
<body>
<form class="form" id="r-login" action="" method="POST">
		<div class="LOG">
        <h3>LOGIN FOR ORGANIZERS</h3>
        <input type="text" class="form-control" name="OID" placeholder="OID">

        <div><h3></h3></div>

        <input type="password" class="form-control" name="pwd" placeholder="Password">

        <div class="input-group-append">
          <button type="submit" class="btn" name="submit">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>
        <div><h3></h3></div>
        New here? 
        <a  id="linker"href="signor.php">Sign up</a>
        <div><h3></h3></div>
        <a  id="linker"href="login.php"><i class="fas fa-user"></i>   USER</a>
      </div>
    </form>
</body>
<?php

 if(isset($_SESSION['id'])){
 
  echo"<script>location.href='user.php'</script>";
  
 }
 else{
 if(isset($_POST['submit'])){
    $name =$_POST['OID'];
    $pass= $_POST['pwd'];
   $result=mysqli_query($conn,"SELECT * FROM organizers WHERE OID= '$name' && PASSWORD= '$pass'");
  $row=mysqli_fetch_assoc($result);  
       if(mysqli_num_rows($result) > 0){
           $_SESSION['id']=$row['OID'];
           echo $_SESSION['id'];
           header("Location: org.php");
       }
       else{
        header("Location: loginorg.php");
       
       }
     }
  else {
    
   // echo"<script>location.href='login.php'</script>";


  }}
?>
<footer class="main-footer text-sm">
        <strong>Copyright © <?php echo date('Y') ?>. 
        <!-- <a href=""></a> -->
        </strong>
        All rights reserved.
    
      </footer>