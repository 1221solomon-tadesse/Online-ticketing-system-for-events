<?php
include 'functions.php';
include 'session.php';
// Connect to MySQL using the below function

$pdo = pdo_connect_mysql();
$stmts = $pdo->prepare("SELECT * FROM `ticket` WHERE `UID`= :bud");
$stmts->bindParam(':bud', $id);
$stmts->execute();
$event = $stmts->fetchAll(PDO::FETCH_ASSOC);
foreach ($event as $ticket): endforeach; 

if($event){
$stmt = $pdo->prepare("SELECT * FROM `event` WHERE `EID`= :bud");
$f= htmlspecialchars($ticket['EID'], ENT_QUOTES);
$stmt->bindParam(':bud',$f);
$stmt->execute();
$e = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($e as $u): endforeach; 
$stm = $pdo->prepare("SELECT * FROM `organizers` WHERE `OID`= :bud");
$fi= htmlspecialchars($u['OID'], ENT_QUOTES);
$stm->bindParam(':bud',$fi);
$stm->execute();
$ei = $stm->fetchAll(PDO::FETCH_ASSOC);
foreach ($ei as $op): endforeach; }

?>
<?$variable=$_GET['btn'];?>
<?=template_header_ti('tickets',"")?>


<div class="content home">

	<h2>My tickets</h2>
	<p> </p>

	<div class="box_container">
    
    <?php foreach ($event as $ticket): ?>
        
        <div class="box" id="selected">
        <form method="get" action="display.php">
        <a class="link" href=""><img src="<?=htmlspecialchars($u['FILE_NAME'], ENT_QUOTES)?>" alt="wee" class="imgs" id="column" ></a>
            <h3 name="btns" type="name" id="name"><?=htmlspecialchars($op['NAME'], ENT_QUOTES)?></h3>
            <P>hewjiwewei</p>           
            <form aciton ="buy.php" method=""class="btnbuy">
  <button type="submit" class="">delete ticket</button>
  
</form>
            </form>          
        
        </div>
    </a>
       
        <?php endforeach; ?>
  
    </div>

	

</div>
