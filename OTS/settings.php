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
foreach ($user as $u):
endforeach; 
$conn=mysqli_connect('localhost','root','','ots') or die("connection failed:".mysqli_connect_error() );
    if(isset($_GET['btn1'])){
      if( htmlspecialchars($u['PASSWORD'])==$_GET['pw1']){
       
      $name=$_GET['name'];
      $s="UPDATE `organizers` SET `NAME` = '$name'  WHERE `organizers`.`OID` = '$id'";
      mysqli_query($conn,$s);
      header("Location: settings.php");}
    }
    if(isset($_GET['btn2'])){
      if( htmlspecialchars($u['PASSWORD'])==$_GET['pw2']){
      $name=$_GET['des'];
      $s="UPDATE `organizers` SET `DESCRIPTION` = '$name'  WHERE `organizers`.`OID` = '$id'";
      mysqli_query($conn,$s);
      header("Location: settings.php");

    }}
    if(isset($_GET['btn3'])){
      if( htmlspecialchars($u['PASSWORD'])==$_GET['pw3']){
        $npw=$_GET['npw'];
        $cpw=$_GET['cpw'];
        if( $npw==$cpw){
      
      $s="UPDATE `organizers` SET `PASSWORD` = '$npw'  WHERE `organizers`.`OID` = '$id'";
      mysqli_query($conn,$s);
      header("Location: settings.php");
        }
    }
    }

?>
<?$variable=$_GET['btn'];?>
<?=template_header_orgss('Setting',htmlspecialchars($u['NAME'], ENT_QUOTES))?>

<?$name= htmlspecialchars($u['NAME'], ENT_QUOTES)." "?> 


<div class="content home">
 <div class="probox" >
    <div class="topbox">
    <a class="link" href=""><img src="<?=htmlspecialchars($u['FILE_NAME'], ENT_QUOTES)?>" alt="wee" class="img"></a>
    <h3><?=htmlspecialchars($u['NAME'], ENT_QUOTES)?></h3>
    <h3>@<?=htmlspecialchars($u['ADDRESS'], ENT_QUOTES)."      ,    ".htmlspecialchars($u['TYPE'], ENT_QUOTES)?></h3>
    
    <h2><?=htmlspecialchars($u['DESCRIPTION'], ENT_QUOTES)." "?></h2>
   
    
    
    </div>
    <div class="form">
      <form action="" method="get">

      <h3>Edit  name</h3>
        <label>enter new name : </label>
        <input type="text" name="name">
        <label>enter password : </label>
        <input type="password" name="pw1">
        <button name="btn1" value="change NAME">Change Name</button>
        <h3>Edit  Description</h3>
        <label>enter description: </label>
        <input type="text" name="des">
        <label>enter password : </label>
        <input type="password" name="pw2">
        <button name="btn2" value="change BIO">Change bio</button>
        <h3>edit password</h3>
        <label>enter previous password</label>
        <input type="password" name="pw3">
        <label>enter new password</label>
        <input type="password" name="npw">
        <label>confirm password</label>
        <input type="password" name="cpw">
        <button name="btn3" value="change PASSWORD" >Change Password</button>
        <a href="">forget password</a>
      </form>
        
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

