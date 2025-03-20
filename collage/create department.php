<?php
include_once "../index.php";
include_once "../navadd.php";
$msg=null;
if(isset($_POST["Sub"])){
    $title=$_POST['DT'];
$insertDepartment="INSERT INTO `department` (`title`)VALUES('$title') ";
$Departments = mysqli_query($conn,$insertDepartment);
$msg="Added Successfully";
}
// var_dump($Departments);
// foreach($Departments as $Department)
    // print_r($Department);
    // echo"<hr>";
// :
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <section id="list-department">
    <div class="container col-md-10">
    <h1 class="text-center display-6 my-4 fw-bold">Add Departments

<a href="department.php" class="btn btn-dark float-end">View Department</a>
</h1>
<form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Title of Department</label>
    <input type="text" class="form-control" name="DT">
  </div>
  <button type="submit" class="btn btn-primary" name="Sub">Submit</button>
</form>
<?php  if($msg != null){ ?>
<div class="alert alert-success">
    <h5><?php echo $msg;?></h5>
</div>
<?php } ?>
    </div>
            </section>


</body>
</html>