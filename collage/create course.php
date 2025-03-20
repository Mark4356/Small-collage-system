<?php
include_once "../index.php";
include_once "../navadd.php";
$msg=null;
if(isset($_POST["Sub"])){
    $title=$_POST['CT'];
    $credit=$_POST['CC'];
    $CIC=$_POST['CI'];
    $DID=$_POST['CD'];
$insertCourse="INSERT INTO `course` (`title`, credit,instructor_id,department_id)VALUES('$title',$credit,$CIC,$DID) ";
$Courses = mysqli_query($conn,$insertCourse);
$msg="Added Successfully";
}
// var_dump($Departments);
// foreach($Departments as $Department)
    // print_r($Department);
    // echo"<hr>";
// :
$ll="SELECT * FROM `instructor`";
$lll=mysqli_query($conn,$ll);

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
    <h1 class="text-center display-6 my-4 fw-bold">Add Courses
<a href="course.php" class="btn btn-dark float-end">View Course</a>
</h1>
<form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Title of Course</label>
    <input type="text" class="form-control" name="CT">
    <label for="exampleInputPassword1" class="form-label">Credit of Course</label>
    <input type="number" class="form-control" name="CC" min="0">
    <label for="exampleInputPassword1" class="form-label">Instructor ID</label>
    <select name="CI">
        <?php foreach($lll as $l):?>
        <option value="<?=$l["id"]?>"><?= $l["ename"]?></option>
        <?php endforeach?>
    </select><br>
    <label for="exampleInputPassword1" class="form-label">Department ID</label>
    <select name="CD">
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