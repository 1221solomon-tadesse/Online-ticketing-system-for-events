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
        <input type="text" class="form-control" name="name" placeholder="Name of organizer"required>
        <input type="text" class="form-control" name="add" placeholder="Address"required>
        

        <div><h1></h1></div>
        <input type="textfield" class="form-control" name="des" placeholder="Say something about the event you organize"required>
        <input type="text" class="form-control" name="type" placeholder="Type"required>
        <div><h1></h1></div>
    


        <input type="password" class="form-control" name="password" placeholder="Password"required>
        <input type="password" class="form-control" name="Cpassword" placeholder="Confirm Password"required>
        <div><h1></h1></div>
        <label>import profile picture</label>
        <input type="file" name="photo" class="inputText"  size="200" >
        <div><h3></h3></div>

    
        <div class="input-group-append">
          <button type="submit" class="btn" name="submit">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>
        <div><h3></h3></div>
        Are you an
        <a  id="linker"href="signup.php">Atendee</a>?
        <div><h3></h3></div>
        Already have an account ?
        <a  id="linker"href="loginorg.php">Login</a>
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
      $n=$_POST['name'];
      $ad=$_POST['add'];
      $u=$_POST['des'];
      $p=$_POST['type'];
      $iname=$img_upload_path;
      $sql2="INSERT INTO organizers (OID, NAME, ADDRESS, PASSWORD, DESCRIPTION, TYPE, FILE_NAME) VALUES (NULL, '$n', '$ad', '$ps', '$u', '$p', '$iname');";
      mysqli_query($conn,$sql2);
      header("Location: loginorg.php");
    }
      }
      
      
      ?>