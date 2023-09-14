 <?php 
 include('connect.php');
  $sql = "select * from admin where id = '".$_SESSION["id"]."'";
        $result=$conn->query($sql);
        $ro=mysqli_fetch_array($result);
       
            $q = "select * from tbl_permission_role where role_id='".$ro['role_id']."'";
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

 ?>


<div class="pcoded-main-container">
<div class="pcoded-wrapper">
<nav class="pcoded-navbar">
<div class="pcoded-inner-navbar main-menu">
<div class="pcoded-navigatio-lavel">Navigation</div>
<ul class="pcoded-item pcoded-left-item">
    <?php if(isset($useroles)){  if(in_array("dashboard",$useroles)){ ?>
<li class="">
<a href="index.php">
<span class="pcoded-micon"><i class="feather icon-home"></i></span>
<span class="pcoded-mtext">Dashboard</span>
</a>
</li>
<?php } } ?> 

<?php if(isset($useroles)){  if(in_array("users",$useroles)){ ?>
<li class="pcoded-hasmenu">
<a href="#">
<span class="pcoded-micon"><i class="feather icon-grid"></i></span>
<span class="pcoded-mtext">Category</span>
</a>
<ul class="pcoded-submenu">
   


<?php if(isset($useroles)){  if(in_array("manage_roles",$useroles)){ ?>
<li class="">
<a href="addcategory.php">
<span class="pcoded-mtext">Add Category</span>
</a>
</li>
<?php } } ?>
<?php if(isset($useroles)){  if(in_array("create_user",$useroles)){ ?>
<li class="">
<a href="category.php">
<span class="pcoded-mtext">Manage Category</span>
</a>
</li>
<?php } } ?>
</ul>
</li>
<?php } } ?>
<?php if(isset($useroles)){  if(in_array("users",$useroles)){ ?>
<li class="pcoded-hasmenu">
<a href="#">
<span class="pcoded-micon"><i class="feather icon-image"></i></span>
<span class="pcoded-mtext">Bus Pass</span>
</a>
<ul class="pcoded-submenu">
   


<?php if(isset($useroles)){  if(in_array("manage_roles",$useroles)){ ?>
<li class="">
<a href="addpass.php">
<span class="pcoded-mtext">Add Pass</span>
</a>
</li>
<?php } } ?>
<?php if(isset($useroles)){  if(in_array("create_user",$useroles)){ ?>
<li class="">
<a href="pass.php">
<span class="pcoded-mtext">Manage Pass</span>
</a>
</li>
<?php } } ?>
</ul>
</li>
<?php } } ?>

<?php if(isset($useroles)){  if(in_array("settings",$useroles)){ ?>
<li class="">
<a href="searchpass.php">
<span class="pcoded-micon"><i class="feather icon-search"></i></span>
<span class="pcoded-mtext">Verification</span>
</a>
</li>
<?php } } ?>
<?php if(isset($useroles)){  if(in_array("settings",$useroles)){ ?>
<li class="">
<a href="pass-bwdates-report.php">
<span class="pcoded-micon"><i class="feather icon-folder"></i></span>
<span class="pcoded-mtext">Reports</span>
</a>
</li>
<?php } } ?>

<?php if(isset($useroles)){  if(in_array("users",$useroles)){ ?>
<li class="pcoded-hasmenu">
<a href="javascript:void(0)">
<span class="pcoded-micon"><i class="feather icon-user"></i></span>
<span class="pcoded-mtext">Users</span>
</a>
<ul class="pcoded-submenu">
   
   
<?php if(isset($useroles)){  if(in_array("create_user",$useroles)){ ?>
<li class="">
<a href="view_user.php">
<span class="pcoded-mtext">New User</span>
</a>
</li>
<?php } } ?>
</ul>

</li>
<?php } } ?>

<li class="">
<a href="about.php" aria-expanded="false">
<span class="pcoded-micon"><i class="fa fa-info-circle"></i></span>
<span class="pcoded-mtext">About Author!</span>
</a>
</li>


<?php if(isset($useroles)){  if(in_array("settings",$useroles)){ ?>
<li class="">
<a href="setting.php">
<span class="pcoded-micon"><i class="feather icon-settings"></i></span>
<span class="pcoded-mtext">Settings</span>
</a>
</li>
<?php } } ?>

<?php if(isset($useroles)){  if(in_array("settings",$useroles)){ ?>
<li class="">
<a href="logout.php">
    <span class="pcoded-micon"><i class="feather icon-log-out"></i></span>
<span class="pcoded-mtext"></i> Logout</span>
</a>
</li>
<?php } } ?>
</ul>
</div>
</nav>

