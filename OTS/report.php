<?php
include 'functions.php';
include 'session.php';
// Connect to MySQL using the below function
$pdo = pdo_connect_mysql();
// MySQL query that retrieves all the tickets from the database
$stmts = $pdo->prepare("SELECT * FROM `event` WHERE `OID`= :bud");
$stmts->bindParam(':bud', $id );
$stmts->execute();
$event = $stmts->fetchAll(PDO::FETCH_ASSOC);
foreach ($event as $ticket):
endforeach; 
$stmt = $pdo->prepare("SELECT * FROM `organizers` WHERE `OID`= :bud");
$stmt->bindParam(':bud', $id );
$stmt->execute();
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($user as $org):
endforeach; 
?>
<?$variable=$_GET['btn'];?>
<?=template_header_orgr('Add',htmlspecialchars($org['NAME'], ENT_QUOTES))?>
<div class="content home">

 <div class="probox" >
<div class="topbox">
  <div class="wo" >  
  <h2>Add new Event</h2>
  <form class="ss" action="" method="POST" enctype="multipart/form-data">
  <input class="text" name="name" placeholder="Name" type="text" required>
    <input class="text" name="des" placeholder="Description" type="text" required>
    <label for="">Event Date</label>
    <input class="text" name="date" placeholder="Date" type="date"required>
    <label for="">End date for ssalling ticket</label>
    <input class="text" name="endate" placeholder="End date for ssalling ticket" type="date" required>
    <input class="text" name="address" placeholder="Address" type="text" required>
    <input class="text" name="age" placeholder="Age" type="number" required>
    <input class="text" name="pr1" placeholder="Prize of 1st ticket" type="number" >
    <input class="text" name="am1" placeholder="Quantity of 1st ticket" type="number">
    <input class="text" name="pr2" placeholder="Prize of 2nd ticket" type="number">
    <input class="text" name="am2" placeholder="Quantity of end ticket" type="number">
    <input class="text" name="pr3" placeholder="Prize of 3rd ticket" type="number">
    <input class="text" name="am3" placeholder="Quantity of 3rd ticket" type="number">
    <input class="text" name="type" placeholder="Type" type="text"required>
    <input type="file" name="photo" class="inputText"  size="200" required>
    <button class="text" name="submit" type="submit">Add Event</button>
  </form>

</div>
    
    </div></div></div>
    <?php
    $conn=mysqli_connect('localhost','root','','ots') or die("connection failed:".mysqli_connect_error() );
    if(isset($_POST['submit'])){
      $loc="images/";  
      $pr1=$_POST['pr1'];
      $pr2=$_POST['pr2'];
      $pr3=$_POST['pr3'];
      echo '$loc';
      $names= $_FILES['photo']['name'];
      $img_ex= pathinfo($names,PATHINFO_EXTENSION);
      $img_ex_lc= strtolower($img_ex);
      $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
      $img_upload_path = 'images/'.$new_img_name;
      copy($_FILES['photo']['tmp_name'],$img_upload_path);
      $prodname=$_POST['name'];
      $d=$_POST['des'];
      $date=$_POST['date'];
      $tp=$_POST['endate'];
      $d=$_POST['address'];
      $age=$_POST['age'];
      $text=$_POST['type'];
      $iname=$img_upload_path;
      $date =date("Y/m/d");
      $sql2="INSERT INTO event (EID,OID ,NAME, DESCRIPTION, FILE_NAME, DATE, END_DATE, TYPE, VENUE, AGE, STATUS,postdate) VALUES (NULL, '$id', '$prodname', '$d', '$iname', '$date', '$tp', '$text', '$d', '$age', 'available','$date')";
      mysqli_query($conn,$sql2);
      $st = $pdo->prepare("SELECT * FROM `event` WHERE `NAME`= :bud");
      $st->bindParam(':bud', $prodname );
      $st->execute();
      $e = $st->fetchAll(PDO::FETCH_ASSOC);
      foreach ($e as $z):
      endforeach; 
      for ($x = 0; $x < $_POST['am1']; $x++) {
        $sql3="INSERT INTO ticket (TID, EID , OID, av, STATUS, PRIZE, EX_DATE, UID) VALUES (NULL, '".htmlspecialchars($z['EID'])."', '$id', '0', '1', '$pr1', '$tp', '')";
     
      mysqli_query($conn,$sql3);
      }
      for ($x = 0; $x < $_POST['am2']; $x++) {
        $sql3="INSERT INTO ticket (TID, EID , OID, av, STATUS, PRIZE, EX_DATE, UID) VALUES (NULL, '".htmlspecialchars($z['EID'])."', '$id', '0', '2', '$pr2', '$tp', '')";
     
      mysqli_query($conn,$sql3);
      }
      for ($x = 0; $x < $_POST['am3']; $x++) {
        $sql3="INSERT INTO ticket (TID, EID , OID, av, STATUS, PRIZE, EX_DATE, UID) VALUES (NULL, '".htmlspecialchars($z['EID'])."', '$id', '0', '3', '$pr3', '$tp', '')";
     
      mysqli_query($conn,$sql3);
      }
      
    }
    
    
    ?>