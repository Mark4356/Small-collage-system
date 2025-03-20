<?php
include_once "../index.php";
include_once "../navadd.php";
$msg=null;
if(isset($_POST["Sub"])){
    $NS=$_POST['NS'];
    $ES=$_POST['ES'];
    $DS=$_POST['DS'];
    $DSD=$_POST['DSD'];
$insertDepartment="INSERT INTO `student` (`name`,`email`,`date_of_birth`,department_id)VALUES('$NS','$ES','$DS','$DSD') ";
$Departments = mysqli_query($conn,$insertDepartment);
$msg="Added Successfully";
}
// var_dump($Departments);
// foreach($Departments as $Department)
    // print_r($Department);
    // echo"<hr>";
// :
$dd="SELECT * FROM `department`";
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
    <h1 class="text-center display-6 my-4 fw-bold">Add Student

<a href="student.php" class="btn btn-dark float-end">View Students</a>
</h1>
<form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Name</label>
    <input type="text" class="form-control" name="NS">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="Email" class="form-control" name="ES">
    <label for="exampleInputPassword1" class="form-label">Date Of Birth</label>
    <input type="date" class="form-control" name="DS">
    <label for="exampleInputPassword1" class="form-label">Department ID</label>
    <select name="DSD">
        <?php foreach($ddd as $d):?>
        <option value="<?=$d["id"]?>"><?= $d["title"]?></option>
            <?php endforeach?>
    </select>
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