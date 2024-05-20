<?php
include 'functions.php';
// Connect to MySQL using the below function
$variable=$_POST['query'];
$pdo = pdo_connect_mysql();
// MySQL query that retrieves all the tickets from the database
$stmt = $pdo->prepare("SELECT * FROM event WHERE NAME = :bud");
$stmt->bindParam(':bud', $_POST['query']);
$stmt->execute();
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?=template_header('searching : '.$_POST['query'])?>
<div class="content home">

	<h2>Events </h2>
	<p> </p>

	<div class="box_container">
    
    <?php foreach ($tickets as $ticket): ?>
        
        <div class="box" id="selected">
        <form method="get" action="displayuser.php">
        <img src="<?=htmlspecialchars($ticket['FILE_NAME'], ENT_QUOTES)?>" alt="wee" class="image">
            <h3 name="btns" type="name" id="name"><?=htmlspecialchars($ticket['NAME'], ENT_QUOTES)?></h3>
            <P>hewjiwewei<?htmlspecialchars($u['FNAME'], ENT_QUOTES)?></p>           
            <button name="btn" type="submit" value="<?=htmlspecialchars($ticket['EID'], ENT_QUOTES)?>">see more</button>
            
            </form>          
        
        </div>
    
       
        <?php endforeach; ?>

	

</div>