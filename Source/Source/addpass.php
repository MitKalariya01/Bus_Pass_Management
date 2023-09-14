<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');
if(isset($_POST['submit']))
 {
         $fname=$_POST['fullname'];
$cnum=$_POST['cnumber'];
$email=$_POST['email'];
$itype=$_POST['identitytype'];
$icnum=$_POST['icnum'];
$cat=$_POST['category'];
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
$passnum=mt_rand(100000000, 999999999);
       
   $sqlp="insert into tblpass(PassNumber,FullName,ContactNumber,Email,IdentityType,IdentityCardno,Category,FromDate,ToDate) value('$passnum','$fname','$cnum','$email','$itype','$icnum','$cat','$fdate','$tdate')";
        //$query=$conn->query($sql);
 echo $sqlp;
        
        if ($conn->query($sqlp)) {
        	//echo"23";exit;
      $_SESSION['success']='Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="pass.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script>
window.location="$_SERVER["HTTP_REFERER"]";
</script>
<?php } 
 }
                           
?>    
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>Add Pass</h4>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="dashboard.php"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Add Pass</a>
</li>
<li class="breadcrumb-item"><a href="addpass.php">Add Pass</a>
</li>
</ul>
</div>
</div>
</div>
</div>


<div class="page-body">
<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
</div>
<div class="card-block">
<form id="main" method="post" enctype="multipart/form-data">

<div class="form-group row">
<label class="col-sm-2 col-form-label">Full Name</label>
<div class="col-sm-4">
<input type="text" class="form-control"  name="fullname" placeholder="Full Name" required="">
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">Contact Number</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="cnumber"  maxlength="10" pattern="[0-9]+"  placeholder="Contact Number" required="">
<span class="messages"></span>
</div>
</div>




<div class="form-group row">
<label class="col-sm-2 col-form-label">Email Address</label>
<div class="col-sm-4">
<input type="email" class="form-control"  name="email"  placeholder="Email Address"  required="">
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">Identity Type</label>
<div class="col-sm-4">
<select type="text" name="identitytype" value="" class="form-control" required='true'>
<option value="">Choose Identity Type</option>
<option value="Voter Card">Voter Card</option>
<option value="PAN Card">PAN Card</option>
<option value="Adhar Card">Adhar Card</option>
<option value="Student Card">Student Card</option>
<option value="Driving License">Driving License</option>
<option value="Passport">Passport</option>
<option value="Any Official Card">Any Official Card</option>
<option value="Any Other Govt Issued Doc">Any Other Govt Issued Doc</option>
     </select>
<span class="messages"></span>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label">Identity Card No.</label>
<div class="col-sm-4">
<input type="text" name="icnum" class="form-control" placeholder="Identity Card No." required="true" >
<span class="messages"></span>
</div>

<label class="col-sm-2 col-form-label">Category</label>
<div class="col-sm-4">
<select type="text" name="category" value="" class="form-control" required='true'>
<option value="0">Select Category</option>
<?php $query=mysqli_query($conn,"select * from tblcategory");
while($row=mysqli_fetch_array($query))
{
  ?>    
 <option value="<?php echo $row['CategoryName'];?>"><?php echo $row['CategoryName'];?></option>
 <?php } ?>
</select>
<span class="messages"></span>
</div>

</div>
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

<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" name="submit" class="btn btn-primary m-b-0">Submit</button>
</div>
</div>

</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include("footer.php"); ?>