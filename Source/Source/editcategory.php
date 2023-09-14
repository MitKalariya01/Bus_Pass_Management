<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');
if(isset($_POST['submit']))
    {

      $pet_em=$_POST['catname'];
      //echo $pet_em;exit;
      $checkeml="SELECT CategoryName from tblcategory where CategoryName ='$pet_em'";
        $result = $conn->query($checkeml);
        $row1=mysqli_fetch_array($result);
       //print_r($pet_em);exit;
        if($row1['CategoryName']==$pet_em)
        {
        $emlduperr = '<br/ ><div style="font-size:20px;color:red;" align="center;">The Category Name you entered is already in use!</div>';
      }
      else
      {
         $catname=$_POST['catname'];
    $eid=$_GET['editid'];
    
        $query=mysqli_query($conn, "update tblcategory set CategoryName='$catname',updated_on= CURDATE() where id='$eid'");
        if ($query) {
         $_SESSION['success']=' Record Updated Successfully';
        echo "<script>window.location.href ='category.php'</script>";
          }
    else
        {
        
        $_SESSION['error']='The Category Name you entered is already in use';
        echo '<script>window.location="$_SERVER["HTTP_REFERER"]"</script>';
        }
      }
        //$aid=$_SESSION['vpmsaid'];
       

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
<?php
                                    $cid=$_GET['editid'];
                                    $ret=mysqli_query($conn,"select * from  tblcategory where id='$cid'");
                                    $cnt=1;
                                    while ($row=mysqli_fetch_array($ret)) {

                                    ?>
    <div class="form-group row">
        <label class="col-lg-2">Category</label>
        <input type="text" class="form-control col-lg-6" name="catname" value="<?php  echo $row['CategoryName'];?>" required="true">
        
        <br>
    </div>
     <?php } ?>
      <script type="text/javascript">
       document.write('<?php echo $emlduperr; ?>');
      </script>
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