<?php
include_once "../index.php";
include_once "../navadd.php";
$msg=null;
if(isset($_POST["Sub"])){
    if($_SERVER['REQUEST_METHOD']){
    $IN=$_POST['IN'];
    $EI=$_POST['EI'];
    $HI=$_POST['HI'];
    $DI=$_POST['select'];
$insertinstructor="INSERT INTO `instructor` (`ename`,`email`,`hire_date`,department_id)VALUES('$IN','$EI','$HI',$DI) ";
$instructors = mysqli_query($conn,$insertinstructor);
}
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
    <h1 class="text-center display-6 my-4 fw-bold">Add Instructor

<a href="instructor.php" class="btn btn-dark float-end">View Instructors</a>
</h1>
<form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Name</label>
    <input type="text" class="form-control" name="IN">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="Email" class="form-control" name="EI">
    <label for="exampleInputPassword1" class="form-label">Hire Date</label>
    <input type="date" class="form-control" name="HI">
    <label for="exampleInputPassword1" class="form-label">Departments</label>
    <select name="select">
    <?php foreach($ddd as $Dep) :?>
    <option value="<?=$Dep["id"]?>"><?=$Dep["title"]?></option>
    <?php
    endforeach
    ?>
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