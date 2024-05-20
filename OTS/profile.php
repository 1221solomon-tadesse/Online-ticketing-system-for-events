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
$stmts->bindParam(':bud', $id);
$stmts->execute();
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
$event = $stmts->fetchAll(PDO::FETCH_ASSOC);
?>
<?php foreach ($event as $u): ?>

    <?php endforeach; ?>
<?$variable=$_GET['btn'];?>
<?=template_header_pro('Dashboard',htmlspecialchars($u['FNAME'], ENT_QUOTES)." ".htmlspecialchars($u['LNAME'], ENT_QUOTES))?>
<?$name= htmlspecialchars($u['FNAME'], ENT_QUOTES)." ".htmlspecialchars($u['LNAME'], ENT_QUOTES);?> 


<div class="content home">
 <div class="probox" >
    <div class="topbox">
    <a class="link" href=""><img src="<?=htmlspecialchars($u['FILE_NAME'], ENT_QUOTES)?>" alt="wee" class="img"></a>
    <h3>@<?=htmlspecialchars($u['USERNAME'], ENT_QUOTES)."      ,    ".htmlspecialchars($u['AGE'], ENT_QUOTES)?></h3>
    
    <h2><?=htmlspecialchars($u['FNAME'], ENT_QUOTES)." ".htmlspecialchars($u['LNAME'], ENT_QUOTES)?></h2>
   
    
    
    </div>
    <div class="form">
        <h3>user name</h3>
        <label>enter user name : </label>
        <input>
        <label>enter password : </label>
        <input>
        <button>Change Username</button>
        <h3>edit password</h3>
        <label>enter previous password</label>
        <input>
        <label>enter new password</label>
        <input>
        <label>confirm password</label>
        <input>
        <button>Change Password</button>
        <a href="">forget password</a>
    </div>
 </div>

<script>

</script>

	
	

</div>
<footer class="main-footer text-sm">
        <strong>Copyright © <?php echo date('Y') ?>. 
        <!-- <a href=""></a> -->
        </strong>
        All rights reserved.
    
      </footer>

