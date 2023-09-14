<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');?>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
 <?php
 include('connect.php');
if(isset($_POST["btn_submit"]))
{
  extract($_POST);

  if($_FILES['image']['name']!=''){
      $file_name = $_FILES['image']['name'];
      $file_type = $_FILES['image']['type'];
      $file_size = $_FILES['image']['size'];
      $file_tem_loc = $_FILES['image']['tmp_name'];
      $file_store = "uploadImage/Profile/".$file_name;

      if (move_uploaded_file($file_tem_loc, $file_store)) {
        echo "file uploaded successfully";
      }
  }
  else{
    $file_name=$_POST['old_image'];
  } 
      $folder = "uploadImage/Profile/";

      if (is_dir($folder)) 
      {
         if ($open = opendir($folder))

          while (($image=readdir($open)) !=false) {
              
              if($image=='.'|| $image=="..") continue;

              echo '<img src="uploadImage/Profile/'.$image.'" width="150" height="150">';
          }

          closedir($open);
        } 
   $q1="UPDATE `admin` SET `fname`='$fname',`lname`='$lname',`email`='$email',`addr`='$addr',`notes`='$notes',`gender`='$gender',`dob`='$dob',`contact`='$contact' ,`image`='".$file_name."',`role_id`='$role_id', `updated_on`= CURDATE() WHERE `id`='".$_GET['id']."'";
  //$query1=$conn->query($q1);

    if ($conn->query($q1) === TRUE) {
   
      $_SESSION['success']='Record Successfully Updated';
      ?>
<script type="text/javascript">
window.location="view_user.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_user.php";
</script>
<?php
}
}

?>

<?php
$que="select * from admin where id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
    //print_r($row);
    extract($row);
$fname = $row['fname'];
$lname = $row['lname'];
$email = $row['email'];
$addr = $row['addr'];
$gender = $row['gender'];
$contact = $row['contact'];
$dob = $row['dob'];
$image = $row['image'];
$updated_on = $row['updated_on'];
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
<h4>Edit User</h4>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="dashboard.php"> <i class="feather icon-home"></i> </a>
<li class="breadcrumb-item"><a>Users</a>
</li>
<li class="breadcrumb-item"><a href="edit_user.php">Edit User</a>
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
<input type="hidden" name="current_date" class="form-control" value="<?php echo $current_date;?>">
<div class="form-group row">
<label class="col-sm-2 col-form-label">First Name</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="fname" id="name" value="<?php echo $fname; ?>">
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">Last Name</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="name" name="lname" value="<?php echo $lname; ?>">
<span class="messages"></span>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Gender</label>
<div class="col-sm-4">
<select type="text" class="form-control" id="gender" name="gender" required="">
<option value="">--Select Gender--</option>
<option value="Male" <?php if($gender=='Male'){ echo "Selected";}?>>Male</option>
<option value="Female"<?php if($gender=='Female'){ echo "Selected";}?>>Female</option>
</select>
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">Phone</label>
<div class="col-sm-4">
<input type="tel" class="form-control" id="contact" name="contact" value="<?php echo $contact; ?>" minlength="10" maxlength="10" pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$">
<span class="messages"></span>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Email</label>
<div class="col-sm-4">
<input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">Role</label>
<div class="col-sm-4">
<select class="form-control" id="role_id" name="role_id" required="">
    <option value="">--Select Role--</option>
        <?php  
            $c1 = "SELECT * FROM `tbl_role` ";
            $result = $conn->query($c1);

            if ($result->num_rows > 0) {
              while ($row = mysqli_fetch_array($result)) {?>
                <option value="<?php echo $row["id"];?>"<?php if($row['id']==$role_id){echo "selected";}?>>
                    <?php echo $row['role_name'];?>
                </option>
                <?php
              }
            } else {
                    echo "0 results";
            }
        ?>
</select>
<span class="messages"></span>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Address</label>
<div class="col-sm-10">
  <textarea name="addr"><?php echo $addr; ?></textarea>
                <script>
                        CKEDITOR.replace( 'addr' );
                </script>
<span class="messages"></span>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label">Notes</label>
<div class="col-sm-10">
  <textarea name="notes"><?php echo $notes; ?></textarea>
                <script>
                        CKEDITOR.replace( 'notes' );
                </script>
<span class="messages"></span>
</div>
</div>


<div class="form-group row">
  <label class="col-sm-2 col-form-label">Date Of Birth</label>
<div class="col-sm-4">
<input type="date" class="form-control" name="dob" id="dob" value="<?php echo $dob; ?>" required="">
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">Image</label>
<div class="col-sm-4">
<input type="file" class="form-control" name="image"><span class="messages"></span>
<img src="uploadImage/Profile/<?php echo $image; ?>" style="width: 200px;height: 200px;">
<input type="hidden" value="<?php echo $image;?>"  name="old_image">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" name="btn_submit" class="btn btn-primary m-b-0">Submit</button>
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
