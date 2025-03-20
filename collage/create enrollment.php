<?php
include_once "../index.php";
include_once "../navadd.php";
$msg=null;
if(isset($_POST["Sub"])){
    $SE=$_POST['CDD'];
    $CE=$_POST['CD'];
    $EE=$_POST['EE'];
    $EG=$_POST['EG'];
$insertDepartment="INSERT INTO `enrollment` (student_id,course_id,`enrollment_date`,`grad`)VALUES('$SE','$CE','$EE','$EG') ";
$Departments = mysqli_query($conn,$insertDepartment);
$msg="Added Successfully";
}
// var_dump($Departments);
// foreach($Departments as $Department)
    // print_r($Department);
    // echo"<hr>";
// :
$ss="SELECT * FROM `student`";
$sss=mysqli_query($conn,$ss);

$dd="SELECT * FROM `course`";
$ddd=mysqli_query($conn,$dd);
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
    <h1 class="text-center display-6 my-4 fw-bold">Add Enlollment

<a href="enrollment.php" class="btn btn-dark float-end">View Enrollment</a>
</h1>
<form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Student ID</label>
    <select name="CDD">
        <?php foreach($sss as $s):?>
        <option value="<?=$s["id"]?>"><?= $s["name"]?></option>
        <?php endforeach?>
    </select><br>
    <label for="exampleInputPassword1" class="form-label">Course ID</label>
    <select name="CD">
        <?php foreach($ddd as $d):?>
        <option value="<?=$d["id"]?>"><?= $d["title"]?></option>
        <?php endforeach?>
    </select><br>
    <label for="exampleInputPassword1" class="form-label">Enrollment Date</label>
    <input type="Date" class="form-control" name="EE" min="1">
    <label for="exampleInputPassword1" class="form-label">Grad</label>
    <input type="text" class="form-control" name="EG" min="0">
  </div>
  <button type="submit" class="btn btn-primary" name="Sub">Submit</button>
</form>
<?php  if($msg != null){ ?>
<div class="alert alert-success">
    <h5><?php 
        header("Refresh: 1; url=http://localhost/backend%20project/collage/enrollment.php");

    echo $msg;?></h5>
</div>
<?php } ?>
    </div>
            </section>


</body>
</html>