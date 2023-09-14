<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');
                
?>    

<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>Verification Details</h4>


</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href=""> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Verification</a>
</li>
<li class="breadcrumb-item"><a href="Verificationpass.php">Verification</a>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="page-body">

<div class="card">
<div class="card-block">
<form role="form" method="post">

    <div class="form-group row">
        <label class="col-lg-3">Verification by Pass Number/Mobile Number</label>
        <input type="text" class="form-control col-lg-3" id="Verificationdata"  name="Verificationdata" placeholder="Verification" required="true">
        
        <br>
    </div>
        <div class="col-lg-12">
      <button type="submit" name="Verification" class="btn btn-primary m-b-0">Verification</button>
    </div>
</form>
</div>
                    
                            <div class="card-block">

<div class="table-responsive dt-responsive">
                                 <?php

if(isset($_POST['Verification']))
{ 

$sdata=$_POST['Verificationdata'];
  ?>
  <h4 align="center">Verification against "<?php echo $sdata;?>" keyword </h4>
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
$sql="SELECT * from tblpass where PassNumber like '$sdata%'|| ContactNumber like '$sdata%'";
$result = $conn->query($sql);
    $i=1;
      while($row = $result->fetch_assoc()) {

              ?>
                                                           <tr>
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
               <?php 
            
           } 
            
   

 
}
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
 
<?php include("footer.php"); ?>