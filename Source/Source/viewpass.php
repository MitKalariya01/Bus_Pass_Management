
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
<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=500,height=500');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>View Pass</h4>


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
<li class="breadcrumb-item"><a href="pass.php">View Pass</a>
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
   <div class="card-body">
     <div class="row" id="divToPrint">
    <?php
                          $cid=$_GET['viewid'];
                          $ret=mysqli_query($conn,"select * from tblpass where id='$cid'");
                          $cnt=1;
                          while ($row=mysqli_fetch_array($ret)) {

                          ?>   
<table id="dom-jqry" class="table  table-bordered nowrap">

                                    <tr align="center">
<td colspan="6" style="font-size:20px;color:blue">
 Pass ID: <?php  echo $row['PassNumber'];?></td></tr>
   <tr>
        <th scope>Category</th>
    <td colspan="3"><?php  echo $row['Category'];?></td>
  </tr>

  <tr>
    <th scope>Full Name</th>
    <td colspan="3"><?php  echo $row['FullName'];?></td>
  </tr>

  <tr>
    <th scope>Mobile Number</th>
    <td><?php  echo $row['ContactNumber'];?></td>
    <th scope>Email</th>
    <td><?php  echo $row['Email'];?></td>
  </tr>
<tr>
    <th scope>Identity Type</th>
    <td><?php  echo $row['IdentityType'];?></td>
    <th scope>Identity Card Number</th>
    <td><?php  echo $row['IdentityCardno'];?></td>

  </tr>
<tr>
    <th scope>From Date</th>
    <td><?php  echo $row['FromDate'];?></td>
    <th scope>To Date</th>
    <td><?php  echo $row['ToDate'];?></td>
  </tr>
  <tr>
    <th scope>Pass Creation Date</th>
    <td colspan="3"><?php  echo $row['PasscreationDate'];?></td>
  </tr>
                                    
      </table>
   <!-- <p style="text-align:center;font-size: 20px;color: red">
  <input type="button" value="print" onclick="PrintDiv();" /></p> -->
   <div class="col-lg-12" style="text-align:center">
      <button type="button" class="btn btn-primary m-b-0" value="print" onclick="PrintDiv();">print</button>
    </div>
 
    

</div>
</div>
<?php
}
?>
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
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
     <?php echo "<script>setTimeout(\"location.href = 'pass.php';\",1500);</script>"; ?>
      <!-- <button class="button button--success" data-for="js_success-popup">Close</button> -->
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
     <?php echo "<script>setTimeout(\"location.href = 'pass.php';\",1500);</script>"; ?>
     <!--  <button class="button button--error" data-for="js_error-popup">Close</button> -->
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>