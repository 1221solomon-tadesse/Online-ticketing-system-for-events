<?php
include 'functions.php';
// Connect to MySQL using the below function
$pdo = pdo_connect_mysql();
// MySQL query that retrieves all the tickets from the database
$stmt = $pdo->prepare('SELECT * FROM event ORDER BY EID DESC');
$stmt->execute();
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?$variable=$_GET['btn'];?>
<?=template_header_user('Evee1nts',"me")?>