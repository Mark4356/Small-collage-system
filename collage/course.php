<?php
include_once "../index.php";
include_once "../nav.php";
$count=0;
$selectcourse="SELECT * FROM `course` ";
$courses = mysqli_query($conn,$selectcourse);
// var_dump($Departments);
// foreach($Departments as $Department)
    // print_r($Department);
    // echo"<hr>";
// :
if(isset($_GET['ID'])){
    $id=$_GET['ID'];
    $deletecourse="DELETE FROM `course` WHERE `id` = $id ";
    if(mysqli_query($conn,$deletecourse)){
    header("Location:http://localhost/backend%20project/collage/course.php");
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
    <h1 class="text-center display-6 my-4 fw-bold">List of Courses
    <a href="create course.php" class="btn btn-dark float-end">Add Course</a>

    </h1>
        <div class="card shadow p-4">
    <table class="table table-dark table-striped">
    <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Credit</th>
            <th>Instructor ID</th>
            <th>Department ID</th>
            <th colspan="3">Show Courses</th>
        </tr>
        <tbody>
            <?php foreach($courses as $Department) :?>
            <tr>
                <td><?= ++$count?></td>
                <td><?= $Department["title"]?></td>
                <td><?= $Department["credit"]?></td>
                <td><?= $Department["instructor_id"]?></td>
                <td><?= $Department["department_id"]?></td>
                <td><a href="E&D course.php?ID=<?=$Department["id"]?>" ><i class="fa-solid fa-eye"></i></a></td>
                <td><a href="E&D course.php?ID=<?=$Department["id"]?>"><i class="fa-solid fa-pen text-warning"></i></a></td>
                <td><a href="http://localhost/backend%20project/collage/course.php?ID=<?=$Department["id"]?>" onclick="return confirm('Are you sure you want to delete it')" name="dt">
                <i class="fa-solid fa-trash text-danger"></i></a></td>
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