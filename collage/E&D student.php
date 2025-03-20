<?php
include_once "../index.php";
include_once "../nav.php";
$msg=null;


// echo $id;
if(isset($_GET["ID"])){
    $id=$_GET["ID"];
$selectinstructors="SELECT * FROM `student` WHERE id = $id";
$instructor = mysqli_query($conn,$selectinstructors);
$instructorData = mysqli_fetch_assoc($instructor);

$department_id = $instructorData['department_id'];
$Departmentselect="SELECT * FROM `department`WHERE `id`= $department_id ";
$qDepartment=mysqli_query($conn,$Departmentselect);
$qd=mysqli_fetch_assoc($qDepartment);

// print_r($departmentData);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $NN=$_POST["NN"];
    $NE=$_POST["NE"];
    $NH=$_POST["NH"];
    $NS=$_POST["selmnue"];
    // $name=$_POST["NN"];
    $updateStudents="UPDATE `student` SET `name` = '$NN',`email` = '$NE',`date_of_birth`= '$NH', department_id ='$NS' WHERE `id` = $id";
    $studentup = mysqli_query($conn,$updateStudents);
    header("Location:http://localhost/backend%20project/collage/E&D%20student.php?ID=$id");
}
$msg="Edited Successfully";

$dd="SELECT * FROM `department`";
$ddd=mysqli_query($conn,$dd);
// $dddd=mysqli_fetch_assoc($ddd);
// print_r($dddd);
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
    <h1 class="text-center display-6 my-4 fw-bold">Show student

<a href="student.php" class="btn btn-dark float-end">View student</a>
</h1>
<div class="card shadow p-4 bg-dark text-light">
<h2 class="text-start display-6 my-4 fw-bold back-dark">
    <?=$instructorData["name"] ?><br>
    <?=$instructorData["email"] ?><br>
    <?=$instructorData["date_of_birth"] ?><br>
    <?=$qd["title"] ?><br>
    </h2>
</div>
<form action="" method="POST">
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"> Name</label>
    <input type="text" class="form-control" name="NN" value ="<?=$instructorData['name'];?>">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="text" class="form-control" name="NE"  value="<?=$instructorData['email'];?>">
    <label for="exampleInputPassword1" class="form-label">Date Of Birth</label>
    <input type="text" class="form-control" name="NH" value="<?=$instructorData['date_of_birth'];?>">
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
<?php 
 if($msg != null){
?>
<div class="alert alert-success">
    <h5><?php 
    echo $msg;?></h5>
</div>
<?php 
} 
?>
<br>

</body>
</html>
</body>
</html>
