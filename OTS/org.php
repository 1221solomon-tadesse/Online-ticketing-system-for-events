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

template_header_org('Dashboard',htmlspecialchars($org['NAME'], ENT_QUOTES))?>


<div class="content home"   >

	<h2>My Events </h2>
	<p> </p>

	<div class="box_container">
    
    <?php foreach ($event as $ticket): ?>
        
        <div class="box" id="selected">
        <form method="get" action="displayuser.php">
        <img src="<?=htmlspecialchars($ticket['FILE_NAME'], ENT_QUOTES)?>" alt="wee" class="image">
            <h3 name="btns" type="name" id="name"><?=htmlspecialchars($ticket['NAME'], ENT_QUOTES)?></h3>
            <P>hewjiwewei</p>           
            <button name="btn" type="submit" value="<?=htmlspecialchars($ticket['EID'], ENT_QUOTES)?>">see more</button>
            
            </form>          
        
        </div>
    </a>
       
        <?php endforeach; ?>
  
    </div>

	

</div>
    </body>

