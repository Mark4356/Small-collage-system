<?php
include_once "../index.php";
include_once "../nav.php";
$msg=null;


// echo $id;
if(isset($_GET["ID"])){
    $id=$_GET["ID"];
$selectDepartment="SELECT * FROM `course` WHERE `id`= $id";
$Department = mysqli_query($conn,$selectDepartment);
$departmentData = mysqli_fetch_assoc($Department);
// print_r($departmentData);
$department_id = $departmentData['department_id'];
$Departmentselect="SELECT * FROM `department`WHERE `id`= $department_id ";
$qDepartment=mysqli_query($conn,$Departmentselect);
$qd=mysqli_fetch_assoc($qDepartment);


$instructor_id = $departmentData['instructor_id'];
$instructorselect="SELECT * FROM `instructor`WHERE `id`= $instructor_id ";
$qDepartment=mysqli_query($conn,$instructorselect);
$qdd=mysqli_fetch_assoc($qDepartment);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $NN=$_POST["NN"];
    $NE=$_POST["NE"];
    $NH=$_POST["NH"];
    $NS=$_POST["selmnue"];
    // $name=$_POST["NN"];
    $updateStudents="UPDATE `course` SET `title` = '$NN',credit = '$NE',instructor_id = '$NH', department_id ='$NS' WHERE `id` = $id";
    $studentup = mysqli_query($conn,$updateStudents);
    header("Location:http://localhost/backend%20project/collage/E&D%20course.php?ID=$id");
}
$msg="Edited Successfully";

$ll="SELECT * FROM `instructor`";
$lll=mysqli_query($conn,$ll);

$dd="SELECT * FROM `department`";
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
    <h1 class="text-center display-6 my-4 fw-bold">Show Courses

<a href="course.php" class="btn btn-dark float-end">View Courses</a>
</h1>
<div class="card shadow p-4 bg-dark text-light">
<h2 class="text-start">
<?=$departmentData["title"] ?>
<br>
<?=$departmentData["credit"] ?>
<br>
<?=$qdd["ename"] ?>
<br>
<?=$qd["title"] ?>
</h2>
</div>
<form action="" method="POST">
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"> Title</label>
    <input type="text" class="form-control" name="NN" value ="<?=$departmentData["title"];?>">
    <label for="exampleInputPassword1" class="form-label">Cridet</label>
    <input type="number" class="form-control" name="NE"  value="<?=$departmentData["credit"];?>">
    <label for="exampleInputPassword1" class="form-label">Instructor ID</label>
    <select name="NH">
    <?php foreach($lll as $l) :?>
    <option value="<?=$l["id"]?>" name="DI">
        <?=$l['ename'];?>
</option>
    <?php
    endforeach
    ?>
    </select><br>
    <label for="exampleInputPassword1" class="form-label">Department ID</label>
    <select name="selmnue">
    <?php foreach($ddd as $department) :?>
    <option value="<?=$department["id"]?>" name="DI">
        <?=$department['title'];?>
</option>
    <?php
    endforeach
    ?>
    </select>
    </div>
    <button type="submit" class="btn btn-primary" name="Sub">Submit</button>
</form>
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