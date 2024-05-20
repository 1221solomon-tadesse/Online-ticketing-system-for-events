<?php
 include 'session.php';?>
<?php
include 'functions.php';
// Connect to MySQL using the below function
$pdo = pdo_connect_mysql();
// MySQL query that retrieves all the tickets from the database
$stmt = $pdo->prepare('SELECT * FROM event ORDER BY EID DESC');
$stmt->execute();
$stmts = $pdo->prepare("SELECT * FROM user WHERE UID = :bud");
$stmts->bindParam(':bud', $_SESSION['id']);
$stmts->execute();
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
$user = $stmts->fetchAll(PDO::FETCH_ASSOC);
?>
<?php foreach ($user as $u): ?>
	<p> </p>
    <?php endforeach; ?>
<?$variable=$_GET['btn'];?>
<?=template_header_user('Dashboard',htmlspecialchars($u['FNAME'], ENT_QUOTES)." ".htmlspecialchars($u['LNAME'], ENT_QUOTES))?>


<div class="content home">

	<h2>Events </h2>
    <?php foreach ($user as $u): ?>
	<p> </p>
    <?php endforeach; ?>

	<div class="box_container">
    
    <?php foreach ($tickets as $ticket): ?>
      <?php
        $y=0;
    $p= htmlspecialchars($ticket['EID'], ENT_QUOTES);
    $stmt = $pdo->prepare("SELECT * FROM `ticket` WHERE `EID`= :bud");
    $stmt->bindParam(':bud', $p );
    $stmt->execute();
    $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($tickets as $t):
      if(htmlspecialchars($t['av'], ENT_QUOTES)==1){
        $r="Ticket sold";
        $y++;
      }
      else{
        $r="Ticket Available";
      }
    endforeach;

      date_default_timezone_set('Africa/Nairobi');
      $from = strtotime(htmlspecialchars($ticket['END_DATE'], ENT_QUOTES));
      $today = time();
      $difference = $from -$today ;
      
      ?>
        
        <div class="box" id="selected">
        <form method="get" action="buy.php">
        <img src="<?=htmlspecialchars($ticket['FILE_NAME'], ENT_QUOTES)?>" alt="wee" class="image">
            <h3 name="btns" type="name" id="name"><?=htmlspecialchars($ticket['NAME'], ENT_QUOTES)?></h3>
            <P><?=htmlspecialchars($ticket['DESCRIPTION'], ENT_QUOTES)?></p>        
            <h3 style="color:blue;"><?=htmlspecialchars($ticket['DATE'], ENT_QUOTES)?>  ,  <?=floor($difference / 86400);?> Days left</h3>   
            <button name="btn" type="submit" value="<?=htmlspecialchars($ticket['EID'], ENT_QUOTES)?>">see more</button>
            
            </form>          
        
        </div>
    </a>
       
        <?php endforeach; ?>
  
    </div>

	

</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "navtop") {
    x.className += " responsive";
  } else {
    x.className = "navtop";
  }
}
</script>
<footer class="main-footer text-sm">
        <strong>Copyright © <?php echo date('Y') ?>. 
        <!-- <a href=""></a> -->
        </strong>
        All rights reserved.
    
      </footer>

