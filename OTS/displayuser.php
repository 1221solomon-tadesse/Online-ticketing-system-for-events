<?php
 include 'session.php';
include 'functions.php';
$conn=mysqli_connect('localhost','root','','ots') or die("connection failed:".mysqli_connect_error() );
if(isset($_GET['submit'])){
 $r=$_GET['submit'];
 $sql3="DELETE FROM event WHERE `event`.`EID` = $r" ;
 mysqli_query($conn,$sql3);
 header("Location: org.php");
}
$v=$_GET['btn'];
// Connect to MySQL using the below function
$pdo = pdo_connect_mysql();
// MySQL query that retrieves all the tickets from the database
$stmts = $pdo->prepare("SELECT * FROM `event` WHERE `EID`= :bud");
$stmts->bindParam(':bud', $v );
$stmts->execute();
$event = $stmts->fetchAll(PDO::FETCH_ASSOC);
 foreach ($event as $u): endforeach; 
$p= htmlspecialchars($u['EID'], ENT_QUOTES);
$stmt = $pdo->prepare("SELECT * FROM `ticket` WHERE `EID`= :bud");
$stmt->bindParam(':bud', $p );
$stmt->execute();
/*$stmts = $pdo->prepare("SELECT * FROM `event` WHERE `EID`= :bud");
$stmts->bindParam(':bud', $v );
$stmts->execute();*/
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($tickets as $t): endforeach; 

?>


<?=template_header_org('Dashboard',htmlspecialchars($u['NAME'], ENT_QUOTES)." ")?>


<div class="content home">
 <div class="probox" >
<div class="topbox">

    <a class="link" href=""><img src="<?=htmlspecialchars($u['FILE_NAME'], ENT_QUOTES)?>" alt="wee" class="imgs" id="column" ></a>
   

 <h2><?=htmlspecialchars($u['NAME'], ENT_QUOTES)?></h2>
 <h2><?=htmlspecialchars($u['VENUE'], ENT_QUOTES)?></h2>
<h2><?=htmlspecialchars($u['DATE'], ENT_QUOTES)?></h2>
<h2><?=htmlspecialchars($u['DESCRIPTION'], ENT_QUOTES)?></h2>

<h2>Age <?=htmlspecialchars($u['AGE'], ENT_QUOTES)?>+</h2>
<h2><?=htmlspecialchars($u['TYPE'], ENT_QUOTES)?></h2>
<h1>Tickets status</h1>

<table style="width:100%">
  <tr>
    <td>Ticket level</td>
    <td>prize</td>
    <td>Availability</td>
    <td>Expiration Date </td>
    <td>Days left </td>
  </tr>
  
    <?php
    $p= htmlspecialchars($u['EID'], ENT_QUOTES);
    $stmt = $pdo->prepare("SELECT * FROM `ticket` WHERE `EID`= :bud");
    $stmt->bindParam(':bud', $p );
    $stmt->execute();
    /*$stmts = $pdo->prepare("SELECT * FROM `event` WHERE `EID`= :bud");
    $stmts->bindParam(':bud', $v );
    $stmts->execute();*/
    $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($tickets as $t):
      if(htmlspecialchars($t['av'], ENT_QUOTES)==1){
        $r="Ticket sold";
      }
      else{
        $r="Ticket Available";
      }
      

      date_default_timezone_set('Africa/Nairobi');
      $from = strtotime(htmlspecialchars($t['EX_DATE'], ENT_QUOTES));
      $today = time();
      $difference = $from -$today ;
      
      ?>
      <tr>
      <td><?=htmlspecialchars($t['STATUS'], ENT_QUOTES)?></td>
    <td><?=htmlspecialchars($t['PRIZE'], ENT_QUOTES)?></td>
    <td><?=$r?></td>
    <td><?=htmlspecialchars($t['EX_DATE'], ENT_QUOTES)?> </td>
    <td><?=floor($difference / 86400);?></td>
      </tr>

      <?php endforeach; ?>
 
  
</table>


<div></div>
<form action ="" method="get"class="btnbuy"> <button type="submit" class="" name="submit" value="<?=htmlspecialchars($u['EID'], ENT_QUOTES)?>">Delete Event</button></form>
 <?php

 
 ?>

  
</form>
 




  </div>
  


    
   
   
    
    
    </div></div></div>
	
	



<footer class="main-footer text-sm">
        <strong>Copyright © <?php echo date('Y') ?>. 
        <!-- <a href=""></a> -->
        </strong>
        All rights reserved.
    
      </footer>

