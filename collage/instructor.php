<?php
include_once "../index.php";
include_once "../nav.php";
$count=0;
$selectinstructors="SELECT * FROM `instructor` ";
$instructors = mysqli_query($conn,$selectinstructors);
// var_dump($Departments);
// foreach($Departments as $Department)
    // print_r($Department);
    // echo"<hr>";
// :
if(isset($_GET['ID'])){
    $id=$_GET['ID'];
    $deleteinstructor="DELETE FROM `instructor` WHERE `id` = $id ";
    if(mysqli_query($conn,$deleteinstructor)){
    header("Location:http://localhost/backend%20project/collage/instructor.php");
    exit();
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

    <div class="container col-md-10">
    <h1 class="text-center display-6 my-4 fw-bold">List of Instructors
    <a href="create instructor.php" class="btn btn-dark float-end">Add Instructor</a>

    </h1>
        <div class="card shadow p-4">
    <table class="table table-dark table-striped">
    <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Hire Date</th>
            <th>Department ID</th>
            <th colspan="3">Show Instructors</th>
        </tr>
        <tbody>
            <?php foreach($instructors as $instructor) :?>
            <tr>
                <td><?= ++$count;?></td>
                <td><?= $instructor["ename"]?></td>
                <td><?= $instructor["email"]?></td>
                <td><?= $instructor["hire_date"]?></td>
                <td><?= $instructor["department_id"]?></td>
                <td><a href="E&D instructor.php?ID=<?=$instructor["id"]?>" ><i class="fa-solid fa-eye"></i></a></td>
                <td><a href="E&D instructor.php?ID=<?=$instructor["id"]?>"><i class="fa-solid fa-pen text-warning"></i></a>
                </td>
                <td><a href="http://localhost/backend%20project/collage/instructor.php?ID=<?=$instructor["id"]?>" onclick="return confirm('Are you sure you want to delete it')" name="dt">
                    <i class="fa-solid fa-trash text-danger"></i></a>
                </td>
            </tr>
            <?php
    endforeach
    ?>
        </tbody>
    </table>

        </div>
    </div>
</body>
</html>