<?php
include 'functions.php';
include 'session.php';
// Connect to MySQL using the below function
$pdo = pdo_connect_mysql();
// MySQL query that retrieves all the tickets from the database
$stmt = $pdo->prepare('SELECT * FROM event ORDER BY EID DESC');
$stmt->execute();
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?$variable=$_GET['btn'];?>
<?=template_header_orgi('info',"")?>
<div class="content home">

 <div class="probox" >
<div class="topbox">
  <div class="wo">  
  <h2>Developers</h2>
    <h2>Eyob</h2>
    <h2>Solomon</h2>
    <h2>Amlakbalew</h2>
    <h2>Gebre</h2>
    <h2>2024,MAY</h2>
   
</div>
    
   
   
    
    
    </div></div></div>