<?php
include_once "../index.php";
include_once "../nav.php";
$msg=null;

// echo $id;
if(isset($_GET["ID"])){
    $id=$_GET["ID"];
$selectDepartment="SELECT * FROM `department` WHERE `id`= $id";
$Department = mysqli_query($conn,$selectDepartment);
$departmentData = mysqli_fetch_assoc($Department);
// print_r($departmentData);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title=$_POST["DT"];
    $updateDocuments="UPDATE `department` SET `title` = '$title' WHERE `id` = $id";
    $Department = mysqli_query($conn,$updateDocuments);
    header("Location:http://localhost/backend%20project/collage/E&D department.php?ID=$id");
    $msg="Edited Successfully";
}

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
    <h1 class="text-center display-6 my-4 fw-bold">Show Departments

<a href="department.php" class="btn btn-dark float-end">View Departments</a>
</h1>
<div class="card shadow p-4 bg-dark text-light">
<h2 class="text-center"><?=$departmentData["title"] ?>
</h2>
</div>
<form action="" method="post">
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label mt-5">Edit Department</label>
    <input type="text" class="form-control" name="DT" value="<?=$departmentData["title"]?>">
    </div>
    <button type="submit" class="btn btn-primary" name="Sub">Edit</button>
    </button>


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