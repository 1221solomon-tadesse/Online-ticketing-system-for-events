<?php
include 'functions.php';
// Connect to MySQL using the below function

?>
 <head>
            <meta charset="utf-8">
            <title>login</title>
            <link href="style.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
<body>
<form class="form" id="r-login" action="" method="post" enctype="multipart/form-data">
		<div class="LOGs">
        <h3>Sign Up</h3>
        <input type="text" class="form-control" name="fname" placeholder="First Name"required>
        <input type="text" class="form-control" name="lname" placeholder="Last Name"required>
        

        <div><h1></h1></div>
        <input type="number" class="form-control" name="age" placeholder="Age"required>
        <input type="text" class="form-control" name="Address" placeholder="Address"required>
        <div><h1></h1></div>
        
        <input type="text" class="form-control" name="username" placeholder="Username"required>
        <input type="tel" class="form-control" name="pnum" placeholder="Phone Number"required>
        <div><h1></h1></div>


        <input type="password" class="form-control" name="password" placeholder="Password"required>
        <input type="password" class="form-control" name="Cpassword" placeholder="Confirm Password"required>
        <div><h1></h1></div>
        <label>import profile picture</label>
        <input type="file" name="photo" class="inputText"  size="200" >
   
        <div class="input-group-append">
          <button type="submit" class="btn" name="submit">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>     <div><h3></h3></div>
        Are you an
        <a  id="linker"href="signor.php">Organizer</a>
    ?
        <div><h3></h3></div>
        Already have an account ?
        <a  id="linker"href="login.php">Login</a>
      </div>
    </form>
</body>
<footer class="main-footer text-sm">
        <strong>Copyright © <?php echo date('Y') ?>. 
        <!-- <a href=""></a> -->
        </strong>
        All rights reserved.
    
      </footer>
      <?php
      $conn=mysqli_connect('localhost','root','','ots') or die("connection failed:".mysqli_connect_error() );
      if(isset($_POST['submit'])){
        $ps=$_POST['password'];
        $pc=$_POST['Cpassword'];
      
        if($ps==$pc){
      $loc="images/";
      $names= $_FILES['photo']['name'];
      $img_ex= pathinfo($names,PATHINFO_EXTENSION);
      $img_ex_lc= strtolower($img_ex);
      $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
      $img_upload_path = 'images/'.$new_img_name;
      copy($_FILES['photo']['tmp_name'],$img_upload_path);
      $f=$_POST['fname'];
      $l=$_POST['lname'];
      $a=$_POST['age'];
      $ad=$_POST['Address'];
      $u=$_POST['username'];
      $p=$_POST['pnum'];
      $iname=$img_upload_path;
      $sql2="INSERT INTO user (UID, FNAME, LNAME, AGE, ADDRESS, P_NUMBER, USERNAME,PASSWORD, FILE_NAME) VALUES (NULL, '$f', '$l', '$a', '$ad', '$p', '$u', '$ps', '$iname');";
      mysqli_query($conn,$sql2);
      header("Location: login.php");
    }
      }
      
      
      ?>