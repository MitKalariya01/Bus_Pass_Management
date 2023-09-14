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
<h4>Between Dates Reports</h4>


</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href=""> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Report of Pass</a>
</li>
<li class="breadcrumb-item"><a href="addcategory">Between Dates Reports</a>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="page-body">

<div class="card">
<div class="card-block">
<form role="form" method="post" action="pass-bwdates-reports-details.php">

    <div class="form-group row">
<label class="col-sm-2 col-form-label">From Date</label>
<div class="col-sm-4">
<input type="date" class="form-control"  name="fromdate" placeholder="From Date" required="">
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">To Date</label>
<div class="col-sm-4">
<input type="date" class="form-control" name="todate"   placeholder="To Date" required="">
<span class="messages"></span>
</div>
</div>
        <div class="col-lg-12">
      <button type="submit" name="submit" class="btn btn-primary m-b-0">Submit</button>
    </div>
</form>
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