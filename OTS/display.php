<?php
 include 'session.php';?>
<?php
include 'functions.php';

$v=$_GET['btn'];
// Connect to MySQL using the below function
$pdo = pdo_connect_mysql();
// MySQL query that retrieves all the tickets from the database
$stmts = $pdo->prepare("SELECT * FROM `event` WHERE `EID`= :bud");
$stmts->bindParam(':bud', $v );
$stmts->execute();
$event = $stmts->fetchAll(PDO::FETCH_ASSOC);
 foreach ($event as $u): endforeach; 
$p= htmlspecialchars($u['OID'], ENT_QUOTES);
$stmt = $pdo->prepare("SELECT * FROM `organizers` WHERE `OID`= :bud");
$stmt->bindParam(':bud', $p );
$stmt->execute();
/*$stmts = $pdo->prepare("SELECT * FROM `event` WHERE `EID`= :bud");
$stmts->bindParam(':bud', $v );
$stmts->execute();*/
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($tickets as $t): endforeach; 

?>


<?=template_header_user('Dashboard',htmlspecialchars($u['NAME'], ENT_QUOTES)." ")?>


<div class="content home">
 <div class="probox" >
<div class="topbox">
<a href=""><h2><?=htmlspecialchars($t['NAME'], ENT_QUOTES)?></h2></a>

    <a class="link" href=""><img src="<?=htmlspecialchars($u['FILE_NAME'], ENT_QUOTES)?>" alt="wee" class="imgs" id="column" ></a>
 

 <h2><?=htmlspecialchars($u['NAME'], ENT_QUOTES)?></h2>
 <h2><?=htmlspecialchars($u['VENUE'], ENT_QUOTES)?></h2>
<h2><?=htmlspecialchars($u['DATE'], ENT_QUOTES)?></h2>
<h2><?=htmlspecialchars($u['DESCRIPTION'], ENT_QUOTES)?></h2>

<h2>Age <?=htmlspecialchars($u['AGE'], ENT_QUOTES)?>+</h2>
<h2><?=htmlspecialchars($u['TYPE'], ENT_QUOTES)?></h2>
<form action ="buy.php" method="get"class="btnbuy">
  <button type="submit" class="" name="btn" value="<?=htmlspecialchars($u['EID'], ENT_QUOTES)?>">buy</button>
  
</form>
 

  </div>


    
   
   
    
    
    </div></div></div>
	
	



<footer class="main-footer text-sm">
        <strong>Copyright © <?php echo date('Y') ?>. 
        <!-- <a href=""></a> -->
        </strong>
        All rights reserved.
    
      </footer>

