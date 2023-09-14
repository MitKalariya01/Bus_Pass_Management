<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');


 if(isset($_POST['submit']))
    {
         $catname=$_POST['catname'];
       
        $sql="insert into tblcategory(CategoryName) value('$catname')";
        //$query=$conn->query($sql);
         $last_id =  mysqli_insert_id($conn);
        $id=$last_id;
        if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="category.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="category.php";
</script>
<?php } 
 }
                           
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
<h4>Add Category</h4>


</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href=""> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Category</a>
</li>
<li class="breadcrumb-item"><a href="addcategory">Add Category</a>
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
        <label class="col-lg-2">Category</label>
        <input type="text" class="form-control col-lg-6" name="catname" placeholder="Enter Category Name" required="true">
        
        <br>
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