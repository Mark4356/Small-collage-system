<?php
include_once "../index.php";
include_once "../nav.php";
$selectDepartment="SELECT * FROM `department`";
$Departments = mysqli_query($conn,$selectDepartment);
// var_dump($Departments);
// foreach($Departments as $Department)
    // print_r($Department);
    // echo"<hr>";
// :
$count=0;

if(isset($_GET['ID'])){
    $id=$_GET['ID'];
    $deleteDepartment="DELETE FROM `department` WHERE `id` = $id ";
    if(mysqli_query($conn,$deleteDepartment)){
    header("Location:http://localhost/backend%20project/collage/department.php");
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
    <section id="list-department">
    <div class="container col-md-10">
    <h1 class="text-center display-6 my-4 fw-bold">List of Departments

<a href="create department.php" class="btn btn-dark float-end">Add Department</a>
</h1>
        <div class="card shadow p-4">
    <table class="table table-dark table-striped">
    <tr>
            <th>ID</th>
            <th>Title</th>
            <th colspan="3">Show Departments</th>
        </tr>
        <tbody>
            <?php foreach($Departments as $Department) :?>
            <tr>
                <td><?= ++$count;?></td>
                <td><?= $Department["title"]?></td>
                <td><a href="E&D department.php?ID=<?=$Department["id"]?>" ><i class="fa-solid fa-eye"></i></a></td>
                <td><a href="E&D department.php?ID=<?=$Department["id"]?>"><i class="fa-solid fa-pen text-warning"></i></a>
                </td>
                <td><a href="http://localhost/backend%20project/collage/department.php?ID=<?=$Department["id"]?>" onclick="return confirm('Are you sure you want to delete it')" name="dt">
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
            </section>


</body>
</html>
<?php

?>