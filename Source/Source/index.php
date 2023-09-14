
<!DOCTYPE html>
<html lang="en">
<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
 <?php 
 include('connect.php');
  $sql = "select * from admin where id = '".$_SESSION["id"]."'";
        $result=$conn->query($sql);
        $row1=mysqli_fetch_array($result);
       
            $q = "select * from tbl_permission_role where role_id='".$row1['role_id']."'";
            $ress=$conn->query($q);
            //$row=mysqli_fetch_all($ress);
             $name = array();
            while($row=mysqli_fetch_array($ress)){
          $sql = "select * from tbl_permission where id = '".$row['permission_id']."'";
        $result=$conn->query($sql);
        $row1=mysqli_fetch_array($result);
             array_push($name,$row1[1]);
             }
             $_SESSION['name']=$name;
             $useroles=$_SESSION['name'];
             $ret=mysqli_query($conn,"select count(id) as id1 from tblcategory");
 $row1=mysqli_fetch_array($ret);  

$ret=mysqli_query($conn,"select count(id) as id2 from tblpass");
 $row2=mysqli_fetch_array($ret);

 $ret=mysqli_query($conn,"SELECT count(id) as id3 from tblpass where date(PasscreationDate)=CURDATE()");
 $row3=mysqli_fetch_array($ret); 
 $ret=mysqli_query($conn,"SELECT count(id) as id4 from tblpass where date(PasscreationDate)=CURDATE()-1");
 $row4=mysqli_fetch_array($ret);

 $ret=mysqli_query($conn,"SELECT count(id) as id5 from tblpass where date(PasscreationDate)=CURDATE()");
 $row5=mysqli_fetch_array($ret);   


 ?>   


<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper full-calender">
<div class="page-body">
<div class="row">
<?php
$sql_manage = "select * from manage_website"; 
$result_manage = $conn->query($sql_manage);
$row_manage = mysqli_fetch_array($result_manage);
?>

<?php if(isset($useroles)){  if(in_array("clients_statistics",$useroles)){ ?>
<div class="col-xl-3 col-md-6">
<div class="card bg-c-green update-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">

<h4 class="text-white"><?php echo $row1['id1']; ?></h4>
<h6 class="text-white m-b-0"><a href="category.php" style="color:white;">Total Category</a></h6>
</div>
<div class="col-4 text-right">
<canvas id="update-chart-2" height="50"></canvas>
</div>
</div>
</div>
</div>
</div>
<?php } } ?> 

<?php if(isset($useroles)){  if(in_array("invoices_statistics",$useroles)){ ?>
<div class="col-xl-3 col-md-6">
<div class="card bg-c-pink update-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">

<h4 class="text-white"><?php echo $row2['id2']; ?></h4>
<h6 class="text-white m-b-0"><a href="pass.php" style="color:white;">Total Pass</a></h6>
</div>
<div class="col-4 text-right">
<canvas id="update-chart-3" height="50"></canvas>
</div>
</div>
</div>
</div>
</div>
<?php } } ?> 



<div class="col-xl-3 col-md-6">
<div class="card bg-c-lite-green update-card">
<div class="card-block">
<div class="row align-items-end"> 
<div class="col-8">

<h4 class="text-white"><?php echo $row3['id3']; ?></h4>
<h6 class="text-white m-b-0"><a href="todayspass.php" style="color:white;">Pass Created Today</a></h6>
</div>
<div class="col-4 text-right">
<canvas id="update-chart-4" height="50"></canvas>
</div>
</div>
</div>
</div>
</div>



<?php if(isset($useroles)){  if(in_array("repairs_statistics",$useroles)){ ?>
<div class="col-xl-3 col-md-6">
<div class="card bg-c-yellow update-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">

<h4 class="text-white"><?php echo $row4['id4']; ?></h4>
<h6 class="text-white m-b-0"><a href="yesterdays-pass.php"style="color:white;">Pass Created Yesterday</a></h6>
 </div>
<div class="col-4 text-right">
<canvas id="update-chart-1" height="50"></canvas>
</div>
</div>
</div>
</div>
</div>
<?php } } ?> 
        
</div>
 

<div class="card col-md-12 ">
  
<div class="table-responsive dt-responsive m-t-50">

<table id="dom-jqry" class="table table-striped table-bordered nowrap">
<thead>
<tr>
<th>S.NO</th>
 <th>Pass Number</th>
<th>Full Name</th>
<th>Contact Number</th>
 <th>Email</th>
<th>Creation Date</th>
 
</tr>
</thead>
 <?php
                                $ret=mysqli_query($conn,"select *from  tblpass LIMIT 5");
                                $cnt=1;
                                while ($row=mysqli_fetch_array($ret)) {
                                ?> 
<tbody>
  <td><?php  echo $row['id'];?></td>
            <td><?php  echo $row['PassNumber'];?></td>
           <td><?php  echo $row['FullName'];?></td>
            <td><?php  echo $row['ContactNumber'];?></td>
            <td><?php  echo $row['Email'];?></td>
            <td><?php  echo $row['PasscreationDate'];?></td>
     

 <?php 
                                $cnt=$cnt+1;
                                }?>
                                </tbody>
                                
</table>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<?php include("footer.php"); ?>

