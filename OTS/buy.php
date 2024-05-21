<?php
 include 'session.php';
include 'functions.php';
$av;
if(isset($_GET['btn'])){
$v=$_GET['btn'];
$pdo = pdo_connect_mysql();
// MySQL query that retrieves all the tickets from the database
$stmts = $pdo->prepare("SELECT * FROM `event` WHERE `EID`= :bud");
$stmts->bindParam(':bud', $v );
$stmts->execute();
$event = $stmts->fetchAll(PDO::FETCH_ASSOC);
 foreach ($event as $u): endforeach; 
 if(isset($u)){
$p= htmlspecialchars($u['OID'], ENT_QUOTES);
$stmt = $pdo->prepare("SELECT * FROM `organizers` WHERE `OID`= :bud");
$stmt->bindParam(':bud', $p );
$stmt->execute();
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($tickets as $t): endforeach; }
$stm = $pdo->prepare("SELECT * FROM `ticket` WHERE `EID`= :bud");
$stm->bindParam(':bud', $v );
$stm->execute();
$ti = $stm->fetchAll(PDO::FETCH_ASSOC);
foreach ($ti as $f): endforeach;

}
else{ 
header("Location: user.php");}
?>
<?=template_header_pro('Dashboard',htmlspecialchars($u['NAME'], ENT_QUOTES)." ")?>
<div class="content home">
 <div class="probox" >
<div class="topbox">
<a href=""><h2><?=htmlspecialchars($t['NAME'], ENT_QUOTES)?></h2></a>

    <a class="link" href=""><img src="<?=htmlspecialchars($u['FILE_NAME'], ENT_QUOTES)?>" alt="wee" class="imgs" id="column" ></a>
 

 <h2><?=htmlspecialchars($u['NAME'], ENT_QUOTES)?> , <?=htmlspecialchars($u['VENUE'], ENT_QUOTES)?></h2>
<h2><?=htmlspecialchars($u['DESCRIPTION'], ENT_QUOTES)?> ,  <?=htmlspecialchars($u['DATE'], ENT_QUOTES)?></h2>
<?php 
$av=0;
$b=0;
foreach ($ti as $f):
if(htmlspecialchars($f['av'], ENT_QUOTES)==0){
      $av+=1;
}
else{
  $b+=1;
}
endforeach;?>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form action="add($v,$id)" method="get">
    <label>amount : </label>
    <input type="textfield" name="am">
    <button id ="myBtn".<?=htmlspecialchars($f['STATUS'])?> type="submit" name="btnss" value="<?=htmlspecialchars($u['EID'], ENT_QUOTES)?>">pay</button>
    </form>
  </div>

</div>
<?php
function add($v1,$id2){

  $pdo = pdo_connect_mysql();
  // MySQL query that retrieves all the tickets from the database
  $stmts = $pdo->prepare("SELECT * FROM `event` WHERE `EID`= :bud");
  $stmts->bindParam(':bud', $v1 );
  $stmts->execute();
  $event = $stmts->fetchAll(PDO::FETCH_ASSOC);
   foreach ($event as $u): endforeach; 
   echo"<h1>bu</h1>";
   if(isset($u)){
  $p= htmlspecialchars($u['OID'], ENT_QUOTES);
  $stmt = $pdo->prepare("SELECT * FROM `organizers` WHERE `OID`= :bud");
  $stmt->bindParam(':bud', $p );
  $stmt->execute();
  $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($tickets as $t): endforeach; }
  $stm = $pdo->prepare("SELECT * FROM `ticket` WHERE `EID`= :bud");
  $stm->bindParam(':bud', $v1 );
  $stm->execute();
  $ti = $stm->fetchAll(PDO::FETCH_ASSOC);
  foreach ($ti as $f): endforeach;
  
  $t=htmlspecialchars($f['TID']);
  $e=htmlspecialchars($u['EID']);
   $conn=mysqli_connect('localhost','root','','ots') or die("connection failed:".mysqli_connect_error() );
   $num=0;
   if(isset($_GET['btnss'])){
    $am=$_GET['am'];
    for($x=0 ;$x<$am ;$x++){
      if(htmlspecialchars($f['EID'])==0){
        $s="UPDATE ticket SET UID = '$id2'  WHERE ticket.EID = '$e'";
      mysqli_query($conn,$s);
      $num+=1;
      echo"<h1>bu</h1>";
      }
      }
    
    header("Location: user.php");
  }
  
  }
  ?>
<style>
  .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 50px;
  border: 1px solid #888;
  width: 50%;
  
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>


<div class="av"><h2><?php echo "$av  "?>available ,<?php echo "$b  "?>sold</h2></div>

<?php 
  $arr=array("1" => "1234");
  foreach ($ti as $f):
    foreach ($arr as $m):
    endforeach;
  if(htmlspecialchars($f['STATUS'], ENT_QUOTES)!=$m){
  echo "<button id ='myBtn".htmlspecialchars($f['STATUS'])."' ><div class='card' id=''><div class='container'><h4><b>Ticekt level : ".htmlspecialchars($f['STATUS'])."</b></h4><p>Prize : ".htmlspecialchars($f['PRIZE'])."</p> </div></div></button>";
  array_push($arr,htmlspecialchars($f['STATUS'], ENT_QUOTES));}
endforeach;
;?>
  </div>
  <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal

var btn = document.getElementById("myBtn1");
var btn1 = document.getElementById("myBtn2");
var btn2 = document.getElementById("myBtn3");
var btn3 = document.getElementById("myBtn4");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}
btn1.onclick = function() {
  modal.style.display = "block";
}
btn2.onclick = function() {
  modal.style.display = "block";
}
btn3.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
    </div></div></div>
<footer class="main-footer text-sm">
        <strong>Copyright © <?php echo date('Y') ?>. 
        <!-- <a href=""></a> -->
        </strong>
        All rights reserved.
    
      </footer>

