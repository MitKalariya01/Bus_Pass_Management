
<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');?>
<?php
if(isset($_GET['id']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Sure
    </h1>
    <p>Are You Sure To Delete This Record?</p>
    <p>
      <a href="del_roles.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
      <a href="view_roles.php" class="button button--error" data-for="js_success-popup">No</a>
    </p>
  </div>
</div>
<?php } ?>
<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>Yesterday Pass</h4>


</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="dashboard.php"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Manage Pass</a>
</li>
<li class="breadcrumb-item"><a href="pass.php">Yesterday Pass</a>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="page-body">

<div class="card">
<div class="card-header">
    <div class="col-sm-10">
        <a href="pass.php"><button class="btn btn-primary pull-right">Back</button></a>
    </div>

</div>
<div class="card-block">

<div class="table-responsive dt-responsive">
<table id="dom-jqry" class="table table-striped table-bordered nowrap">
<thead>
<tr>
<th>S.NO</th>
 <th>Pass Number</th>
<th>Full Name</th>
<th>Contact Number</th>
 <th>Email</th>
<th>Creation Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
  
    $sql="SELECT * from tblpass where date(PasscreationDate)=CURDATE()-1";
    $result = $conn->query($sql);
    $i=1;
      while($row = $result->fetch_assoc()) {
      //print_r($row) 
              
      ?>
        <tr>
          <!-- <td><?php echo $i;?></td> -->
           
           <td><?php  echo $row['id'];?></td>
            <td><?php  echo $row['PassNumber'];?></td>
           <td><?php  echo $row['FullName'];?></td>
            <td><?php  echo $row['ContactNumber'];?></td>
            <td><?php  echo $row['Email'];?></td>
            <td><?php  echo $row['PasscreationDate'];?></td>
            <td>
                <a href="editpass.php?editid=<?=$row['id'];?>"class="btn btn-xs btn-primary"><i class="feather icon-edit m-t-10 f-16 " ></i></a>
                 <a href="viewpass.php?viewid=<?=$row['id'];?>"class="btn btn-xs btn-danger"><i class="feather icon-edit m-t-10 f-16 " ></i></a>
                
            </td>
        </tr>
    <?php  $i++;} 
?>

</tbody>
</table>
</div>
</div>
</div>


</div>

</div>
</div>

<div id="#">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
 <!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include("footer.php"); ?>
