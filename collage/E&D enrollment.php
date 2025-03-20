<?php
include_once "../index.php";
include_once "../nav.php";
$msg=null;


// echo $id;
if(isset($_GET["ID"])){
    $id=$_GET["ID"];
$selectDepartment="SELECT * FROM `enrollment` WHERE `id`= $id";
$Department = mysqli_query($conn,$selectDepartment);
$departmentData = mysqli_fetch_assoc($Department);
// print_r($departmentData);
$instructor_id_d = $departmentData['student_id'];
$instructorselect_D="SELECT * FROM `student`WHERE `id`= $instructor_id_d ";
$qDepartment_D=mysqli_query($conn,$instructorselect_D);
$qdd=mysqli_fetch_assoc($qDepartment_D);

$instructor_id = $departmentData['course_id'];
$instructorselect="SELECT * FROM `course`WHERE `id`= $instructor_id ";
$qDepartment=mysqli_query($conn,$instructorselect);
$qqdd=mysqli_fetch_assoc($qDepartment);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $NN=$_POST["NN"];
    $NE=$_POST["NE"];
    $NH=$_POST["NH"];
    $NS=$_POST["selmnue"];
    // $name=$_POST["NN"];
    $updateStudents="UPDATE `enrollment` SET student_id = '$NN',course_id = '$NE',enrollment_date = '$NH', `grad` ='$NS' WHERE `id` = $id";
    $studentup = mysqli_query($conn,$updateStudents);
    header("Location:http://localhost/backend%20project/collage/E&D%20enrollment.php?ID=$id");
}
$msg="Edited";
$ss="SELECT * FROM `student`";
$sss=mysqli_query($conn,$ss);

$dd="SELECT * FROM `course`";
$ddd=mysqli_query($conn,$dd);
}
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
    <h1 class="text-center display-6 my-4 fw-bold">Show Enrollments

<a href="enrollment.php" class="btn btn-dark float-end">View Enrollments</a>
</h1>
<div class="card shadow p-4 bg-dark text-light">
<h2 class="text-start display-6 my-4 fw-bold back-dark">
<?=$qdd["name"] ?><br>
<?=$qqdd["title"] ?><br>
<?=$departmentData["enrollment_date"] ?>
<br>
<?=$departmentData["grad"] ?>
</h2>
</div>
<form action="" method="post">
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Student ID</label>
    <select name="NN">
        <?php foreach($sss as $s):?>
        <option value="<?=$s["id"]?>"><?= $s["name"]?></option>
        <?php endforeach?>
    </select><br>
    <label for="exampleInputPassword1" class="form-label">Course ID</label>
    <select name="NE">
        <?php foreach($ddd as $d):?>
        <option value="<?=$d["id"]?>"><?= $d["title"]?></option>
        <?php endforeach?>
    </select><br>
    <label for="exampleInputPassword1" class="form-label">Enrollment Date</label>
    <input type="Date" class="form-control" name="NH" min="1">
    <label for="exampleInputPassword1" class="form-label">Grad</label>
    <input type="text" class="form-control" name="selmnue" min="0">
  </div>
  <button type="submit" class="btn btn-primary" name="Sub">Submit</button>
</form>
<?php  if($msg != null){ ?>
<div class="alert alert-success">
    <h5><?php echo $msg;?></h5>
</div>
<?php } ?>
    </div>
<!-- <?php 
    if($msg != null){
?>
<div class="alert alert-success">
    <h5><?php 
    echo $msg;?></h5>
</div>
<?php 
} 
?> -->
<br>

</body>
</html>
</body>
</html>