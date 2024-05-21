<?php
include 'functions.php';
include 'session.php';
// Connect to MySQL using the below function
$pdo = pdo_connect_mysql();
// MySQL query that retrieves all the tickets from the database
$variable=$_GET['btn'];
$stmt = $pdo->prepare("SELECT * FROM `event` WHERE `EID`= :bud");
$stmt->bindParam(':bud', $variable );
$stmt->execute();
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($user as $org):
endforeach; ?>
<?=template_header_orgr('Add',htmlspecialchars($org['NAME'], ENT_QUOTES))?>
<div class="content home">
 <div class="probox" >
<div class="topbox">
  <div class="wo" >  
  <h2>Add new Event</h2>
  <form class="ss" action="" method="POST" enctype="multipart/form-data">
<?php
?>
    <input class="text" name="pr1" placeholder="Prize of 1st ticket" type="number" >
    <input class="text" name="am1" placeholder="Quantity of 1st ticket" type="number">
    <input class="text" name="pr2" placeholder="Prize of 2nd ticket" type="number">
    <input class="text" name="am2" placeholder="Quantity of end ticket" type="number">
    <input class="text" name="pr3" placeholder="Prize of 3rd ticket" type="number">
    <input class="text" name="am3" placeholder="Quantity of 3rd ticket" type="number">
    
    <button class="text" name="submit" type="submit">Add ticket</button>
  </form>

</div>
    
    </div></div></div>
    <?php
    $conn=mysqli_connect('localhost','root','','ots') or die("connection failed:".mysqli_connect_error() );
    if(isset($_POST['submit'])){
      $pr1=$_POST['pr1'];
      $pr2=$_POST['pr2'];
      $pr3=$_POST['pr3'];
     
    
      $st = $pdo->prepare("SELECT * FROM `event` WHERE `NAME`= :bud");
      $st->bindParam(':bud', $prodname );
      $st->execute();
      $e = $st->fetchAll(PDO::FETCH_ASSOC);
      foreach ($e as $z):
      endforeach; 
      for ($x = 0; $x < $_POST['am1']; $x++) {
        $sql3="INSERT INTO ticket (TID, EID , OID, av, STATUS, PRIZE, EX_DATE, UID) VALUES (NULL, '".htmlspecialchars($org['EID'])."', '$id', '0', 'available', '$pr1', '".htmlspecialchars($org['END_DATE'])."', '')";
     
      mysqli_query($conn,$sql3);
      }
      for ($x = 0; $x < $_POST['am2']; $x++) {
        $sql3="INSERT INTO ticket (TID, EID , OID, av, STATUS, PRIZE, EX_DATE, UID) VALUES (NULL, '".htmlspecialchars($org['EID'])."', '$id', '0', 'available', '$pr2', '".htmlspecialchars($org['END_DATE'])."', '')";
     
      mysqli_query($conn,$sql3);
      }
      for ($x = 0; $x < $_POST['am3']; $x++) {
        $sql3="INSERT INTO ticket (TID, EID , OID, av, STATUS, PRIZE, EX_DATE, UID) VALUES (NULL, '".htmlspecialchars($org['EID'])."', '$id', '0', 'available', '$pr3', '".htmlspecialchars($org['END_DATE'])."', '')";
     
      mysqli_query($conn,$sql3);
      }
    }
    ?>
